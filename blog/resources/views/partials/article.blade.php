<article class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition font-serif">
   <p class="text-sm font-serif text-gray-600 mb-2">Article rédigé par : <strong class="text-blue-500 font-serif">{{ $article->user->name }}</strong></p>
   <h3 class="text-xs font-semibold font-serif text-gray-800 mb-4">Titre de l'article : {{ $article->title }}</h3>
   <a href="/show-article/{{ $article->id }}" class="text-blue-500 hover:underline font-serif">Lire l'article en entier</a>
</article>
