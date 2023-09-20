<?php
include('../../include/header.php');
include('../../include/method.php');
include('../../database/database.php');

checkConnection();

$user = getUserFromEmail($_SESSION['email']);
?>

<body>
<header class="p-[2rem] flex justify-center">
    <h2 class="text-center text-2xl font-semibold ">
        Mon Profil
    </h2>
</header>


<div class="flex flex-col justify-center">

    <div class="max-w-7xl mx-auto px-4 py-4 sm:py-24 sm:px-6 lg:px-8">
        <form action="/dashboard/profile/profile.php" method="post" data-turbo="false">
            <div class="flex flex-col">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="name">
                        Prénom
                    </label>
                    <div class="mt-1">
                        <input autocomplete="name"
                               class="bg-gray-200 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-full shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm"
                               id="name" name="name" required type="text" value="<?php echo $user['name'] ?>">
                    </div>
                </div>

                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="email">
                        Adresse email
                    </label>
                    <div class="mt-1">
                        <input autocomplete="email"
                               class="bg-gray-200 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-full shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm"
                               id="email" name="email" required type="email" value="<?php echo $user['email'] ?>">
                    </div>
                </div>

                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="password">
                        Mot de passe
                    </label>
                    <div class="mt-1 relative">
                        <input autocomplete="current-password"
                               class="bg-gray-200 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-full shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm"
                               id="password" name="password" required type="password">
                    </div>
                </div>
            </div>
            <div class="mt-6 px-28">
                <button
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 "
                        type="submit">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<div class="flex justify-center mt-12">
    <?php include('../../include/footer.php'); ?>
</div>
</body>
