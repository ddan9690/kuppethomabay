<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OfficialsController extends Controller
{
    public function index(): View
    {
        return view('pages.frontend.bec');
    }

    public function thomasOdhiambo(): View
    {
        return view('pages.frontend.profiles.executive-secretary');
    }

    public function peterOtieno(): View
    {
        return view('pages.frontend.profiles.chairperson');
    }

    public function temboMwadime(): View
    {
        return view('pages.frontend.profiles.treasurer');
    }

    public function richardOtieno(): View
    {
        return view('pages.frontend.profiles.vice-chairperson');
    }

    public function felixOdour(): View
    {
        return view('pages.frontend.profiles.assistant-treasurer');
    }

    public function kennedyAtanga(): View
    {
        return view('pages.frontend.profiles.assistant-executive-secretary');
    }

    public function churchillAroko(): View
    {
        return view('pages.frontend.profiles.organising-secretary');
    }

    public function kennedyOsewe(): View
    {
        return view('pages.frontend.profiles.secretary-secondary');
    }

    public function philipAdede(): View
    {
        return view('pages.frontend.profiles.secretary-junior-school');
    }

    public function lucasOkinda(): View
    {
        return view('pages.frontend.profiles.secretary-tertiary');
    }

    public function roseOkeyo(): View
    {
        return view('pages.frontend.profiles.gender-secretary');
    }

    public function quinterNyakiye(): View
    {
        return view('pages.frontend.profiles.1st-assistant-gender-secretary');
    }

    public function dancunAlaka(): View
    {
        return view('pages.frontend.profiles.2nd-assistant-gender-secretary');
    }

    public function anneBlessings(): View
    {
        return view('pages.frontend.profiles.3rd-assistant-gender-secretary');
    }
}