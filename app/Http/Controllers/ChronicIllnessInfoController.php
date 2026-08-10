<?php

namespace App\Http\Controllers;

use App\Models\ChronicIllnessInfo;
use App\Models\SubCounty;
use Illuminate\Http\Request;

class ChronicIllnessInfoController extends Controller
{
    public function index()
    {
        $records = ChronicIllnessInfo::with('subCounty')->latest()->paginate(20);
        return view('pages.backend.chronic-illness-info', compact('records'));
    }

    public function create()
    {
        $subCounties = SubCounty::all();
        return view('pages.frontend.chronic-illness-info', compact('subCounties'));
    }

    // Process the anonymous submission
    public function store(Request $request)
    {
        // 1. Validate (Note: 'consent' rule removed since the checkbox was removed)
        $validated = $request->validate([
            'sub_county_id' => 'required|exists:sub_counties,id',
            'affected_party' => 'required|string',
            'experience_description' => 'required|string',
        ]);

        // 2. Save
        ChronicIllnessInfo::create($validated);

        // 3. Redirect back with updated SweetAlert feedback message
        return back()->with('swal_success', 'Thank you for your feedback.');
    }
}