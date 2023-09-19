<?php
include('../../include/header.php');
include('../../include/method.php');
include('../../database/database.php');

checkConnection();

$idProfil = isset($_GET['id']) ? $_GET['id'] : '';

if (!$idProfil) {
    redirect('dashboard/search/index.php');
    exit();
}

$pro = getPro($idProfil);
?>
<body>

<header class="p-[2rem] flex justify-center">
    <img
        class="h-[4rem] w-[4rem]"
        src="../../assets/logo.png"
        alt="proswipe logo"
    />
</header>

<main>
    <div class="max-w-7xl mx-auto px-4 py-8 sm:py-24 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <h1 class="text-center text-xl font-bold"><?php echo $pro['name'] ?></h1>
        </div>

        <div class="flex justify-center mt-6">
            <img
                class="rounded-xl w-[15rem]"
                src="<?php echo $pro['profilePicture'] ?>"
                alt="Pro Profile Picture"
            />
        </div>

        <div class="flex flex-col justify-center mt-6">
            <span class="font-bold">Description:</span>
            <p><?php echo $pro['jobDescription'] ?></p>
        </div>

        <div class="flex justify-center mt-6">
            <video controls>
                <source src="<?php echo $pro['jobVideo'] ?>">
            </video>
        </div>
    </div>
</main>

<div class="flex justify-center">
    <?php include('../../include/footer.php'); ?>
</div>
</body>
