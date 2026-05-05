<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SHA Facility Experience Report</title>

    <style>
        @page { margin: 18px; }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10.5px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 70px;
            margin-bottom: 5px;
        }

        h1 {
            font-size: 16px;
            margin: 2px 0;
            font-weight: bold;
        }

        h2 {
            font-size: 15px;
            margin: 2px 0;
        }

        .subtitle {
            font-size: 11px;
            color: #444;
        }

        .report {
            border-bottom: 1px solid #e0e0e0;
            padding: 6px 0;
        }

        .top-line {
            margin-bottom: 3px;
        }

        .facility {
            font-weight: bold;
            font-size: 10.8px;
        }

        .meta {
            font-size: 9px;
            color: #666;
        }

        .details {
            font-size: 10px;
            line-height: 1.3;
            white-space: pre-wrap;
        }

        .footer {
            margin-top: 12px;
            text-align: center;
            font-size: 9px;
            color: #666;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 6px 0;
        }
    </style>
</head>

<body>

{{-- HEADER --}}
<div class="header">
    <img src="{{ public_path('assets/images/kuppet-logo.png') }}">

    <h1>KUPPET HOMA BAY BRANCH</h1>

    <h2>SHA FACILITY EXPERIENCE REPORT</h2>

    <hr>

    <div class="subtitle">
        Healthcare Service Delivery Feedback
    </div>

    <div class="subtitle" style="font-size:10px; color:#666; margin-top:3px;">
        "Monitoring Healthcare Experience. Advocating for Better Service Delivery."
    </div>
</div>

{{-- REPORTS --}}
@forelse($reports as $report)

    <div class="report">

        <div class="top-line">
            <span class="facility">{{ $report->facility_name }}</span>
        </div>

        <div class="meta">
            {{ $report->subCounty->name ?? 'N/A' }} • {{ $report->created_at->format('d M Y') }}
        </div>

        <div class="details">
            {{ $report->details }}
        </div>

    </div>

@empty

    <div style="text-align:center; padding:15px; color:#777;">
        No SHA facility reports available.
    </div>

@endforelse

{{-- FOOTER (EAST AFRICA TIME FIX) --}}
<div class="footer">
    Generated on {{ now()->timezone('Africa/Nairobi')->format('d M Y H:i') }} (EAT)
</div>

</body>
</html>