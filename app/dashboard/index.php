<?php
include('../include/header.php');
include('../include/method.php');

checkConnection();

$errors = array();
$allPro = $_SESSION['pro'];

$currentProfile = $allPro[0];

if (!empty($_POST['like'])) {
    array_shift($allPro);
    $_SESSION['pro'] = $allPro;
    $currentProfile = $allPro[0];
    if (empty($allPro)) {
        $errors[] = "Aucun profil trouvé.";
    }
}
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
    <?php if (count($errors) <= 0) : ?>
        <img
            class="w-[20rem] h-[30rem] rounded-xl"
            src="<?php echo $currentProfile['profilePicture'] ?>"
            alt="test image"
        />
    <?php endif ?>
    <?php if (count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <div class="flex items-end py-[2rem] px-[2rem] gap-[2rem]">
        <div
            class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
        >
            <img
                class="h-[2rem]"
                src="../assets/back.svg"
                alt="rollback"
            />
        </div>
        <div>
            <form action="/dashboard/index.php" method="post" data-turbo="false">
                <input type="hidden" name="like" value="test">
                <button type="submit" class="bg-blue-400 rounded-full p-[1rem]">
                    <img
                            class="h-[2rem]"
                            src="../assets/heart.svg"
                            alt="like"
                    />
                </button>
            </form>
        </div>
        <div
            class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]"
        >
            <img
                class="h-[2rem]"
                src="../assets/close.svg"
                alt="dislike"
            />
        </div>
    </div>

    <?php include('../include/footer.php'); ?>
</main>
</body>
