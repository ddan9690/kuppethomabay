<?php

namespace App\Http\Controllers;

use App\Models\SubCounty;
use App\Services\SubCountyBbfRepService;
use Illuminate\Http\Request;

class SubCountyBbfRepController extends Controller
{
    protected $service;

    public function __construct(SubCountyBbfRepService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $reps = $this->service->getActiveReps();

        return view('pages.backend.sub-county-reps.index', compact('reps'));
    }

    public function add()
    {
        $users = $this->service->getAvailableUsers();
        $subCounties = SubCounty::all();

        return view('pages.backend.sub-county-reps.add', compact('users', 'subCounties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sub_county_id' => 'required|exists:sub_counties,id',
            'level' => 'nullable|string',
        ]);

        $check = $this->service->canAssign(
            $request->user_id,
            $request->sub_county_id,
            $request->level
        );

        if (!$check['ok']) {
            return response()->json([
                'status' => false,
                'message' => $check['message']
            ], 422);
        }

        $this->service->assign(
            $request->user_id,
            $request->sub_county_id,
            $request->level
        );

        return response()->json([
            'status' => true,
            'message' => 'BBF Rep assigned successfully',
            'redirect' => route('sub_county_bbf_reps.index')
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
