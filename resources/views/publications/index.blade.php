@extends('layouts.app')

@section('title', 'Mis pensamientos — notes-brain')

@section('content')

<div class="app-page">

    <header class="dashboard-header">

        <a href="{{ route('publications.index') }}" class="brand">

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


        <div class="user-menu">

            <span class="welcome-user">
                hola, {{ auth()->user()->name }}
            </span>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button class="btn btn-small btn-outline">
                    cerrar sesión
                </button>
            </form>

        </div>

    </header>


    <main class="dashboard-layout">


        {{-- FRASE MOTIVACIONAL --}}

        <aside class="motivation-column">

            <div class="motivation-card">

                <span class="card-label">
                    para ti
                </span>

                <div class="motivation-icon">
                    ✦
                </div>

                <p class="motivation-text">
                    {{ $motivation ?: 'Escribe una pequeña frase que quieras recordar hoy.' }}
                </p>

                <form
                    action="{{ route('motivation.update') }}"
                    method="POST"
                    class="motivation-form"
                >

                    @csrf

                    <input
                        type="text"
                        name="motivation"
                        maxlength="160"
                        value="{{ $motivation }}"
                        placeholder="una frase para ti..."
                    >

                    <button type="submit">
                        guardar
                    </button>

                </form>

            </div>

        </aside>


        {{-- PUBLICACIONES --}}

        <section class="feed">

            <div class="feed-heading">

                <div>

                    <span class="tiny-label">
                        comunidad
                    </span>

                    <h1>
                        pensamientos
                        <span>compartidos.</span>
                    </h1>

                </div>

                <div class="feed-count">
                    {{ $publications->count() }}
                    {{ $publications->count() === 1 ? 'nota' : 'notas' }}
                </div>

            </div>


            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            @if(session('like_message'))

                <div class="toast-message">
                    {{ session('like_message') }}
                </div>

            @endif


            @if($publications->isEmpty())

                <div class="empty-state">

                    <div class="empty-icon">
                        ✎
                    </div>

                    <h2>
                        todavía no hay pensamientos
                    </h2>

                    <p>
                        Sé la primera persona en dejar algo bonito aquí.
                    </p>

                    <a
                        href="{{ route('publications.create') }}"
                        class="btn btn-primary"
                    >
                        escribir algo
                    </a>

                </div>

            @else

                <div class="publication-list">

                    @foreach($publications as $publication)

                        <article class="publication-card">

                            <div class="publication-top">

                                <div class="author">

                                    <div class="avatar">
                                        {{ mb_strtoupper(mb_substr($publication->user->name, 0, 1)) }}
                                    </div>

                                    <div>

                                        <strong>
                                            {{ $publication->user->name }}
                                        </strong>

                                        <small>
                                            {{ $publication->created_at->diffForHumans() }}
                                        </small>

                                    </div>

                                </div>

                                <span class="paper-dot"></span>

                            </div>


                            <div class="publication-content">
                                {{ $publication->content }}
                            </div>


                            <div class="publication-bottom">

                                <form
                                    action="{{ route('publications.like', $publication) }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="like-button {{ $publication->liked_by_me ? 'liked' : '' }}"
                                    >

                                        <span class="heart">
                                            {{ $publication->liked_by_me ? '♥' : '♡' }}
                                        </span>

                                        <span>
                                            {{ $publication->likes_count }}
                                        </span>

                                        <small>
                                            {{ $publication->likes_count === 1 ? 'me gusta' : 'me gusta' }}
                                        </small>

                                    </button>

                                </form>

                            </div>

                        </article>

                    @endforeach

                </div>

            @endif

        </section>

    </main>


    {{-- BOTÓN NUEVA PUBLICACIÓN --}}

    <a
        href="{{ route('publications.create') }}"
        class="new-project-button"
    >

        <span class="plus-icon">+</span>

        <span>
            nuevo
            <strong>pensamiento</strong>
        </span>

    </a>

</div>

@endsection