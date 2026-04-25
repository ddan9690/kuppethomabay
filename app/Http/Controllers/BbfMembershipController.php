<?php

namespace App\Http\Controllers;

use App\Models\BbfMembership;
use App\Models\SubCounty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
            'tsc_number' => 'required|string|unique:bbf_memberships,tsc_number',
            'phone_number' => 'required|string|max:20',
            'national_id' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'gender' => 'required|in:M,F',
            'school_name' => 'required|string|max:255',
            'sub_county_id' => 'required|exists:sub_counties,id',
            'zone' => 'required|string|max:255',
            'category' => 'required|in:Tertiary,Senior,Junior,Primary',
            'year_posting' => 'required|integer|min:1900|max:' . date('Y'),
            'nok_full_name' => 'nullable|string|max:255',
            'nok_relationship' => 'nullable|string|max:255',
            'nok_phone' => 'nullable|string|max:20',
            'father_name' => 'nullable|string|max:255',
            'father_status' => 'nullable|in:Alive,Deceased',
            'father_id' => 'nullable|string|max:20',
            'mother_name' => 'nullable|string|max:255',
            'mother_status' => 'nullable|in:Alive,Deceased',
            'mother_id' => 'nullable|string|max:20',
            'spouses' => 'nullable|array|max:2',
            'children' => 'nullable|array|max:7',
        ];

        $messages = [
            'tsc_number.unique' => 'A membership with this TSC Number already exists.',
        ];

        // ✅ Manual validator (IMPORTANT for JSON responses)
        $validator = Validator::make($request->all(), $rules, $messages);

        // ❌ Return structured validation errors for AJAX
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        // ✅ Clean spouses
        $spouses = null;
        if ($request->filled('spouses')) {

            $spousesData = is_string($request->spouses)
                ? json_decode($request->spouses, true)
                : $request->spouses;

            $filteredSpouses = array_filter($spousesData ?? [], function ($sp) {
                return !empty($sp['full_name'])
                    || !empty($sp['id_number'])
                    || !empty($sp['phone_number']);
            });

            if (!empty($filteredSpouses)) {
                $spouses = json_encode(array_values($filteredSpouses));
            }
        }

        // ✅ Clean children
        $children = null;
        if ($request->filled('children')) {

            $childrenData = is_string($request->children)
                ? json_decode($request->children, true)
                : $request->children;

            $filteredChildren = array_filter($childrenData ?? [], function ($ch) {
                return !empty($ch['full_name'])
                    || !empty($ch['dob'])
                    || !empty($ch['birth_cert_no']);
            });

            if (!empty($filteredChildren)) {
                $children = json_encode(array_values($filteredChildren));
            }
        }

        // ✅ Save record
        $membership = BbfMembership::create(array_merge(
            $validated,
            [
                'spouses' => $spouses,
                'children' => $children,
            ]
        ));

        // ✅ Success response (clean + user friendly)
        return response()->json([
            'message' => "Dear {$membership->full_name}, your application for KUPPET Homa Bay BBF membership has been received successfully. The office is currently working on it and you will be contacted soon. Thank you."
        ], 200);
    }

    public function applications()
    {
        $applications = BbfMembership::with('subCounty')
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return view('pages.backend.bbf.applications', compact('applications'));
    }

    public function show($id)
    {
        $member = BbfMembership::with('subCounty')->findOrFail($id);
        $member->spouses = json_decode($member->spouses, true) ?? [];
        $member->children = json_decode($member->children, true) ?? [];

        return view('pages.backend.bbf.show', compact('member'));
    }

    public function approve($id)
    {
        $member = BbfMembership::findOrFail($id);
        $member->status = 'Approved';
        $member->save();

        return response()->json(['message' => 'Application approved successfully']);
    }

    public function reject($id)
    {
        $member = BbfMembership::findOrFail($id);
        $member->status = 'Rejected';
        $member->save();

        return response()->json(['message' => 'Application rejected']);
    }
}
