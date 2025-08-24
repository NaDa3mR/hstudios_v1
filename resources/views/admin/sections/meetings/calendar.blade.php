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
            /* height: auto;
            width: auto; */
            overflow-y: visible;
            background-color: #fff;
            /* margin-top: 44px; */
            margin: 25px;
            border-radius: 25px;
            /* big radius for oval corners */
            border: 1px solid #ccc;
            /* optional border to see the shape */
            padding: 50px;
        }

        .modal-content {
            padding: 1rem;
            background-color: #fff;
            border-radius: 0.3rem;
        }


        html,
        body {
            height: auto;
            overflow-y: auto;
            padding-bottom: 25px
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

        /* Enhanced Table Styling */
        #datable_4c thead th {
            border-bottom: 2px solid #8b422e !important;
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
            border-color: #8b422e !important;
        }

        .role-item.active {
            background-color: #f0f0f0;
            font-weight: 500;
        }

        .role-item:hover {
            color: #8b422e;
        }

        /* Loading animation */
        .role-loading {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-left-color: #8b422e;
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
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            <header class="hk-pg-header pg-header-wth-tab">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <button
                                            class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span
                                                class="icon"><span class="feather-icon"><i
                                                        data-feather="align-left"></i></span></span></button>
                                        <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                            <span class="initial-wrap rounded-8">
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-box-multiple" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <rect x="7" y="3" width="14" height="14" rx="2">
                                                        </rect>
                                                        <path
                                                            d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between flex-1">
                                            <div>
                                                <div class="pg-subtitle">Meetings</div>
                                                <h5 class="pg-title fs-5">Calendar</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-line nav-icon nav-light mt-3">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_boards">
                                                <span class="nav-icon-wrap"><span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-id" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <rect x="3" y="4" width="18" height="16"
                                                                rx="3"></rect>
                                                            <circle cx="9" cy="10" r="2"></circle>
                                                            <line x1="15" y1="8" x2="17"
                                                                y2="8"></line>
                                                            <line x1="15" y1="12" x2="17"
                                                                y2="12"></line>
                                                            <line x1="7" y1="16" x2="17"
                                                                y2="16"></line>
                                                        </svg>
                                                    </span></span>
                                                <span class="nav-link-text">Show Meetings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </header>
                            <div class="container-fluid">
                                {{-- <h1>Meetings Calendar</h1> --}}

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
