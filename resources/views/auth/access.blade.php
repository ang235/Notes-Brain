@extends('layouts.app')

@section('title', 'Acceso — notes-brain')

@section('content')

<div class="auth-page">

    <div class="auth-decoration auth-decoration-one"></div>
    <div class="auth-decoration auth-decoration-two"></div>

    <header class="simple-header">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-icon">
                <svg viewBox="0 0 64 64">
                    <path
                        d="M31.8 10.5c-5.4-7-16.4-4.7-17.5 3.8-6.9-.3-11.6 7-8.3 13.2-6.1 5.1-2.5 15 5.3 15.3-.3 8.7 9.6 12.8 15.1 7.2 2.5 5.4 10.3 5.4 12.8 0 5.5 5.6 15.4 1.5 15.1-7.2 7.8-.3 11.4-10.2 5.3-15.3 3.3-6.2-1.4-13.5-8.3-13.2-1.1-8.5-12.1-10.8-17.5-3.8Z"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2.5"
                    />
                    <path
                        d="M32 12v40M22 20c5 1 7 4 7 8M42 20c-5 1-7 4-7 8M20 31c4 0 7 2 9 5M44 31c-4 0-7 2-9 5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                    />
                </svg>
            </span>

            notes-brain
        </a>

        <a href="{{ route('home') }}" class="btn btn-outline">
            ← volver
        </a>

    </header>


    <main class="auth-container">

        <div class="auth-card">

            <div class="auth-heading">

                <span class="tiny-label">
                    notes-brain
                </span>

                @if($mode === 'registro')

                    <h1>
                        crea tu pequeño
                        <span>espacio.</span>
                    </h1>

                    <p>
                        Regístrate para guardar y compartir tus pensamientos.
                    </p>

                @else

                    <h1>
                        qué bueno
                        <span>verte.</span>
                    </h1>

                    <p>
                        Entra a tu espacio y continúa escribiendo.
                    </p>

                @endif

            </div>


            @if($errors->any())

                <div class="alert alert-error">
                    <strong>Revisa lo siguiente:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif


            @if($mode === 'registro')

                <form
                    action="{{ route('register') }}"
                    method="POST"
                    class="auth-form"
                >

                    @csrf

                    <div class="form-group">
                        <label for="name">nombre</label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="¿Cómo te llamas?"
                            maxlength="80"
                            required
                        >
                    </div>


                    <div class="form-group">
                        <label for="email">correo electrónico</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu@correo.com"
                            required
                        >
                    </div>


                    <div class="form-row">

                        <div class="form-group">
                            <label for="password">
                                contraseña
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="mínimo 8 caracteres"
                                minlength="8"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">
                                confirmar
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="repite tu contraseña"
                                minlength="8"
                                required
                            >
                        </div>

                    </div>


                    <button class="btn btn-primary btn-full">
                        crear mi cuenta
                        <span>→</span>
                    </button>

                </form>


                <div class="auth-switch">

                    ¿Ya tienes una cuenta?

                    <a href="{{ route('access', ['modo' => 'login']) }}">
                        iniciar sesión
                    </a>

                </div>

            @else

                <form
                    action="{{ route('login') }}"
                    method="POST"
                    class="auth-form"
                >

                    @csrf

                    <div class="form-group">
                        <label for="email">correo electrónico</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu@correo.com"
                            required
                        >
                    </div>


                    <div class="form-group">
                        <label for="password">contraseña</label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="tu contraseña"
                            required
                        >
                    </div>


                    <label class="checkbox-label">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        <span>recordarme</span>

                    </label>


                    <button class="btn btn-primary btn-full">
                        ingresar
                        <span>→</span>
                    </button>

                </form>


                <div class="auth-switch">

                    ¿Todavía no tienes cuenta?

                    <a href="{{ route('access', ['modo' => 'registro']) }}">
                        crear una cuenta
                    </a>

                </div>

            @endif

        </div>

    </main>

</div>

@endsection