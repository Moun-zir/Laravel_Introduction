@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-6">

    <form method="POST" action="{{ url('articles/create') }}" enctype="multipart/form-data" class="max-w-lg mx-auto space-y-6 bg-white mb-10 relative bottom-10 shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-serif font-semibold text-gray-800 mb-6 text-center">Créer un nouvel article</h1>
        @csrf <!-- Protection contre les attaques CSRF -->

        @include('partials.article-form') <!-- Inclusion du formulaire -->

        <!-- Bouton de soumission -->
        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
            Créer l'article
        </button>
    </form>
</div>
@endsection
