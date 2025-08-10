<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> dashboard template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')
    <style>
        #calendar {
            height: 700px;
        }

        .modal-content {
            padding: 1rem;
            background-color: #fff;
            border-radius: 0.3rem;
        }


        html,
        body {
            height: auto !important;
            overflow-y: auto !important;
        }

        .btn-link {
            color: #33475b;
        }

        .btn-link:hover {
            color: rgba(74, 96, 156, 1);
        }

        #datable_4c_filter {
            float: right;
        }

        .avatar.avatar-info>.initial-wrap {
            background-color: rgba(74, 96, 156, 1) !important;
            color: #fff;
        }

        .feather-search {
            display: none;
        }

        /* Enhanced Table Styling */
        #datable_4c thead th {
            border-bottom: 2px solid rgba(74, 96, 156, 1) !important;
            font-weight: 600;
            padding: 12px 15px;
        }

        #datable_4c tbody td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .role-dropdown {
            min-width: 120px;
            text-align: left;
            position: relative;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .role-dropdown:hover {
            border-color: rgba(74, 96, 156, 1) !important;
        }

        .role-item.active {
            background-color: #f0f0f0;
            font-weight: 500;
        }

        .role-item:hover {
            color: rgba(74, 96, 156, 1);
        }

        /* Loading animation */
        .role-loading {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-left-color: rgba(74, 96, 156, 1);
            border-radius: 50%;
            animation: role-spin 1s linear infinite;
            margin-left: 5px;
            vertical-align: middle;
        }

        @keyframes role-spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <div class="container">
                                <h1>Meetings Calendar</h1>

                                <!-- Your Add Meeting Modal Trigger -->
                                {{-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                                    + Add Meeting
                                </button> --}}

                                <div id="calendar"></div>
                            </div>

                            <!-- Your Add Meeting Modal (the form you gave) -->
                            {{-- @include('admin.sections.meetings.add_modal') <!-- Put your modal form in a blade partial --> --}}

                            <!-- Meeting Details Modal -->
                            <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel"
                                aria-hidden="true" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="meetingModalLabel">Meeting Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                                            <p><strong>Client:</strong> <span id="modalClient"></span></p>
                                            <p><strong>Deal:</strong> <span id="modalDeal"></span></p>
                                            <p><strong>Type:</strong> <span id="modalType"></span></p>
                                            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                                            <p><strong>Meeting Date:</strong> <span id="modalDate"></span></p>
                                            <p><strong>Details:</strong> <span id="modalDetails"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css'
                                rel='stylesheet' />
                            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    let meetings = @json($meetings);
                                    let calendarEl = document.getElementById('calendar');

                                    let calendar = new FullCalendar.Calendar(calendarEl, {
                                        initialView: 'dayGridMonth',
                                        editable: true,
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
                                            document.getElementById('modalClient').innerText = meeting.client?.name || 'N/A';
                                            document.getElementById('modalDeal').innerText = meeting.deal?.name || 'N/A';
                                            document.getElementById('modalType').innerText = meeting.type;
                                            document.getElementById('modalAddress').innerText = meeting.address;
                                            document.getElementById('modalDate').innerText = meeting.meet_date;
                                            document.getElementById('modalDetails').innerText = meeting.details;

                                            let modal = new bootstrap.Modal(document.getElementById('meetingModal'));
                                            modal.show();
                                        },

                                        eventDrop: function(info) {
                                            updateMeetingDate(info.event);
                                        }
                                    });

                                    calendar.render();

                                    // Handle drag & drop update
                                    function updateMeetingDate(event) {
                                        fetch(`/meetings/ajax-update/${event.id}`, {
                                                method: "PATCH",
                                                headers: {
                                                    "Content-Type": "application/json",
                                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                                },
                                                body: JSON.stringify({
                                                    meet_date: event.startStr
                                                })
                                            })
                                            .then(res => res.json())
                                            .then(data => {
                                                if (!data.success) {
                                                    alert('Failed to update meeting date');
                                                    location.reload();
                                                }
                                            })
                                            .catch(() => {
                                                alert('Error updating meeting date');
                                                location.reload();
                                            });
                                    }

                                    // Handle add meeting form submit with AJAX
                                    // let addForm = document.querySelector('#addModal form');
                                    // addForm.addEventListener('submit', function(e) {
                                    //     e.preventDefault();

                                    //     let formData = new FormData(this);

                                    //     fetch("{{ route('meeting.store') }}", {
                                    //             method: "POST",
                                    //             headers: {
                                    //                 'X-CSRF-TOKEN': formData.get('_token'),
                                    //             },
                                    //             body: formData
                                    //         })
                                    //         .then(res => res.json())
                                    //         .then(data => {
                                    //             meetings.push(data);
                                    //             calendar.addEvent({
                                    //                 id: data.id,
                                    //                 title: data.subject,
                                    //                 start: data.meet_date,
                                    //                 allDay: true
                                    //             });

                                    //             let modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
                                    //             modal.hide();

                                    //             this.reset();
                                    //         })
                                    //         .catch(() => alert('Failed to add meeting'));
                                    // });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.main.scripts')

</body>

</html>
