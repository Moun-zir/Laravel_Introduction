@extends('layouts.master')



@section('content')
<div class="container mx-auto mt-8 max-w-lg p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-serif font-bold text-gray-800 mb-6 text-center">Éditer l'article</h1>

    <!-- Formulaire d'édition -->
    <form action="{{ url('article/' . $article->id . '/edit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        @include('partials.article-form') <!-- Inclusion du formulaire partagé -->

        <!-- Bouton de soumission -->
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white text-base font-serif py-2 px-4 rounded transition duration-200">
            Modifier l'article
        </button>
    </form>

    <!-- Formulaire de suppression -->
    <form action="/article/{{ $article->id }}/delete" method="POST" class="mt-6">
        @csrf
        @method('DELETE')

        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white  text-base font-serif py-2 px-4 rounded transition duration-200">
            Supprimer l'article
        </button>
    </form>
</div>
@endsection
