<?php
include('../../include/header.php');
include('../../include/method.php');
include('../../database/database.php');

checkConnection();

$idProfil = isset($_GET['id']) ? $_GET['id'] : '';
$user = getUserFromEmail($_SESSION['email']);

if (!$idProfil) {
    redirect('dashboard/search/index.php');
    exit();
}

$pro = getPro($idProfil);
$fetched = getAllProOfUser($user['id']);


if (!empty($_POST['like'])) {
    foreach ($fetched as $item) {
        if ($item['proId'] == $idProfil) {
            redirect('dashboard/search/index.php');
            exit();
        }
    }

    addUserProTable($user['id'], $idProfil);
    redirect('dashboard/chat/index.php');
}
?>
<body>

<header class="p-[1.7rem] flex justify-center">
    <img
            class="h-[3rem] w-[3rem]"
            src="../assets/logo.png"
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

    <div class="flex justify-center">
        <div>
            <form action="/dashboard/search/profil.php?id=<?php echo $idProfil ?>" method="post" data-turbo="false">
                <input type="hidden" name="like" value="test">
                <button type="submit" class="bg-blue-400 rounded-full p-[1rem]">
                    <img
                            class="h-[2rem]"
                            src="../../assets/heart.svg"
                            alt="like"
                    />
                </button>
            </form>
        </div>
    </div>
</main>

<div class="flex justify-center">
    <?php include('../../include/footer.php'); ?>
</div>
</body>
