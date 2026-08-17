@extends('layouts.app')

@section('content')

<style>
    .login-page {
        min-height: calc(100vh - 56px);
        background: #f4f7fb;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .login-wrapper {
        width: 100%;
        max-width: 1050px;
        background: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.10);
    }

    .login-brand-panel {
        background: linear-gradient(145deg, #17345f 0%, #10294c 100%);
        color: #ffffff;
        padding: 55px 45px;
        min-height: 600px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .login-brand-panel::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.10);
        top: -100px;
        right: -100px;
    }

    .login-brand-panel::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.08);
        bottom: -100px;
        left: -80px;
    }

    .brand-content,
    .brand-footer {
        position: relative;
        z-index: 2;
    }

    .brand-logo {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: #3b82f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 28px;
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.25);
    }

    .brand-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .brand-description {
        color: rgba(255, 255, 255, 0.72);
        line-height: 1.7;
        max-width: 400px;
        font-size: 15px;
    }

    .feature-list {
        margin-top: 35px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
        color: rgba(255, 255, 255, 0.88);
        font-size: 14px;
    }

    .feature-icon {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: rgba(255, 255, 255, 0.10);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #60a5fa;
    }

    .brand-footer {
        color: rgba(255, 255, 255, 0.45);
        font-size: 12px;
    }

    .login-form-panel {
        padding: 55px 55px;
        display: flex;
        align-items: center;
    }

    .login-form-container {
        width: 100%;
        max-width: 430px;
        margin: auto;
    }

    .login-heading {
        font-size: 28px;
        font-weight: 700;
        color: #172b4d;
        margin-bottom: 8px;
    }

    .login-subheading {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 32px;
    }

    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .login-input {
        height: 48px;
        border: 1px solid #dbe2ea;
        border-radius: 9px;
        padding-left: 43px;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .login-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.10);
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        z-index: 3;
    }

    .password-toggle {
        position: absolute;
        right: 13px;
        top: 50%;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: #94a3b8;
        padding: 4px;
        cursor: pointer;
        z-index: 3;
    }

    .password-toggle:hover {
        color: #475569;
    }

    .remember-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 18px 0 25px;
    }

    .remember-label {
        font-size: 13px;
        color: #64748b;
    }

    .forgot-link {
        font-size: 13px;
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }

    .login-button {
        height: 48px;
        width: 100%;
        border: 0;
        border-radius: 9px;
        background: #2563eb;
        color: #ffffff;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .login-button:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.20);
    }

    .security-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        color: #94a3b8;
        font-size: 12px;
        margin-top: 25px;
    }

    @media (max-width: 991px) {

        .login-brand-panel {
            min-height: auto;
            padding: 40px;
        }

        .brand-footer {
            margin-top: 40px;
        }

        .login-form-panel {
            padding: 45px 35px;
        }

    }

    @media (max-width: 575px) {

        .login-page {
            padding: 20px 12px;
        }

        .login-brand-panel {
            padding: 35px 28px;
        }

        .login-form-panel {
            padding: 35px 25px;
        }

        .brand-title {
            font-size: 26px;
        }

        .login-heading {
            font-size: 24px;
        }

    }
</style>


<div class="login-page">

    <div class="login-wrapper">

        <div class="row g-0">


            {{-- =========================================
                 Branding Panel
            ========================================== --}}

            <div class="col-lg-6">

                <div class="login-brand-panel">

                    <div class="brand-content">

                        <div class="brand-logo">
                            <i class="bi bi-award-fill"></i>
                        </div>


                        <div class="brand-title">
                            Certificate Portal
                        </div>


                        <div class="brand-description">

                            Manage students, generate certificates,
                            and keep your certification workflow
                            organized from one secure portal.

                        </div>


                        <div class="feature-list">

                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <span>
                                    Manage student records
                                </span>

                            </div>


                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="bi bi-award"></i>
                                </div>

                                <span>
                                    Generate professional certificates
                                </span>

                            </div>


                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>

                                <span>
                                    Import students in bulk
                                </span>

                            </div>


                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="bi bi-lightning"></i>
                                </div>

                                <span>
                                    Process certificates through queues
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="brand-footer">

                        © {{ date('Y') }} Certificate Portal.
                        Administration System.

                    </div>

                </div>

            </div>


            {{-- =========================================
                 Login Form
            ========================================== --}}

            <div class="col-lg-6">

                <div class="login-form-panel">

                    <div class="login-form-container">


                        <div class="login-heading">
                            Welcome back
                        </div>


                        <div class="login-subheading">
                            Sign in to access the administration portal.
                        </div>


                        @if(session('status'))

                            <div class="alert alert-success small">

                                <i class="bi bi-check-circle me-1"></i>

                                {{ session('status') }}

                            </div>

                        @endif


                        @if($errors->any())

                            <div class="alert alert-danger small">

                                <i class="bi bi-exclamation-circle me-1"></i>

                                {{ $errors->first() }}

                            </div>

                        @endif


                        <form
                            method="POST"
                            action="{{ route('login') }}"
                        >

                            @csrf


                            {{-- Email --}}

                            <div class="mb-3">

                                <label
                                    for="email"
                                    class="form-label"
                                >
                                    Email Address
                                </label>


                                <div class="input-wrapper">

                                    <i class="bi bi-envelope input-icon"></i>

                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control login-input @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus
                                        placeholder="admin@example.com"
                                    >

                                </div>


                                @error('email')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Password --}}

                            <div class="mb-3">

                                <label
                                    for="password"
                                    class="form-label"
                                >
                                    Password
                                </label>


                                <div class="input-wrapper">

                                    <i class="bi bi-lock input-icon"></i>


                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control login-input @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="Enter your password"
                                    >


                                    <button
                                        type="button"
                                        class="password-toggle"
                                        id="togglePassword"
                                        aria-label="Show password"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </button>

                                </div>


                                @error('password')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Remember / Forgot --}}

                            <div class="remember-row">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <label
                                        class="form-check-label remember-label"
                                        for="remember"
                                    >
                                        Remember me
                                    </label>

                                </div>


                                @if(Route::has('password.request'))

                                    <a
                                        href="{{ route('password.request') }}"
                                        class="forgot-link"
                                    >
                                        Forgot password?
                                    </a>

                                @endif

                            </div>


                            {{-- Login Button --}}

                            <button
                                type="submit"
                                class="login-button"
                            >

                                <i class="bi bi-box-arrow-in-right me-1"></i>

                                Sign In

                            </button>


                        </form>


                        <div class="security-note">

                            <i class="bi bi-shield-check"></i>

                            Secure administrator access

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const toggle = document.getElementById('togglePassword');

        const password = document.getElementById('password');


        if (toggle && password) {

            toggle.addEventListener('click', function () {

                const isPassword =
                    password.getAttribute('type') === 'password';


                password.setAttribute(
                    'type',
                    isPassword ? 'text' : 'password'
                );


                const icon = toggle.querySelector('i');


                icon.classList.toggle(
                    'bi-eye',
                    !isPassword
                );

                icon.classList.toggle(
                    'bi-eye-slash',
                    isPassword
                );


                toggle.setAttribute(
                    'aria-label',
                    isPassword
                        ? 'Hide password'
                        : 'Show password'
                );

            });

        }

    });

</script>

@endsection