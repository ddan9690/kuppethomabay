<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $announcement->title }} - Applications</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 10px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 8.5px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .branch-title {
            font-size: 13px;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .header img {
            width: 50px;
            height: auto;
            margin-bottom: 3px;
        }

        h2 {
            font-size: 12px;
            margin: 0;
            color: #008C45;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 9px;
            margin-top: 2px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        th, td {
            border: 1px solid #000;
            padding: 3px 4px;
            vertical-align: middle;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: nowrap;
        }

        th {
            background-color: #008C45;
            color: white;
            text-transform: uppercase;
            font-size: 8.5px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Alignment Helpers */
        .text-center { text-align: center; }
        .text-left { text-align: left; }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <div class="branch-title">KUPPET HOMABAY BRANCH</div>
        <img src="{{ public_path('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo">
        <h2>{{ $announcement->title }}</h2>
        <div class="subtitle">
            Year: {{ $announcement->year }} | Level: {{ ucwords(str_replace('_', ' ', $announcement->level)) }}
        </div>
    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-left">Name</th>
                <th class="text-center">G</th>
                <th class="text-center">ID No.</th>
                <th class="text-center">TSC No.</th>
                <th class="text-center">Phone</th>
                <th class="text-left">Sub County</th>
                <th class="text-left">School</th>
                <th class="text-left">Subject/Paper</th>
                <th class="text-center">Trained</th>
                <th class="text-center">Applied</th>
            </tr>
        </thead>

        <tbody>
            @forelse($applications as $index => $app)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-left">{{ $app->full_name }}</td>
                    <td class="text-center">{{ (str_starts_with(strtoupper($app->gender), 'F')) ? 'F' : 'M' }}</td>
                    <td class="text-center">{{ $app->id_number }}</td>
                    <td class="text-center">{{ $app->tsc_number }}</td>
                    <td class="text-center">{{ $app->phone_number }}</td>
                    <td class="text-left">{{ optional($app->subCounty)->name }}</td>
                    <td class="text-left">{{ $app->school }}</td>
                    <td class="text-left">{{ $app->subject }} ({{ $app->paper }})</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($app->date_of_training)->format('d/m/y') }}</td>
                    <td class="text-center">{{ $app->created_at->format('d/m/y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" style="text-align:center; padding: 10px;">
                        No applications found for this announcement.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>