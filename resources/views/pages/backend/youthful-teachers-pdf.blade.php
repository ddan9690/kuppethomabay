<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Youthful Teachers Database 2026</title>
    <style>
        body { font-family: sans-serif; font-size: 8px; }
        .header { text-align: center; margin-bottom: 15px; }
        .header img { width: 60px; height: auto; }
        .header h1 { color: #15803d; font-size: 14px; margin: 5px 0 0 0; text-transform: uppercase; }
        .header h3 { font-size: 10px; margin: 2px 0; font-weight: normal; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }
        th, td { border: 1px solid #ccc; padding: 3px; text-align: left; vertical-align: top; word-wrap: break-word; overflow-wrap: break-word; }
        th { background-color: #f4f4f4; text-transform: uppercase; }
        
        /* Specific column sizing */
        .col-date { width: 35px; }
        .col-tsc { width: 45px; }
        .col-age { width: 20px; }
        .col-status { width: 25px; }
        
        .footer-date { text-align: right; font-style: italic; font-size: 7px; margin-top: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo">
        <h1>KUPPET Homa-Bay Branch</h1>
        <h3>Office of the 3rd Assistant Secretary (Gender)</h3>
        <strong>Youthful Teachers Database 2026</strong>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-date">Reg Date</th>
                <th>Name</th>
                <th class="col-tsc">TSC No</th>
                <th>Phone</th>
                <th>Sub-County</th>
                <th class="col-age">Age</th>
                <th>Level</th>
                <th>Subjects</th>
                <th class="col-status">Status</th>
                <th>Service Yrs</th>
                <th>Activities</th>
                <th>Trainings</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->created_at->format('d/m/y') }}</td>
                    <td>{{ $teacher->full_name }}</td>
                    <td>{{ $teacher->tsc_number }}</td>
                    <td>{{ $teacher->phone_number }}</td>
                    <td>{{ $teacher->subCounty->name ?? 'N/A' }}</td>
                    <td>{{ $teacher->age_bracket }}</td>
                    <td>{{ $teacher->teaching_level }}</td>
                    <td>{{ $teacher->teaching_subject_1 }}/{{ $teacher->teaching_subject_2 }}</td>
                    <td>{{ $teacher->employment_status === 'Permanent and Pensionable' ? 'PnP' : $teacher->employment_status }}</td>
                    <td>{{ $teacher->years_in_service }}</td>
                    <td>{{ $teacher->interested_activities ? implode(', ', $teacher->interested_activities) : '-' }}</td>
                    <td>{{ $teacher->beneficial_trainings ? implode(', ', $teacher->beneficial_trainings) : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-date">
        Generated on: {{ now()->format('d/m/y H:i') }}
    </div>

</body>
</html>