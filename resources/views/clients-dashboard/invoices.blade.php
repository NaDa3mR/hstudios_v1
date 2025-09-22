<!doctype html>
@include('clients-dashboard.main.html')

<head>
    <meta charset="utf-8" />
    <title>Client Dashboard - Invoices</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('clients-dashboard.main.meta')

    <style>
        html,
        body {
            height: auto !important;
            min-height: 100%;
            overflow-y: auto !important;
        }

        .btn-link {
            color: #8b422e;
        }

        .btn-link:hover {
            color: #8b422e;
        }

        #datable_4c_filter {
            float: right;
        }

        .avatar.avatar-info>.initial-wrap {
            background-color: #8b422e !important;
            color: #fff;
        }

        .feather-search {
            display: none;
        }

        #datable_4c thead th {
            border-bottom: 2px solid #8b422e !important;
            font-weight: 600;
            padding: 12px 15px;
        }

        #datable_4c tbody td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .hk-pg-wrapper {
            height: 100%;
            overflow: hidden;
        }

        .hk-wrapper,
        .taskboardapp-wrap,
        .container {
            height: auto !important;
            overflow: visible !important;
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        {{-- Sidebar --}}
        @include('clients-dashboard.main.sidebar')

        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">

                            {{-- Topbar --}}
                            @include('clients-dashboard.invoices.topbar')

                            {{-- Invoices Section --}}
                            <section class="text-center">
                                <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary"
                                    style="margin-top: 30px; backdrop-filter: blur(30px); background-color: #f0f0f0;">
                                    <div class="card-body py-5 px-md-5">

                                        <h2 class="fw-bold mb-4">My Invoices</h2>

                                        @forelse($invoices as $invoice)
                                            <div class="card mb-4 p-3 text-start">
                                                <h4 class="fw-bold">Invoice #{{ $invoice->invoice_number }}</h4>
                                                <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
                                                <p><strong>Status:</strong>
                                                    <span class="badge
                                                        @if($invoice->status == 'paid') bg-success
                                                        @elseif($invoice->status == 'pending') bg-warning
                                                        @else bg-danger @endif">
                                                        {{ ucfirst($invoice->status) }}
                                                    </span>
                                                </p>
                                                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}</p>
                                                <p><strong>Deal:</strong> {{ $invoice->deal->name ?? 'No Deal' }}</p>
                                                <p><strong>Details:</strong> {{ $invoice->details ?? 'No details provided' }}</p>
                                            </div>
                                        @empty
                                            <p>No invoices found.</p>
                                        @endforelse

                                    </div>
                                </div>
                            </section>
                            {{-- /Invoices Section --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @include('clients-dashboard.main.scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</body>
</html>
