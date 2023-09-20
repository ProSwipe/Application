<?php
include('../include/header.php');
include('../include/method.php');

checkConnection();
// $ = isset($_GET['search']) ? $_GET['search'] : '';
// $errors = array();
// $professionals = array();
//
// if (!empty($searchTerm)) {
//     $professionals = getProFromJob($searchTerm);
//
//     if (empty($professionals)) {
//         $errors[] = "Aucun profil trouvé pour le métier " . $searchTerm . ".";
//     }
// }
?>

<body>

<header class="p-[2rem] flex justify-center">
    <img
        class="h-[4rem] w-[4rem]"
        src="../assets/logo.png"
        alt="proswipe logo"
    />
</header>

<main class="flex flex-col items-center">
    <img
        class="w-[15rem]"
        src="../assets/image.png"
        alt="test image"
    />

    <div action="/dashboard/index.php" method="get" data-turbo="false" class="flex items-end py-[2rem] px-[2rem] gap-[2rem]">
<!-- <form action="/dashboard/search/index.php" method="get" data-turbo="false" -->
<!--                   class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-3xl text-sm px-2 py-2 text-center"> -->
<!--                 <input type="hidden" name="search" value="Développeur web"> -->
<!--                 <button type="submit">Développeur web</button> -->
<!--             </form> -->
<!---->
        <form action="/dashboard/index.php" method="POST" data-turbo="false">
            <input type="hidden" name="dislike" value="dislike"/>
            <button
                type="submit"
                class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
            >
                <img
                    class="h-[2rem]"
                    src="../assets/close.svg"
                    alt="close"
                />
            </button>
        </form>
        <div class="bg-blue-400 rounded-full p-[1rem]">
            <img
                class="h-[2rem]"
                src="../assets/close.svg"
                alt="close"
            />
        </div>
        <div
            class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
        >
            <img
                class="h-[2rem]"
                src="../assets/close.svg"
                alt="close"
            />
        </div>
    </div>

    <?php include('../include/footer.php'); ?>
</main>
</body>
