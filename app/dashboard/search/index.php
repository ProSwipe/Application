<?php
include('../../include/header.php');
include('../../include/method.php');
include('../../database/database.php');

checkConnection();

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$emptySearchTerm = empty($searchTerm);
$errors = array();
$professionals = array();

if (!empty($searchTerm)) {
    $professionals = getProFromJob($searchTerm);

    if (empty($professionals)) {
        $errors[] = "Aucun profil trouvé pour le métier " . $searchTerm . ".";
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

<main class="max-w-7xl mx-auto px-4 py-16 sm:py-24 sm:px-6 lg:px-8">
    <form action="/dashboard/search/index.php" method="get" data-turbo="false">
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
                   placeholder="Recherche par métiers..." required value="<?php echo $searchTerm ?>">
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

    <?php if ($emptySearchTerm): ?>
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
            <form action="/dashboard/search/index.php" method="get" data-turbo="false"
                  class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-3xl text-sm px-2 py-2 text-center">
                <input type="hidden" name="search" value="Développeur web">
                <button type="submit">Développeur web</button>
            </form>
            <form action="/dashboard/search/index.php" method="get" data-turbo="false"
                  class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-3xl text-sm px-2 py-2 text-center">
                <input type="hidden" name="search" value="Designer graphique">
                <button type="submit">Designer graphique</button>
            </form>
            <form action="/dashboard/search/index.php" method="get" data-turbo="false"
                  class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-3xl text-sm px-2 py-2 text-center">
                <input type="hidden" name="search" value="Administrateur système">
                <button type="submit">Admin-Système</button>
            </form>
            <form action="/dashboard/search/index.php" method="get" data-turbo="false"
                  class="text-white bg-sky-600 hover:bg-sky-700 font-medium rounded-3xl text-sm px-2 py-2 text-center">
                <input type="hidden" name="search" value="Ingénieur logiciel">
                <button type="submit">Ingénieur logiciel</button>
            </form>
        </div>
    <?php endif ?>

    <?php if (count($professionals) > 0) : ?>
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($professionals as $professional) : ?>
                <a class="max-w-md mx-auto bg-gray-50 rounded-xl shadow-md overflow-hidden"
                   href="/dashboard/search/profil.php?id=<?php echo $professional['id'] ?>">
                    <img class="w-full h-56 object-cover object-center"
                         src="<?php echo $professional['profilePicture'] ?>"
                         alt="Photo de profil de <?php echo $professional['name'] ?>">
                    <div class="px-2">
                        <div class="px-6 py-4">
                            <p class="font-semibold text-xl text-gray-800 font-bold"><?php echo $professional['name'] ?></p>
                            <p class="text-gray-600 text-sm"><?php echo $professional['jobDescription'] ?></p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <p class="font-semibold text-sm text-gray-800 text-center"><?php echo $professional['job'] ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</main>
</body>
