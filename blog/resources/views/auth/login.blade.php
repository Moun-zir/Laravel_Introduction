<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css']) <!-- Chargement de Tailwind CSS -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-semibold font-serif text-gray-800 text-center mb-6">Se connecter</h1>
        <form method="POST" action="/login" class="space-y-4">
            @csrf
            <!-- Champ Email -->
            <div>
                <label for="email" class="block text-gray-700 text-base font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Mot de passe -->
            <div>
                <label for="password" class="block text-gray-700 text-base font-medium">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>
