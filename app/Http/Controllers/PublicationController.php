<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::query()
            ->with('user')
            ->withCount('likes')
            ->latest()
            ->get()
            ->map(function ($publication) {
                $publication->liked_by_me = $publication
                    ->likes()
                    ->where('user_id', auth()->id())
                    ->exists();

                return $publication;
            });

        return view('publications.index', [
            'publications' => $publications,
            'motivation' => auth()->user()->motivation,
        ]);
    }

    public function create()
    {
        return view('publications.create', [
            'motivation' => auth()->user()->motivation,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => [
                'required',
                'string',
                'max:1024',
            ],
        ], [
            'content.required' => 'Escribe algo antes de publicar.',
            'content.max' => 'Tu publicación no puede superar los 1024 caracteres.',
        ]);

        Publication::create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('publications.index')
            ->with('success', 'Tu pensamiento fue publicado ✨');
    }

    public function like(Publication $publication)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('publication_id', $publication->id)
            ->first();

        if ($like) {
            $like->delete();

            return back()->with('like_message', 'Me gusta eliminado.');
        }

        Like::create([
            'user_id' => auth()->id(),
            'publication_id' => $publication->id,
        ]);

        return back()->with('like_message', '¡Le diste me gusta! ♥');
    }

    public function updateMotivation(Request $request)
    {
        $validated = $request->validate([
            'motivation' => [
                'nullable',
                'string',
                'max:160',
            ],
        ], [
            'motivation.max' => 'La frase no puede superar los 160 caracteres.',
        ]);

        auth()->user()->update([
            'motivation' => $validated['motivation'],
        ]);

        return back()->with('motivation_saved', true);
    }
}