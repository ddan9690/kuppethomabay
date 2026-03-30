<?php

namespace App\Http\Controllers;

use App\Models\SubCountyBbfRep;
use App\Models\User;
use App\Models\SubCounty;
use Illuminate\Http\Request;

class SubCountyBbfRepController extends Controller
{
    public function index()
    {
        $reps = SubCountyBbfRep::with(['user', 'subCounty'])->paginate(10);
        return view('pages.backend.sub-county-reps.index', compact('reps'));
    }

    public function add()
    {
        $users = User::all(); // Users available to appoint
        $subCounties = SubCounty::all();
        return view('pages.backend.sub-county-reps.add', compact('users', 'subCounties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:sub_county_bbf_reps,user_id',
            'sub_county_id' => 'required|exists:sub_counties,id',
            
        ]);

        SubCountyBbfRep::create($request->only('user_id', 'sub_county_id'));

        return redirect()->route('sub_county_bbf_reps.index')
                         ->with('success', 'Sub-County BBF Rep added successfully.');
    }

    public function show(SubCountyBbfRep $subCountyBbfRep)
    {
        return view('pages.backend.sub-county-reps.show', compact('subCountyBbfRep'));
    }

    public function update(Request $request, SubCountyBbfRep $subCountyBbfRep)
    {
        $request->validate([
            'sub_county_id' => 'required|exists:sub_counties,id',
            'status' => 'required|in:active,suspended',
        ]);

        $subCountyBbfRep->update($request->only('sub_county_id', 'status'));

        return redirect()->route('sub_county_bbf_reps.index')
                         ->with('success', 'Sub-County BBF Rep updated successfully.');
    }

    public function delete(SubCountyBbfRep $subCountyBbfRep)
    {
        $subCountyBbfRep->delete();

        return redirect()->route('sub_county_bbf_reps.index')
                         ->with('success', 'Sub-County BBF Rep deleted successfully.');
    }
}