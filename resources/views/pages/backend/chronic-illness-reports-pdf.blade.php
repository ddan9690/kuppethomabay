<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SHA Chronic Illness Service Access Reports</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 15px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header img {
            width: 80px;
            height: auto;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 16px;
            margin: 0;
            color: #008C45;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 11px;
            margin-top: 4px;
            color: #333;
            text-transform: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        th {
            background-color: #008C45;
            color: white;
            text-transform: uppercase;
            font-size: 10px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 15px;
            font-size: 10px;
            text-align: center;
            color: #555;
        }

        /* =========================
            COLUMN WIDTH CONTROL
        ========================== */
        .col-no { width: 4%; text-align: center; white-space: nowrap; }
        .col-subcounty { width: 14%; white-space: nowrap; }
        .col-party { width: 14%; white-space: nowrap; }
        .col-experience { width: 55%; white-space: normal; }
        .col-date { width: 13%; white-space: nowrap; }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <img src="{{ public_path('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo">
        <h2>SHA Chronic Illness Service Access Reports</h2>
        <div class="subtitle">
            Feedback from teachers of Homa Bay County regarding the SHA Mwalimu Medical Scheme.
        </div>
    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th class="col-no">#</th>
                <th class="col-subcounty">Sub-County</th>
                <th class="col-party">Affected Party</th>
                <th class="col-experience">Experience / Challenges</th>
                <th class="col-date">Submitted On</th>
            </tr>
        </thead>

        <tbody>
            @forelse($reports as $index => $report)
                <tr>
                    <td class="col-no">{{ $index + 1 }}</td>
                    <td class="col-subcounty">{{ $report->subCounty->name ?? '-' }}</td>
                    <td class="col-party">{{ $report->affected_party }}</td>
                    <td class="col-experience">{{ $report->experience_description }}</td>
                    <td class="col-date">{{ $report->created_at->format('d M Y, h:i a') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 10px;">
                        No feedback received
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        Downloaded on {{ now()->format('d M Y, h:i a') }}
    </div>

</body>
</html>