@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')
    <h2>Articles</h2>
@endsection

@each('articles.index', $articles, 'article', 'articles.no-articles')
