<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agency Fee Payers</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 18px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        {{-- Logo --}}
        <img src="{{ public_path('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo">
        <h2>Agency Fee Payers - KUPPET Homabay Branch</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Sub-County</th>
                <th>TSC Number</th>
                <th>Phone</th>
                <th>Submitted On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agencyPayers as $index => $payer)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $payer->full_name }}</td>
                <td>{{ $payer->subCounty->name ?? '-' }}</td>
                <td>{{ $payer->tsc_no }}</td>
                <td>{{ $payer->phone }}</td>
                <td>{{ $payer->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>