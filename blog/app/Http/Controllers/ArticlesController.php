<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller implements HasMiddleware
{

    use AuthorizesRequests; // Incluez le trait pour avoir accès à authorize()

    public static function middleware(): array
    {
        // Déclarer ici les middlewares pour ce contrôleur
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }
    public function index()
    {
        $articles = Article::with('user')->orderBy('created_at', 'desc')->get();
        return view('articles.articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with('user')->with(['comments' => function ($query) {
            $query->with('user');
        }])->findOrFail($id);


        // dans la méthode show()
        $article = Article::with(['comments' => function ($query) {
            $query->with('user');
        }])->findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles.create'); // Retourne la vue de création d'article
    }

    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        // vérification des permissions plus tard
        $user = Auth::user(); //On récupère l'utilisateur connecté
        $request['user_id'] = $user->id;

        $validatedData = $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $art = Article::create($validatedData);

        return redirect('/articles')->with(['success_message' => 'L\'article a été crée !']);

        // dd($validatedData);
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        $article->update($request->all());
        return redirect('/articles');
    }

    public function delete(Article $article)
    {
        $this->authorize('delete', $article);
        // vérification des permissions plus tard
        $article->delete();
        return redirect('/articles');
    }
}
