@extends('layouts.master')

@section('article')
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center font-serif">Visitez ici nos articles</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @each('partials.article', $articles, 'article', 'partials.no-articles')
    </div>
@endsection
