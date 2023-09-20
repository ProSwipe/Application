<?php
include('../include/header.php');
include('../include/method.php');
include('../database/database.php')
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
        </div>

    <div class="flex items-end py-[2rem] px-[2rem] gap-[2rem]">
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
        <button class="bg-blue-400 rounded-full p-[1rem]">
            <img
                class="h-[2rem]"
                src="../assets/close.svg"
            />
        </button>
        <button
            class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
        >
            <img
                class="h-[2rem]"
                src="../assets/close.svg"
                alt="close"
            />
        </button>
    </div>
    
    <?php include('../include/footer.php'); ?>
</main>
</body>
