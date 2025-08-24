<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-register {
            width: 500px;
            padding: 2rem;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        .form-register img {
            display: block;
            margin: 0 auto 20px;
        }

        .btn-primary {
            background-color: #8b422e;
            border-color: #8b422e;
        }

        .btn-primary:hover {
            background-color: #6e3323;
            border-color: #6e3323;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

    <main class="form-register text-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <img src="{{ asset('website-assets/favicon.png') }}" alt="Logo" width="90" height="70">
            <h1 class="h4 mb-4 fw-normal">Create Account</h1>

            {{-- Session error --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Name --}}
            <div class="form-floating mb-3">
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror"
                       id="floatingName"
                       placeholder="Your Name"
                       required autofocus>
                <label for="floatingName">Full Name</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-floating mb-3">
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror"
                       id="floatingEmail"
                       placeholder="name@example.com"
                       required>
                <label for="floatingEmail">Email address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-floating mb-3">
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="floatingPassword"
                       placeholder="Password"
                       required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-floating mb-3">
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       id="floatingPasswordConfirm"
                       placeholder="Confirm Password"
                       required>
                <label for="floatingPasswordConfirm">Confirm Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>

            {{-- Login link --}}
            <div class="mt-3">
                <small>
                    Already have an account?
                    <a href="{{ route('login') }}">Sign in</a>
                </small>
            </div>
        </form>
    </main>

    @include('admin.main.scripts')
</body>
</html>







{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
