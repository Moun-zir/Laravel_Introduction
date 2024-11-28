<!-- Champ pour le titre -->
<div class="mb-4">
    <label for="title" class="block text-gray-700 font-medium mb-2 text-base font-serif">Titre de l'article</label>
    <input
        type="text"
        id="title"
        name="title"
        placeholder="Entrez le titre"
        value="{{ old('title', isset($article->title) ? $article->title : null) }}"
        class="w-full border-gray-300  shadow-sm text-base font-serif focus:ring-blue-500 focus:border-blue-500">
        @error('title')
            <div>{{ $message }}</div>
        @enderror
</div>

<!-- Champ pour le contenu -->
<div class="mb-4">
    <label for="body" class="block text-gray-700 font-medium mb-2 text-base font-serif">Contenu</label>
    <textarea
            id="body"
            name="body"
            rows="5"
            placeholder="Entrez le contenu de l'article"
            class="w-full border-gray-300 text-base font-serif shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('body', isset($article->body) ? $article->body : null) }}
    </textarea>
    @error('body')
        <div>{{ $message }}</div>
    @enderror
</div>

<!-- Champ pour l'image -->
<div class="mb-4">
    <label for="image" class="block text-gray-700 font-medium mb-2 text-base font-serif">Image</label>
    <input type="file"
           id="image"
           name="image"
           accept="image/*"
           class="w-full border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        @error('image')
            <div>{{ $message }}</div>
        @enderror
</div>
