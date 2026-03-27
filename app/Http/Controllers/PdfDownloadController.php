<?php

namespace App\Http\Controllers;

use App\Models\AgencyPayer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfDownloadController extends Controller
{
     public function agencyPayers()
    {
        // Fetch all agency payers with their sub-county
        $agencyPayers = AgencyPayer::with('subCounty')->latest()->get();

        // Load PDF view
        $pdf = PDF::loadView('pages.backend.agency-payers-pdf', compact('agencyPayers'));

        // Return as download
        return $pdf->download('agency_payers.pdf');
    }
}
