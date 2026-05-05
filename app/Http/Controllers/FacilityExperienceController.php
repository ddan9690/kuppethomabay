<?php

namespace App\Http\Controllers;

use App\Models\FacilityExperience;
use App\Models\SubCounty;
use Illuminate\Http\Request;

class FacilityExperienceController extends Controller
{


    public function create()
    {
        $subCounties = SubCounty::all();

        return view('pages.frontend.health_facility_experience_report', compact('subCounties'));
    }

    /**
     * Store a new facility experience report
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sub_county_id'   => 'required|exists:sub_counties,id',
            'facility_name'    => 'required|string|max:255',
            'details'          => 'required|string',
        ]);

        $report = FacilityExperience::create([
            'sub_county_id' => $validated['sub_county_id'],
            'facility_name' => $validated['facility_name'],
            'details'       => $validated['details'],
        ]);

        return response()->json([
            'success' => 'Your report has been received successfully. KUPPET Homa Bay Branch will review the issue and follow up with the relevant authorities where necessary.',
            'data' => $report
        ]);
    }

  
    public function index()
    {
        $reports = FacilityExperience::with('subCounty')
            ->latest()
            ->paginate(20);

        return view('pages.backend.sha-facility_experiences', compact('reports'));
    }

    /**
     * (Optional) Show single report
     */
    public function show($id)
    {
        $report = FacilityExperience::with('subCounty')->findOrFail($id);

        return view('backend.facility_experiences.show', compact('report'));
    }
}
