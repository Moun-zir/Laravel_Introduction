@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Lien pour éditer l'article -->
        <a href="/article/{{ $article->id }}/edit"
           class="inline-block bg-blue-500 text-white px-4 py-2 font-serif text-base rounded hover:bg-blue-600 transition">
            Éditer l'article
        </a>

        <!-- Contenu de l'article -->
        <div class="bg-white shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 font-serif text-2xl">Contenu de l'article</h2>
            <p class="text-gray-700 text-lg mb-4 font-serif text-base">{{ $article->body }}</p>
            <p class="text-sm text-gray-600 font-serif text-xl">Article publié par :
                <strong class="text-blue-500 font-serif text-xl">{{ $article->user->name }}</strong>
            </p>
        </div>

        <!-- Section des commentaires -->
        <div class="bg-gray-50 shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 font-serif text-3xl">Les commentaires de l'article :</h2>

            @forelse($article->comments as $comment)
                <div class="border-b border-gray-200 pb-4 mb-4">
                    <p class="text-sm text-gray-600">
                        <strong class="text-blue-500 font-serif text-base">{{ $comment->user->name }}</strong> a réagi :
                    </p>
                    <p class="text-gray-700 font-serif text-base">{{ $comment->comment }}</p>
                    <p class="text-xs text-gray-500 mt-2 font-serif text-xl">
                        ⏰ {{ $comment->created_at->diffForHumans() }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">Aucun commentaire pour cet article.</p>
            @endforelse
        </div>
    </div>
@endsection
