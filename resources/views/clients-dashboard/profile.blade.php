<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Client Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('clients-dashboard.main.meta')

    <style>
        .profile-img {
            border-radius: 50%;
            border: 3px solid #8b422e;
            object-fit: cover;
        }

        .card-header {
            background-color: #8b422e !important;
            color: #ffffff;
            font-weight: bold;
        }
        .btn {
            background-color: #8b422e !important;
            color: #ffffff;
            /* font-weight: bold; */
        }
        .btn:hover {
            background-color: #ffffff !important;
            color: #8b422e;
            /* font-weight: bold; */
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        {{-- Sidebar --}}
        @include('clients-dashboard.main.sidebar')

        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <div class="container mt-4">
                    <div class="row">
                        <!-- Left side: Profile Info -->
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-header">My Profile</div>
                                <div class="card-body text-center">
                                    <img src="{{ auth('client')->user()->getFirstMediaUrl('client_images') ?: asset('images/default.png') }}"
                                         alt="Profile Image"
                                         class="profile-img mb-3"
                                         width="150" height="150">

                                    <h4>{{ auth('client')->user()->name }}</h4>
                                    <p class="text-muted">{{ auth('client')->user()->email }}</p>

                                    <p><strong>Company:</strong> {{ auth('client')->user()->company_name ?? '-' }}</p>
                                    <p><strong>Field:</strong> {{ auth('client')->user()->company_field ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right side: Update Form -->
                        <div class="col-md-8">
                            <div class="card shadow-sm">
                                <div class="card-header">Update Profile</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('client.profile.update', $client->id ) }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ auth('client')->user()->name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{ auth('client')->user()->email }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name"
                                                   value="{{ auth('client')->user()->company_name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="company_field" class="form-label">Company Field</label>
                                            <input type="text" class="form-control" id="company_field" name="company_field"
                                                   value="{{ auth('client')->user()->company_field }}">
                                        </div>

                                        <button type="submit" class="btn">Update Profile</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Change Password -->
                            <div class="card shadow-sm mt-4">
                                <div class="card-header">Change Password</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('client.updatePassword') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div>

                                        <button type="submit" class="btn">Update Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
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



















































{{-- <!doctype html>
@include('clients-dashboard.main.html')

<head>
    <meta charset="utf-8" />
    <title>Client Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('clients-dashboard.main.meta')

    <style>
        .profile-card {
            margin-top: 30px;
            backdrop-filter: blur(30px);
            background-color: #f0f0f0;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-custom {
            background-color: #8b422e;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #6e3224;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('clients-dashboard.main.sidebar')

        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">

                            @include('clients-dashboard.deals.topbar')

                            <section class="text-center">
                                <div class="card mx-4 mx-md-5 shadow-5-strong profile-card">
                                    <div class="card-body py-5 px-md-5">
                                        <h2 class="fw-bold mb-4">My Profile</h2>

                                        <div class="card mb-4 p-3 text-start">
                                            <h4 class="fw-bold">{{ $client->name ?? 'Unnamed Client' }}</h4>
                                            <p><strong>Email:</strong> {{ $client->email }}</p>
                                            <p><strong>Company Name:</strong> {{ $client->company_name ?? '-' }}</p>
                                            <p><strong>Company Field:</strong> {{ $client->company_field ?? '-' }}</p>
                                        </div>

                                        <h4 class="fw-bold mb-3">Update Information</h4>
                                        <form action="{{ route('client.profile.update', $client->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name', $client->name) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ old('email', $client->email) }}" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        value="{{ old('company_name', $client->company_name) }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Company Field</label>
                                                    <input type="text" class="form-control" name="company_field"
                                                        value="{{ old('company_field', $client->company_field) }}">
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-custom">Save Changes</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('clients-dashboard.main.scripts')
</body>
</html> --}}
