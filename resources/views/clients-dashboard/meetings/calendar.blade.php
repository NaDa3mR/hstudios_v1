<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Client Dashboard - Meetings Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Your meta and styles --}}
    @include('clients-dashboard.main.meta')

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

    <style>
        #calendar {
            overflow-y: visible;
            background-color: #fff;
            margin: 25px;
            border-radius: 25px;
            border: 1px solid #ccc;
            padding: 50px;
        }

        .modal-backdrop {
            --bs-backdrop-zindex: 1050;
            --bs-backdrop-bg: #000;
            --bs-backdrop-opacity: 0.1;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
            width: 100vw;
            height: 100vh;
            background-color: var(--bs-backdrop-bg);
        }

        .modal-content {
            padding: 1rem;
            background-color: #fff;
            border-radius: 0.3rem;
        }

        .hk-pg-header.pg-header-wth-tab {
            padding-bottom: 15px;
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
        {{-- Optional: client sidebar --}}
        @include('clients-dashboard.main.sidebar')

        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <header class="hk-pg-header pg-header-wth-tab">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                        <span class="initial-wrap rounded-8">M</span>
                                    </div>
                                    <div>
                                        <h5 class="pg-title fs-5">My Meetings Calendar</h5>
                                    </div>
                                </div>
                            </header>

                            <div class="container-fluid">
                                <div id="calendar"></div>
                            </div>

                            <!-- Meeting Details Modal -->
                            <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="meetingModalLabel">Meeting Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                                            <p><strong>Deal:</strong> <span id="modalDeal"></span></p>
                                            <p><strong>Type:</strong> <span id="modalType"></span></p>
                                            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                                            <p><strong>Meeting Date:</strong> <span id="modalDate"></span></p>
                                            <p><strong>Details:</strong> <span id="modalDetails"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    let meetings = @json($meetings);
                                    let calendarEl = document.getElementById('calendar');

                                    let calendar = new FullCalendar.Calendar(calendarEl, {
                                        initialView: 'dayGridMonth',
                                        editable: false, // client shouldn't drag/drop
                                        events: meetings.map(m => ({
                                            id: m.id,
                                            title: m.subject,
                                            start: m.meet_date,
                                            allDay: true
                                        })),
                                        eventClick: function(info) {
                                            let meeting = meetings.find(m => m.id == info.event.id);
                                            if (!meeting) return;

                                            document.getElementById('modalSubject').innerText = meeting.subject;
                                            document.getElementById('modalDeal').innerText = meeting.deal?.name || 'N/A';
                                            document.getElementById('modalType').innerText = meeting.type;
                                            document.getElementById('modalAddress').innerText = meeting.address;
                                            document.getElementById('modalDate').innerText = meeting.meet_date;
                                            document.getElementById('modalDetails').innerText = meeting.details || '';

                                            let modal = new bootstrap.Modal(document.getElementById('meetingModal'));
                                            modal.show();
                                        }
                                    });

                                    calendar.render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('clients-dashboard.main.scripts')
    </div>
</body>

</html>
