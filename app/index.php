<?php include('./include/header.php'); ?>

<body>


<main class="flex flex-col justify-center min-h-screen">
    <img
        class="h-[4rem] w-[4rem] mx-auto"
        src="/assets/logo.png"
        alt="logo"
    />

    <div class="mb-[1rem] overflow-x-hidden mx-auto max-w-[1000px]">
        <div class="my-[1rem] flex items-center overflow-x-hidden relative">
             <img
                class="absolute left-[90%]"
                src="/assets/image2.png"
                alt=""
            />
            <img
                class="mx-auto w-[70%]"
                src="/assets/image.png"
                alt=""
            />
            <img
                class="absolute right-[90%]"
                src="/assets/image3.png"
                alt=""
            />
        </div>

        <p class="text-center w-[15rem] mx-auto">Explorer des métiers de l’informatique</p>
    </div>

    <div class="flex justify-center">
        <a data-turbo-preload href="/auth/register.php"
            class="transform hover:scale-110 motion-reduce:transform-none duration-300 bg-sky-600 hover:bg-sky-700 text-gray-100 py-4 px-20 p-12 rounded-xl inline-flex items-center">
            <span>Se créer un compte</span>
        </a>
    </div>
    <div class="flex justify-center mt-3">
        <p>Vous avez déjà un compte? <a data-turbo-preload href="/auth/login.php" class="text-sky-600 hover:text-sky-600">Connectez-vous</a></p>
    </div>
</main>


</body>
