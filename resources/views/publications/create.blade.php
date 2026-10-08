@extends('layouts.app')

@section('title', 'Nuevo pensamiento — notes-brain')

@section('content')

<div class="editor-page">

    <header class="dashboard-header">

        <a
            href="{{ route('publications.index') }}"
            class="brand"
        >

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


        <div class="editor-header-actions">

            <span class="editing-label">
                nuevo pensamiento
            </span>

            <a
                href="{{ route('publications.index') }}"
                class="btn btn-small btn-outline"
            >
                ← volver
            </a>

        </div>

    </header>


    <main class="editor-layout">


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
                    {{ $motivation ?: 'Escribe algo que quieras recordar.' }}
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


        {{-- HOJA DE ESCRITURA --}}

        <section class="paper-editor">

            <div class="paper-header">

                <div>
                    <span class="paper-label">
                        nota personal
                    </span>

                    <h1>
                        escribe lo que
                        <span>tengas en mente.</span>
                    </h1>
                </div>

                <div class="character-counter">
                    <span id="characterCount">0</span>
                    / 1024
                </div>

            </div>


            @if($errors->any())

                <div class="alert alert-error">

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            @endif


            <form
                action="{{ route('publications.store') }}"
                method="POST"
                class="editor-form"
            >

                @csrf

                <textarea
                    id="content"
                    name="content"
                    maxlength="1024"
                    placeholder="Empieza a escribir aquí..."
                    required
                >{{ old('content') }}</textarea>


                <div class="editor-footer">

                    <p>
                        Puedes escribir hasta 1024 caracteres.
                    </p>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        publicar
                        <span>✦</span>
                    </button>

                </div>

            </form>

        </section>

    </main>

</div>

@endsection


@section('scripts')

<script>

    const textarea = document.getElementById('content');
    const counter = document.getElementById('characterCount');

    function updateCounter() {
        counter.textContent = textarea.value.length;
    }

    textarea.addEventListener('input', updateCounter);

    updateCounter();

</script>

@endsection