<?php
include('../../include/header.php');
include('../../include/method.php');
include('../../database/database.php');

checkConnection();

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$emptySearchTerm = empty($searchTerm);
$errors = array();

$user = getUserFromEmail($_SESSION['email']);
$fetched = getAllProOfUser($user['id']);

$allPro = array();

foreach ($fetched as $pro) {
    $pro = getPro($pro['proId']);
    $allPro[] = $pro;
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

<main class="max-w-7xl mx-auto px-4 py-16 sm:py-24 sm:px-6 lg:px-8">
    <form action="/dashboard/chat/index.php" method="get" data-turbo="false">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="search" name="search"
                   class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50"
                   placeholder="Recherche par personne..." required value="<?php echo $searchTerm ?>">
            <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-sky-600 hover:bg-sky-700 font-medium rounded-lg text-sm px-4 py-2">
                Search
            </button>
        </div>

        <?php if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </form>

    <?php if (count($allPro) > 0) : ?>
        <?php foreach ($allPro as $pro) : ?>
            <div class="flex items-center mt-10 animate__animated animate__fadeIn animate__delay-0.2s">
                <div class="w-20 rounded-full ring-4 ring-primary ring-offset-base-100 ring-offset-2">
                    <img class="rounded-full" src="<?php echo $pro['profilePicture'] ?>" alt="Profile Image" />
                </div>
                <div class="ml-4">
                    <p class="text-lg font-medium text-sky-600"><?php echo $pro['job'] ?></p>
                    <p class="text-sm font-medium text-gray-500"><?php echo $pro['name'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

</main>

<div class="flex justify-center">
    <?php include('../../include/footer.php'); ?>
</div>
</body>
