<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="Medias/Checklist.jpg"/>
    <title>Connexion</title>
</head>
<body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="relative min-h-screen w-full bg-white">
    <div class="p-6 formRegister" x-data="app">

        <header class="flex w-full justify-between">
            <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
            </svg>

            <!-- buttons -->
            <div>
                <button type="button" @click="isLoginPage = false" x-show="isLoginPage" class="rounded-2xl border-b-2 border-b-gray-300 bg-white px-4 py-3 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">Connexion</button>

                <button type="button" @click="isLoginPage = true" x-show="!isLoginPage" class="rounded-2xl border-b-2 border-b-gray-300 bg-white px-4 py-3 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">Inscription</button>
            </div>
        </header>

        <div class="absolute left-1/2 top-1/2 mx-auto max-w-sm -translate-x-1/2 -translate-y-1/2 transform space-y-4 text-center registerForm">
            <!-- register content -->
            <div x-show="isLoginPage" class="space-y-4" id="inscription">
                <header class="mb-3 text-2xl font-bold">Créer un profil</header>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input id="firstName" name="name" required type="text" placeholder="Prénom " class="my-3 w-full border-none bg-transparent outline-none focus:outline-none firstName" />
                </div>
                <div id="lastName" name="name" required class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400 ">
                    <input type="text" placeholder="Nom" class="my-3 w-full border-none bg-transparent outline-none focus:outline-none lastName" />
                </div>
            
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400 ">
                    <input id="email" name="email" autocomplete="email" required type="text" placeholder="Email" class="my-3 w-full border-none bg-transparent outline-none focus:outline-none email" />
                </div>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input  id="password" name="password" autocomplete="current-password" required type="password" placeholder="Mot de passe" class="my-3 w-full border-none bg-transparent outline-none focus:outline-none password" />
                </div>

                <button onclick="handleRegister()" class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">S'inscrire</button>
            </div>

            <!-- login content -->
            <div x-show="!isLoginPage" class="space-y-4" id="connexion">
                <header class="mb-3 text-2xl font-bold">Se connecter</header>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input type="text" placeholder="Email" class="my-3 w-full border-none bg-transparent outline-none focus:outline-none email" />
                </div>
                <div class="flex w-full items-center space-x-2 rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input type="password" placeholder="Mot de passe" class="my-3 w-full border-none bg-transparent outline-none password" />
                </div>
                <button onclick="handleConnect()" class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400 ">Se connecter</button>
            </div>

            <div class="flex items-center space-x-4">
                <hr class="w-full border border-gray-300" />
                <div class="font-semibold text-gray-400">OU</div>
                <hr class="w-full border border-gray-300" />
            </div>
             <p class="toast text-red w-1/2 h-20 mx-auto"></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("app", () => ({
            isLoginPage: true,
        }));
    });
</script>   
<script src="/script.js"></script> 
</body>
</html>
