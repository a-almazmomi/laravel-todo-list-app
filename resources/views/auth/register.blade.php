@extends('layout.default')
@section('styles')
    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        button {
            margin-top: 15px
        }
    </style>
@endsection

@section('content')
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <img class="mb-4" src="{{ asset('assets/logo.jpg') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Create Your Account</h1>
            <div class="form-floating">
                <input name="name" type="text" class="form-control" id="floatingInput"
                    placeholder="Abdulmajeed Abdullah">
                <label for="floatingInput">Full Name</label>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            {{-- I Can Do This Checking By Two Ways: --}}
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
            <a href="{{ route('login') }}">Have already account</a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2025</p>
        </form>
    </main>
@endsection
