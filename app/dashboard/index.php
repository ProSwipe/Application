<?php
include('../include/header.php');
include('../include/method.php');
include('../database/database.php');

checkConnection();

$errors = array();
$allPro = $_SESSION['pro'];

$currentProfile = $allPro[0];
$user = getUserFromEmail($_SESSION['email']);

if (!empty($_POST['like'])) {
    if (!empty($allPro)) {
        addUserProTable($user['id'], $currentProfile['id']);
    }
    array_shift($allPro);
    $_SESSION['pro'] = $allPro;
    $currentProfile = $allPro[0];
}

if (!empty($_POST['dislike'])) {
    array_shift($allPro);
    $_SESSION['pro'] = $allPro;
    $currentProfile = $allPro[0];
}


if (empty($allPro)) {
    $errors[] = "Aucun profil trouvé.";
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
        <div class="relative animate__animated animate__fadeIn animate__delay-0.2s">
            <p class="absolute top-0 left-0 m-2 text-white font-bold bg-blue-500 rounded-full px-2 py-1">
                <?php echo $currentProfile['job'] ?>
            </p>
            <img
                    class="w-[20rem] h-[30rem] rounded-xl"
                    src="<?php echo $currentProfile['profilePicture'] ?>"
                    alt="test image"
            />
        </div>
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
        <div>
            <form action="/dashboard/index.php" method="post" data-turbo="false">
                <input type="hidden" name="dislike" value="test">
                <button type="submit" class="h-[3rem] w-[3rem] bg-blue-400 rounded-full p-[.5rem]">
                    <img
                            class="h-[2rem]"
                            src="../assets/close.svg"
                            alt="dislike"
                    />
                </button>
            </form>

        </div>
    </div>

    <?php include('../include/footer.php'); ?>
</main>
</body>
