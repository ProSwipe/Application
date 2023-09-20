<?php
include('../../include/header.php');
include('../../include/method.php');

checkConnection();

if (!empty($_GET['logout'])) {
    //session_destroy();
    //header('Location: /');
    echo "test";
}
?>

<body>

<div class="flex justify-center">
    <div class="w-40 rounded-full ring-4 ring-primary ring-offset-base-100 ring-offset-2 mt-10">
        <img class="rounded-full"
             src="../../assets/profil_vide-2143549024.jpg" />

    </div>
</div>


<div class="font-bold flex justify-center mt-2">
    <p>
        Valentin
    </p>
</div>

<div class="flex flex-col px-[4rem]">

    <div class="mt-12 flex justify-center">
        <a data-turbo-preload href="/dashboard/profile/profile.php"
           class="text-center transform hover:scale-110 motion-reduce:transform-none duration-300 bg-sky-600 hover:bg-sky-700 text-gray-100 py-4 px-12 rounded-xl items-center w-full">
            <span>Mon profil</span>
        </a>

    </div>
    <div class="mt-6 flex justify-center">
        <a data-turbo-preload href="/dashboard/profile/interests.php"
           class="text-center transform hover:scale-110 motion-reduce:transform-none duration-300 bg-sky-600 hover:bg-sky-700 text-gray-100 py-4 px-12 rounded-xl items-center w-full">
            <span>Mes centres d'intérêts</span>
        </a>

    </div>
    <div class="mt-6 flex justify-center">
        <a data-turbo="false" href="/dashboard/profile/index.php?logout=true"
           class="text-center transform hover:scale-110 motion-reduce:transform-none duration-300 bg-red-600 hover:bg-red-700 text-gray-100 py-4 px-12 rounded-xl items-center w-full">
            <span>Se déconnecter</span>
        </a>

    </div>
</div>
<div class="flex justify-center mt-12">
    <?php include('../../include/footer.php'); ?>
</div>
</body>