<template>
    <div class="bg-gray-100 font-sans leading-normal tracking-normal">
      <!-- Barre de navigation -->
      <nav class="bg-blue-400 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
          <!-- Logo -->
          <div class="text-white font-bold text-xl">
            <router-link to="/" class="hover:text-blue-200 font-serif text-base transition">
              Laravel 101
            </router-link>
          </div>
          <!-- Liens de navigation -->
          <div class="flex items-center space-x-6">
            <router-link
              to="/contact-us"
              class="text-white hover:text-blue-200 text-base font-serif transition"
            >
              Contactez-nous
            </router-link>
            <router-link
              to="/articles"
              class="text-white hover:text-blue-200 text-base font-serif transition"
            >
              Articles
            </router-link>
            <template v-if="canCreateArticle">
              <router-link
                to="/articles/create"
                class="bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 text-sm font-serif transition"
              >
                Créer un article
              </router-link>
            </template>
            <template v-if="!isAuthenticated">
              <router-link
                to="/register"
                class="text-white hover:text-blue-200 text-sm font-serif transition"
              >
                Créer un compte
              </router-link>
              <router-link
                to="/login"
                class="text-white hover:text-blue-200 text-sm font-serif transition"
              >
                Login
              </router-link>
            </template>
            <template v-else>
              <router-link
                to="/profile"
                class="bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 text-sm font-serif transition"
              >
                Votre profil
              </router-link>
              <form @submit.prevent="logout" class="inline-flex items-center">
                <button
                  type="submit"
                  class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-blue-800 text-sm font-serif transition"
                >
                  Logout
                </button>
              </form>
            </template>
          </div>
        </div>
      </nav>

      <!-- Contenu principal -->
      <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
          <slot name="title"></slot>
        </h1>
        <div>
          <slot name="content"></slot>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: "Master",
    data() {
      return {
        isAuthenticated: false, // Changez selon votre logique d'authentification
        canCreateArticle: false, // Ajoutez la logique pour vérifier les permissions
      };
    },
    methods: {
      logout() {
        // Ajouter votre logique de déconnexion ici
        console.log("Déconnexion");
        this.isAuthenticated = false;
      },
    },
  };
  </script>

  <style>
  /* Ajoutez des styles spécifiques si nécessaire */
  </style>
