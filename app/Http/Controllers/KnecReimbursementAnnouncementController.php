<?php

namespace App\Http\Controllers;

use App\Models\KnecReimbursementAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KnecReimbursementAnnouncementController extends Controller
{
    public function index()
    {
        $announcements = KnecReimbursementAnnouncement::withCount('applications')->latest()->paginate(10);
        return view('pages.backend.knec-reimbursements.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('pages.backend.knec-reimbursements.announcements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|digits:4',
            'level' => 'required|in:primary,junior_school,senior_school,tertiary',
            'title' => 'required|string|max:255',
            'announced_on' => 'nullable|date',
            'status' => 'required|in:open,closed',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . $validated['year'] . '-' . $validated['level'];
        $validated['is_active'] = $request->has('is_active');

        // Ensure unique check for year and level
        $exists = KnecReimbursementAnnouncement::where('year', $validated['year'])
            ->where('level', $validated['level'])
            ->exists();

        if ($exists) {
            return back()->withInput()->withErrors(['level' => 'An announcement for this educational level and year already exists.']);
        }

        KnecReimbursementAnnouncement::create($validated);

        return redirect()->route('admin.knec-reimbursements.index')
            ->with('success', 'Announcement portal created successfully.');
    }

    public function show(Request $request, $id, $slug = null)
    {
        $announcement = KnecReimbursementAnnouncement::findOrFail($id);

        if ($slug && $announcement->slug !== $slug) {
            return redirect()->route('admin.knec-reimbursements.show', ['announcement' => $announcement->id, 'slug' => $announcement->slug]);
        }

        // Paginate 30 records per page as requested
        $applications = $announcement->applications()
            ->with('subCounty')
            ->latest()
            ->paginate(30);

        return view('pages.backend.knec-reimbursements.announcements.show', compact('announcement', 'applications'));
    }

    public function edit($id, $slug = null)
    {
        $announcement = KnecReimbursementAnnouncement::findOrFail($id);

        if ($slug && $announcement->slug !== $slug) {
            return redirect()->route('admin.knec-reimbursements.edit', ['announcement' => $announcement->id, 'slug' => $announcement->slug]);
        }

        return view('pages.backend.knec-reimbursements.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $announcement = KnecReimbursementAnnouncement::findOrFail($id);

        $validated = $request->validate([
            'year' => 'required|digits:4',
            'level' => 'required|in:primary,junior_school,senior_school,tertiary',
            'title' => 'required|string|max:255',
            'announced_on' => 'nullable|date',
            'status' => 'required|in:open,closed',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . $validated['year'] . '-' . $validated['level'];
        $validated['is_active'] = $request->has('is_active');

        $announcement->update($validated);

        return redirect()->route('admin.knec-reimbursements.index')
            ->with('success', 'Announcement portal updated successfully.');
    }

    public function toggleStatus($id)
    {
        $announcement = KnecReimbursementAnnouncement::findOrFail($id);

        $announcement->status = $announcement->status === 'open' ? 'closed' : 'open';
        $announcement->save();

        return response()->json([
            'success' => true,
            'status' => $announcement->status,
            'message' => 'Status updated successfully to ' . ucfirst($announcement->status)
        ]);
    }

    public function destroy($id)
    {
        $announcement = KnecReimbursementAnnouncement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.knec-reimbursements.index')
            ->with('success', 'Announcement portal deleted successfully.');
    }
}
