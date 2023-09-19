<?php include('./include/header.php'); ?>

<body>


<div class="flex flex-col justify-center min-h-screen">
    <div class="flex justify-center">
        <a data-turbo-preload href="/auth/register.php"
            class="transform hover:scale-110 motion-reduce:transform-none duration-300 bg-sky-600 hover:bg-sky-700 text-gray-100 py-4 px-20 p-12 rounded-xl inline-flex items-center">
            <span>Se créer un compte</span>
        </a>
    </div>
    <div class="flex justify-center mt-3">
        <p>Vous avez déjà un compte? <a data-turbo-preload href="/auth/login.php" class="text-sky-600 hover:text-sky-600">Connectez-vous</a></p>
    </div>
</div>


</body>
