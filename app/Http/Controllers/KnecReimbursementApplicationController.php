<?php

namespace App\Http\Controllers;

use App\Models\KnecReimbursementAnnouncement;
use App\Models\KnecReimbursementApplication;
use App\Models\SubCounty;
use Illuminate\Http\Request;

class KnecReimbursementApplicationController extends Controller
{
    /**
     * Display a listing of active and open reimbursement portals for applicants.
     */
    public function index()
    {
        $announcements = KnecReimbursementAnnouncement::where('is_active', true)
            ->where('status', 'open')
            ->latest()
            ->paginate(10);

        return view('pages.frontend.knec-reimbursements.index', compact('announcements'));
    }

    /**
     * Show the application form for a specific announcement portal.
     */
    public function create($id, $slug)
    {
        $announcement = KnecReimbursementAnnouncement::where('id', $id)
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'open')
            ->firstOrFail();

        $subCounties = SubCounty::orderBy('name')->get();

        return view('pages.frontend.knec-reimbursements.create', compact('announcement', 'subCounties'));
    }

    /**
     * Store a newly submitted application in storage.
     */
    /**
     * Store a newly submitted application in storage.
     */
    public function store(Request $request, $id, $slug)
    {
        $announcement = KnecReimbursementAnnouncement::where('id', $id)
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'open')
            ->firstOrFail();

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female'],
            'id_number' => ['required', 'string', 'max:50'],
            'tsc_number' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:20'],
            'level' => ['required', 'string', 'max:100'],
            'sub_county_id' => ['required', 'exists:sub_counties,id'],
            'school' => ['required', 'string', 'max:255'],
            'date_of_training' => ['required', 'date'],
            'training_center' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'paper' => ['required', 'string', 'max:255'],
        ]);

        // Check if the selected form level matches the announcement level
        // Normalizing strings (e.g., "senior_school" vs "Senior School")
        $announcementNormalizedLevel = strtolower(str_replace(' ', '_', $announcement->level));
        $requestNormalizedLevel = strtolower(str_replace(' ', '_', $validated['level']));

        if ($announcementNormalizedLevel !== $requestNormalizedLevel) {
            // Format announcement level nicely for the message (e.g. "senior school")
            $formattedAllowedLevel = ucwords(str_replace('_', ' ', $announcement->level));

            $message = "Currently only applications for teachers of {$formattedAllowedLevel}s are being received. You will be notified once for {$request['level']} will be open. Kindly contact your KUPPET secretary or BEC office for assistance.";

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                ], 422);
            }

            return back()->withInput()->with('error', $message);
        }

        // Check for duplicate application using announcement_id AND (id_number OR tsc_number)
        $existingApplication = KnecReimbursementApplication::where('announcement_id', $announcement->id)
            ->where(function ($query) use ($validated) {
                $query->where('id_number', $validated['id_number'])
                    ->orWhere('tsc_number', $validated['tsc_number']);
            })
            ->first();

        if ($existingApplication) {
            $message = 'An application with this ID Number or TSC Number has already been submitted for this reimbursement portal. Kindly contact the Secretary Secondary or BEC office.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                ], 422);
            }

            return back()->withInput()->with('error', $message);
        }

        $validated['announcement_id'] = $announcement->id;
        $validated['status'] = 'pending';

        KnecReimbursementApplication::create($validated);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your KNEC reimbursement application has been successfully submitted.',
                'redirect' => route('knec-reimbursements.index')
            ], 200);
        }

        return redirect()->route('knec-reimbursements.index')
            ->with('success', 'Your KNEC reimbursement application has been successfully submitted.');
    }
}
