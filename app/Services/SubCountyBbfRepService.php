<?php

namespace App\Services;

use App\Models\SubCountyBbfRep;

class SubCountyBbfRepService
{
    public function canAssign($userId, $subCountyId, $level = null)
    {
        // 1. User already assigned anywhere
        $userExists = SubCountyBbfRep::where('user_id', $userId)
            ->where('status', 'active')
            ->exists();

        if ($userExists) {
            return [
                'ok' => false,
                'message' => 'User is already assigned as a BBF rep.'
            ];
        }

        // 2. Subcounty level constraint
        $existsInSlot = SubCountyBbfRep::where('sub_county_id', $subCountyId)
            ->where('level', $level)
            ->where('status', 'active')
            ->exists();

        if ($existsInSlot) {
            return [
                'ok' => false,
                'message' => 'This sub-county already has a rep for this level.'
            ];
        }

        return ['ok' => true];
    }

    public function assign($userId, $subCountyId, $level = null)
    {
        return SubCountyBbfRep::create([
            'user_id' => $userId,
            'sub_county_id' => $subCountyId,
            'level' => $level,
            'status' => 'active',
            'assigned_at' => now(),
        ]);
    }

    public function getAvailableUsers()
    {
        return \App\Models\User::whereDoesntHave('bbfRep')->get();
    }

    public function getActiveReps()
    {
        return SubCountyBbfRep::with(['user', 'subCounty'])
            ->where('status', 'active')
            ->latest()
            ->paginate(10);
    }
}