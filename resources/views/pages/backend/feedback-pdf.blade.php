<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Care Feedback Report</title>

    <style>
        @page {
            margin: 18px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10.5px;
            color: #000;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 70px;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 15px;
            margin: 2px 0;
        }

        .subtitle {
            font-size: 11px;
            color: #444;
        }

        .tagline {
            font-size: 10px;
            color: #666;
            margin-top: 3px;
        }

        /* FEEDBACK BLOCK (NEW FORMAT) */
        .feedback {
            border-bottom: 1px solid #e0e0e0;
            padding: 6px 0;
        }

        .top-line {
            display: block;
            margin-bottom: 3px;
        }

        .name {
            font-weight: bold;
            font-size: 10.8px;
        }

        .date {
            font-size: 9px;
            color: #666;
            margin-left: 8px;
        }

        .message {
            font-size: 10px;
            line-height: 1.3;
            white-space: pre-wrap;
        }

        /* FOOTER */
        .footer {
            margin-top: 12px;
            text-align: center;
            font-size: 9px;
            color: #666;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">

        <img src="{{ public_path('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo">

        <h2>HOMA BAY KUPPET CUSTOMER CARE FEEDBACK</h2>

        <div class="subtitle">
            Teachers' Feedback & Support Desk Report
        </div>

        <div class="tagline">
            "Listening. Responding. Improving Service Delivery."
        </div>

    </div>

    {{-- FEEDBACK BLOCKS --}}
    @forelse($feedbacks as $feedback)

        <div class="feedback">

            {{-- Name + Date line --}}
            <div class="top-line">
                <span class="name">{{ $feedback->name }}</span>
                <span class="date">• {{ $feedback->created_at->format('d M Y') }}</span>
            </div>

            {{-- Message --}}
            <div class="message">
                {{ $feedback->message }}
            </div>

        </div>

    @empty

        <div style="text-align:center; padding:15px; color:#777;">
            No feedback messages have been submitted yet.
        </div>

    @endforelse

    {{-- FOOTER --}}
    <div class="footer">
        This report is generated automatically by the KUPPET Homabay Customer Care System<br>
        Generated on {{ now()->format('d M Y H:i') }}
    </div>

</body>
</html>