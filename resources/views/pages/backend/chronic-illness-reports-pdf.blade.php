<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SHA Chronic Illness Service Access Reports</title>
    <style>
        body { font-family: sans-serif; font-size: 9px; }
        .header { text-align: center; margin-bottom: 15px; }
        .header img { width: 60px; height: auto; }
        .header h1 { color: #008C45; font-size: 14px; margin: 5px 0 0 0; text-transform: uppercase; }
        .header h3 { font-size: 10px; margin: 2px 0; font-weight: normal; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }
        th, td { border: 1px solid #ccc; padding: 4px; text-align: left; vertical-align: top; word-wrap: break-word; overflow-wrap: break-word; }
        th { background-color: #f4f4f4; text-transform: uppercase; }
        
        /* Column sizing */
        .col-index { width: 25px; text-align: center; }
        .col-subcounty { width: 80px; }
        .col-party { width: 65px; }
        .col-date { width: 70px; }
        
        .footer-date { text-align: right; font-style: italic; font-size: 7px; margin-top: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo">
        <h1>KUPPET Homa-Bay Branch</h1>
        <h3>SHA Chronic Illness Service Access Reports</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-index">#</th>
                <th class="col-subcounty">Sub-County</th>
                <th class="col-party">Affected Party</th>
                <th>Experience / Challenges Faced</th>
                <th class="col-date">Submitted On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
                <tr>
                    <td class="col-index">{{ $index + 1 }}</td>
                    <td>{{ $report->subCounty->name ?? '-' }}</td>
                    <td>{{ $report->affected_party }}</td>
                    <td>{{ $report->experience_description }}</td>
                    <td>{{ $report->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-date">
        Generated on: {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>