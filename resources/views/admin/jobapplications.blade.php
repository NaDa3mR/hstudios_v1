<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title> dashboard template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')
    <style>
        .btn-link {
            color: #33475b;
        }

        .btn-link:hover {
            color: #8b422e;
        }

        #datable_4c_filter {
            float: right;
        }

        .avatar.avatar-info>.initial-wrap {
            background-color: 8b422e;
            color: #fff;
        }

        .feather-search {
            display: none;
        }

        /* Enhanced Table Styling */
        #datable_4c thead th {
            border-bottom: 2px solid 8b422e;
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
            border-color: 8b422e;
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
                            @include('admin.sections.job-applications.topbar')
                            @section('blog-header-action')
                            @endsection

                            @include('admin.sections.job-applications.table')
                        </div>

                        @include('admin.sections.job-applications.add_modal')
                        @foreach ($applications as $application)
                            @include('admin.sections.job-applications.update_modal')
                            @include('admin.sections.job-applications.delete_modal')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
    <script>
        $('.promote-btn').click(function() {
            let id = $(this).data('id');

            if (!confirm('Are you sure you want to promote this Job Application to a Candidate?')) {
                return;
            }

            $.ajax({
                url: `/job-applications/${id}/promote-to-candidate`,
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                },
                error: function() {
                    alert('Error promoting Job Application.');
                }
            });
        });

        /* -----------------------------
               Country -> City (works for many forms/modals)
               ----------------------------- */
        document.addEventListener("DOMContentLoaded", function() {
            const citiesByCountry = {
                "Egypt": ["Cairo", "Alexandria", "Giza", "Luxor", "Aswan", "Port Said"],
                "United States": ["New York", "Los Angeles", "Chicago", "Houston", "Miami"],
                "United Kingdom": ["London", "Manchester", "Birmingham", "Liverpool", "Glasgow"],
                "Canada": ["Toronto", "Vancouver", "Montreal", "Calgary", "Ottawa"]
            };

            // For each country select on the page
            document.querySelectorAll("select[name='country']").forEach(function(countrySelect) {
                // try to find the corresponding city select within the same form/modal
                const container = countrySelect.closest('form') || countrySelect.closest('.modal') ||
                    document;
                const citySelect = container.querySelector("select[name='city']");
                if (!citySelect) return;

                // populate initial city if country already selected (edit modal)
                if (countrySelect.value && citiesByCountry[countrySelect.value]) {
                    citySelect.innerHTML = '<option value="" disabled>Select city</option>';
                    citiesByCountry[countrySelect.value].forEach(function(city) {
                        const opt = document.createElement('option');
                        opt.value = city;
                        opt.textContent = city;
                        // try to preserve existing value if present (edit modal)
                        if (citySelect.dataset.current === city || citySelect.value === city) opt
                            .selected = true;
                        citySelect.appendChild(opt);
                    });
                }

                countrySelect.addEventListener("change", function() {
                    const selectedCountry = this.value;
                    citySelect.innerHTML =
                        '<option value="" disabled selected>Select city</option>';

                    if (selectedCountry && citiesByCountry[selectedCountry]) {
                        citiesByCountry[selectedCountry].forEach(function(city) {
                            const option = document.createElement("option");
                            option.value = city;
                            option.textContent = city;
                            citySelect.appendChild(option);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</body>

</html>
