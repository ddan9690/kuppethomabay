<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCounty;
use App\Models\AgencyPayer;

class AgencyPayerController extends Controller
{

    public function index()
    {
        $agencyPayers = AgencyPayer::with('subCounty')->latest()->paginate(20);
        return view('pages.backend.agency-payers', compact('agencyPayers'));
       
    }

    // Show the public form
    public function create()
    {
        $subCounties = SubCounty::all();
        return view('pages.frontend.agency-payer', compact('subCounties'));
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'sub_county_id' => 'required|exists:sub_counties,id',
            'tsc_no' => 'required|string|max:50|unique:agency_payers,tsc_no',
            'phone' => 'required|string|max:20',
        ]);

        AgencyPayer::create([
            'full_name' => $validated['full_name'],
            'sub_county_id' => $validated['sub_county_id'],
            'tsc_no' => $validated['tsc_no'],
            'phone' => $validated['phone'],
            'branch' => 'Homabay',
            'agency_fee_active' => true,
        ]);

        return response()->json([
            'success' => 'Your details have been submitted successfully!'
        ]);
    }
}
