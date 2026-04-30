<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        return view('pages.backend.bbf.claims.index');
    }

    public function terms()
    {
        return view('pages.backend.bbf.claims.terms');
    }

    public function acceptTerms(Request $request)
    {
        $request->validate([
            'agree' => 'required'
        ]);

        session(['bbf_terms_accepted' => true]);

        return redirect()->route('bbf.claims.create');
    }

    public function create()
    {
        if (!session('bbf_terms_accepted')) {
            return redirect()->route('bbf.claims.terms');
        }

        return view('pages.backend.bbf.claims.create');
    }

    public function store(Request $request)
    {
        // 1. Validate input
        $validated = $request->validate([
            'teacher_name'     => 'required|string|max:255',
            'tsc_no'           => 'required|string|max:50',
            'phone'            => 'required|string|max:20',
            'school'           => 'required|string|max:255',
            'school_category'  => 'nullable|string',
            'sub_county'       => 'nullable|string|max:255',
            'zone'             => 'nullable|string|max:255',

            'deceased_name'    => 'required|string|max:255',
            'date_of_death'    => 'required|date',
            'relationship'     => 'required|string',
            'place_of_burial'  => 'nullable|string|max:255',
            'county'           => 'nullable|string|max:255',

            'claim_type'       => 'required|string',
            'description'      => 'nullable|string',
            'amount_claimed'   => 'nullable|numeric',

            'payment_method'   => 'nullable|string',
            'payment_details'  => 'nullable|string',

            'attachments.*'    => 'file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        // 2. Handle file uploads
        $files = [];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('bbf_claims', 'public');
                $files[] = $path;
            }
        }

        // 3. Save claim
        $claim = Claim::create([
            'teacher_name'    => $validated['teacher_name'],
            'tsc_no'          => $validated['tsc_no'],
            'phone'           => $validated['phone'],
            'school'          => $validated['school'],
            'school_category' => $validated['school_category'] ?? null,
            'sub_county'      => $validated['sub_county'] ?? null,
            'zone'            => $validated['zone'] ?? null,

            'deceased_name'   => $validated['deceased_name'],
            'date_of_death'   => $validated['date_of_death'],
            'relationship'    => $validated['relationship'],
            'place_of_burial' => $validated['place_of_burial'] ?? null,
            'county'          => $validated['county'] ?? null,

            'claim_type'      => $validated['claim_type'],
            'description'     => $validated['description'] ?? null,
            'amount_claimed'  => $validated['amount_claimed'] ?? null,

            'payment_method'  => $validated['payment_method'] ?? null,
            'payment_details' => $validated['payment_details'] ?? null,

            'attachments'     => json_encode($files),
        ]);

        // 4. Redirect back (SweetAlert triggers on reload)
        return redirect()
            ->route('bbf.claims.create')
            ->withInput();
    }
}
