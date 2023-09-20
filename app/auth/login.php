<?php
include('../include/header.php');

$errors = array();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "../database/database.php";
    include '../include/method.php';

    if (isAccExists($email)) {
        $storedPassword = getUserPassword($email);

        if (password_verify($password, $storedPassword)) {
            $_SESSION['email'] = $email;
            $_SESSION['pro'] = getAllPro();

            $fetched = getAllProOfUser(getUserFromEmail($email)['id']);
            foreach ($fetched as $pro) {
                array_shift($_SESSION['pro']);
            }

            redirect('dashboard/index.php');
            exit();
        } else {
            $errors[] = "Mauvais identifiants.";
        }
    } else {
        $errors[] = "Ce compte n'existe pas.";
    }
}
?>

<body>
<div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="text-center text-3xl font-extrabold text-sky-600">
            Connectez-vous pour accéder à votre compte
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-gray-100 py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form action="/auth/login.php" method="post" data-turbo="false">

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="email">
                        Adresse email
                    </label>
                    <div class="mt-1">
                        <input autocomplete="email"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm"
                               id="email" name="email" required
                               type="email">
                    </div>
                </div>

                <div class="mt-2">
                    <label class="block text-sm font-medium text-gray-700" for="password">
                        Mot de passe
                    </label>
                    <div class="mt-1 relative">
                        <input autocomplete="current-password"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm"
                               id="password" name="password" required
                               type="password">
                    </div>
                </div>

                <div class="mt-6">
                    <button
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                            type="submit">
                        Se connecter
                    </button>
                </div>
                <?php if (count($errors) > 0) : ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </form>
            <div class="flex items-center justify-center mt-6">
                <span class="text-gray-700 mr-2">Vous n'avez pas de compte?</span>
                <a class="font-medium text-sky-600 hover:text-sky-700" data-turbo-preload href="/auth/register.php">Inscrivez-vous</a>
            </div>
        </div>

    </div>
</div>
</body>