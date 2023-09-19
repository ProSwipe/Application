<?php
include('../include/header.php');
include('../include/method.php');

checkConnection();
?>

<body>
<header class="p-[2rem] flex justify-center">
    <img
        class="h-[4rem] w-[4rem]"
        src="/app/assets/logo.png"
        alt="proswipe logo"
    />
</header>

<main class="flex flex-col items-center">
    <img
        class="w-[15rem]"
        src="/app/assets/image.png"
        alt="test image"
    />

    <div class="flex items-end py-[2rem] px-[2rem] gap-[2rem]">
        <div
            class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
        >
            <img
                class="h-[2rem]"
                src="/app/assets/close.svg"
                alt="close"
            />
        </div>
        <div class="bg-blue-400 rounded-full p-[1rem]">
            <img
                class="h-[2rem]"
                src="/app/assets/close.svg"
                alt="close"
            />
        </div>
        <div
            class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
        >
            <img
                class="h-[2rem]"
                src="/app/assets/close.svg"
                alt="close"
            />
        </div>
    </div>

    <div
        class="flex bg-blue-400 rounded-[20px] h-[4rem] w-[20rem] justify-around items-center"
    >
        <img class="h-[2rem]" src="/app/assets/close.svg" alt="close" />
        <img class="h-[2rem]" src="/app/assets/close.svg" alt="close" />
        <img class="h-[2rem]" src="/app/assets/close.svg" alt="close" />
    </div>
</main>
</body>
