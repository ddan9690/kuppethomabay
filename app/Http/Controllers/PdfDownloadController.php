<?php

namespace App\Http\Controllers;

use App\Models\AgencyPayer;
use App\Models\BbfMembership;
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

    public function bbfPendingApplications()
    {

        $applications = BbfMembership::with('subCounty')
            ->where('status', 'Pending')
            ->latest()
            ->get();

        $pdf = Pdf::loadView('pages.backend.bbf-pending-applications-pdf', compact('applications'));

        return $pdf->download('bbf_pending_applications_' . now()->format('Y-m-d') . '.pdf');
    }
}
