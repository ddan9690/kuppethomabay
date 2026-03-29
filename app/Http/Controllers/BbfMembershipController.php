<?php

namespace App\Http\Controllers;

use App\Models\BbfMembership;
use App\Models\SubCounty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BbfMembershipController extends Controller
{
    /**
     * Show the BBF registration form.
     */
    public function create()
    {
        $subCounties = SubCounty::all();
        return view('pages.backend.bbf.register', compact('subCounties'));
    }

    /**
     * Store a new BBF membership.
     */


    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'full_name' => 'required|string|max:255',
            'tsc_number' => 'required|string|max:50|unique:bbf_memberships,tsc_number',
            'phone_number' => 'required|string|max:20',
            'national_id' => 'nullable|string|max:20|unique:bbf_memberships,national_id',
            'email' => 'nullable|email|max:255',
            'gender' => 'required|in:M,F',
            'school_name' => 'required|string|max:255',
            'sub_county_id' => 'required|exists:sub_counties,id',
            'zone' => 'required|string|max:100',
            'category' => 'required|in:Tertiary,Senior,Junior,Primary',
            'year_posting' => 'required|integer|min:1900|max:' . date('Y'),
            'nok_full_name' => 'nullable|string|max:255',
            'nok_relationship' => 'nullable|string|max:100',
            'nok_phone' => 'nullable|string|max:20',

            'spouses' => 'nullable|array',
            'spouses.*.full_name' => 'nullable|string|max:255',
            'spouses.*.id' => 'nullable|string|max:20',
            'spouses.*.phone' => 'nullable|string|max:20',

            'children' => 'nullable|array',
            'children.*.full_name' => 'nullable|string|max:255',
            'children.*.dob' => 'nullable|date',
            'children.*.birth_certificate_no' => 'nullable|string|max:50',

            'father_name' => 'nullable|string|max:255',
            'father_status' => 'nullable|in:Alive,Deceased',
            'father_id' => 'nullable|string|max:20',
            'mother_name' => 'nullable|string|max:255',
            'mother_status' => 'nullable|in:Alive,Deceased',
            'mother_id' => 'nullable|string|max:20',
        ];

        // Custom messages
        $messages = [
            'tsc_number.unique' => 'A membership with this TSC Number already exists. 
            If this is your TSC Number and you believe this is an error, please contact the BBF office.',
            'national_id.unique' => 'A membership with this National ID already exists. 
            If this is your ID and you believe this is an error, please contact the BBF office.',
        ];

        // Validate input
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Save membership
        $membership = new BbfMembership();
        $membership->full_name = $request->full_name;
        $membership->tsc_number = $request->tsc_number;
        $membership->phone_number = $request->phone_number;
        $membership->national_id = $request->national_id;
        $membership->email = $request->email;
        $membership->gender = $request->gender;
        $membership->school_name = $request->school_name;
        $membership->sub_county_id = $request->sub_county_id;
        $membership->zone = $request->zone;
        $membership->category = $request->category;
        $membership->year_posting = $request->year_posting;
        $membership->nok_full_name = $request->nok_full_name;
        $membership->nok_relationship = $request->nok_relationship;
        $membership->nok_phone = $request->nok_phone;

        // Store spouses and children as JSON
        $membership->spouses = json_encode($request->spouses ?? []);
        $membership->children = json_encode($request->children ?? []);

        // Father and Mother
        $membership->father_name = $request->father_name;
        $membership->father_status = $request->father_status;
        $membership->father_id = $request->father_id;
        $membership->mother_name = $request->mother_name;
        $membership->mother_status = $request->mother_status;
        $membership->mother_id = $request->mother_id;

        // Default status
        $membership->status = 'Pending';
        $membership->save();

        return response()->json([
            'success' => 'Your membership registration request has been submitted successfully! Await approval.'
        ]);
    }
}
