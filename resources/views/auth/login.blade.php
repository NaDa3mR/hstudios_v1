<!doctype html>
<html lang="en">

    <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.main.meta')

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-signin {
            width: 500px;
            padding: 2rem;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-signin img {
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
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

    <main class="form-signin text-center">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img src="{{ asset('website-assets/favicon.png') }}" alt="Logo" width="90" height="70">

            <h1 class="h4 mb-4 fw-normal">Welcome Back</h1>

            {{-- Session error (invalid credentials) --}}
            @if (session('error'))
            <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput"
                placeholder="name@example.com" required autofocus>
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                    <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check text-start mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
            <div class="mt-3">
                <small>
                    Don’t have an account?
                    <a href="{{ route('register') }}">Register</a>
                </small>
                <br>
                <small>
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </small>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>

    @include('admin.main.scripts')
</body>

</html>






{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
