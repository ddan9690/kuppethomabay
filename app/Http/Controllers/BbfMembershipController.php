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
            'spouses.*.full_name' => 'nullable|string|max:255',
            'spouses.*.id_number' => 'nullable|string|max:50',
            'spouses.*.phone_number' => 'nullable|string|max:20',
            'children' => 'nullable|array|max:7',
            'children.*.full_name' => 'nullable|string|max:255',
            'children.*.dob' => 'nullable|date',
            'children.*.birth_cert_no' => 'nullable|string|max:50',
        ];

        // Custom messages
        $messages = [
            'tsc_number.unique' => 'A membership with this TSC Number already exists. 
        If this is your TSC Number and you believe this is an error, please contact the BBF office.',
        ];

        $validated = $request->validate($rules, $messages);

        // Convert spouse/children arrays to JSON only if they have at least one valid entry
        $spouses = null;
        if ($request->spouses) {
            $filteredSpouses = array_filter($request->spouses, function ($sp) {
                return !empty($sp['full_name'] ?? '') || !empty($sp['id_number'] ?? '') || !empty($sp['phone_number'] ?? '');
            });
            if ($filteredSpouses) {
                $spouses = json_encode(array_values($filteredSpouses));
            }
        }

        $children = null;
        if ($request->children) {
            $filteredChildren = array_filter($request->children, function ($ch) {
                return !empty($ch['full_name'] ?? '') || !empty($ch['dob'] ?? '') || !empty($ch['birth_cert_no'] ?? '');
            });
            if ($filteredChildren) {
                $children = json_encode(array_values($filteredChildren));
            }
        }

        // Create the BBF membership
        BbfMembership::create(array_merge(
            $request->except(['spouses', 'children']),
            [
                'spouses' => $spouses,
                'children' => $children,
            ]
        ));

        return redirect()->back()->with('success', 'BBF Membership registered successfully!');
    }

    public function applications()
    {
        $applications = BbfMembership::with('subCounty')
            ->orderBy('created_at', 'asc') // earliest first (clear intent)
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
