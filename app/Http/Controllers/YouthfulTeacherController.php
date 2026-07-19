<?php

namespace App\Http\Controllers;

use App\Models\YouthfulTeacher;
use App\Models\SubCounty;
use Illuminate\Http\Request;

class YouthfulTeacherController extends Controller
{
    public function index()
    {
        $teachers = YouthfulTeacher::with('subCounty')->latest()->paginate(20);
        return view('pages.backend.youthful-teachers', compact('teachers'));
    }

    public function create()
    {

        $subCounties = SubCounty::all();

        return view('pages.frontend.youthful-teachers', compact('subCounties'));
    }

    // Process the registration submission
    public function store(Request $request)
    {
        // 1. Data Integrity Check
        $exists = YouthfulTeacher::where('email', $request->email)
            ->orWhere('tsc_number', $request->tsc_number)
            ->exists();

        if ($exists) {
            return back()->with('swal_info', 'It looks like you have already participated in this program. Thank you for your commitment!');
        }

        // 2. Validate
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'tsc_number' => 'required|string',
            'phone_number' => 'required|string',
            'sub_county_id' => 'required|exists:sub_counties,id',
            'age_bracket' => 'required',
            'teaching_level' => 'required',
            'teaching_subject_1' => 'required',
            'teaching_subject_2' => 'required',
            'employment_status' => 'required',
            'years_in_service' => 'required',
            'has_undertaken_training' => 'required',
            'interested_activities' => 'nullable|array',
            'beneficial_trainings' => 'nullable|array',
            'consent' => 'accepted'
        ]);

        // 3. Save
        $teacher = YouthfulTeacher::create($validated);

        return redirect('/')->with('swal_success', "Thank you {$teacher->full_name} for participating in this KUPPET Homa-Bay Youthful Teachers Database 2026.");
    }
}
