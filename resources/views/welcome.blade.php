@extends('layouts.app')

@section('title', 'notes-brain — comparte tus ideas')

@section('content')

<div class="landing-page">

    <header class="topbar">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-icon">
                <svg viewBox="0 0 64 64" aria-hidden="true">
                    <path
                        d="M31.8 10.5c-5.4-7-16.4-4.7-17.5 3.8-6.9-.3-11.6 7-8.3 13.2-6.1 5.1-2.5 15 5.3 15.3-.3 8.7 9.6 12.8 15.1 7.2 2.5 5.4 10.3 5.4 12.8 0 5.5 5.6 15.4 1.5 15.1-7.2 7.8-.3 11.4-10.2 5.3-15.3 3.3-6.2-1.4-13.5-8.3-13.2-1.1-8.5-12.1-10.8-17.5-3.8Z"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2.5"
                    />

                    <path
                        d="M32 12v40M22 20c5 1 7 4 7 8M42 20c-5 1-7 4-7 8M20 31c4 0 7 2 9 5M44 31c-4 0-7 2-9 5M24 43c4-1 6-3 8-6M40 43c-4-1-6-3-8-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                    />
                </svg>
            </span>

            <span>notes-brain</span>
        </a>

        <a
            href="{{ route('access', ['modo' => 'login']) }}"
            class="btn btn-small"
        >
            iniciar sesión
        </a>

    </header>


    <main class="landing-content">

        <section class="hero-card">

            <div class="hero-copy">

                <p class="eyebrow">
                    un espacio para pensar
                </p>

                <h1>
                    tus ideas también
                    <span>merecen un lugar.</span>
                </h1>

                <p class="hero-description">
                    notes-brain es un pequeño repositorio donde puedes
                    escribir pensamientos, notas, frases e ideas y compartirlas
                    con otras personas.
                </p>

                <div class="hero-actions">

                    <a
                        href="{{ route('access', ['modo' => 'login']) }}"
                        class="btn btn-primary"
                    >
                        comenzar a escribir
                        <span>→</span>
                    </a>

                    <a
                        href="{{ route('access', ['modo' => 'registro']) }}"
                        class="text-link"
                    >
                        crear una cuenta
                    </a>

                </div>

            </div>


            <div class="hero-illustration">

                <div class="floating-note note-one">
                    una idea
                </div>

                <div class="floating-note note-two">
                    para recordar ✦
                </div>

                <div class="brain-large">

                    <svg viewBox="0 0 64 64" aria-hidden="true">
                        <path
                            d="M31.8 10.5c-5.4-7-16.4-4.7-17.5 3.8-6.9-.3-11.6 7-8.3 13.2-6.1 5.1-2.5 15 5.3 15.3-.3 8.7 9.6 12.8 15.1 7.2 2.5 5.4 10.3 5.4 12.8 0 5.5 5.6 15.4 1.5 15.1-7.2 7.8-.3 11.4-10.2 5.3-15.3 3.3-6.2-1.4-13.5-8.3-13.2-1.1-8.5-12.1-10.8-17.5-3.8Z"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        />

                        <path
                            d="M32 12v40M22 20c5 1 7 4 7 8M42 20c-5 1-7 4-7 8M20 31c4 0 7 2 9 5M44 31c-4 0-7 2-9 5M24 43c4-1 6-3 8-6M40 43c-4-1  -6-3 -8-6"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                        />
                    </svg>

                </div>

            </div>

        </section>


        <section class="about-section">

            <div class="about-item">
                <span class="about-number">01</span>
                <h3>escribe</h3>
                <p>
                    Guarda pensamientos, pequeñas historias,
                    apuntes o cualquier texto que quieras conservar.
                </p>
            </div>

            <div class="about-item">
                <span class="about-number">02</span>
                <h3>comparte</h3>
                <p>
                    Tus publicaciones pueden inspirar a otras personas
                    y formar parte de este pequeño espacio colectivo.
                </p>
            </div>

            <div class="about-item">
                <span class="about-number">03</span>
                <h3>inspírate</h3>
                <p>
                    Lee las ideas de otros usuarios y encuentra
                    pensamientos con los que puedas conectar.
                </p>
            </div>

        </section>

    </main>

</div>

@endsection