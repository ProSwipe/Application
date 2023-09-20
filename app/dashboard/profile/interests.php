<?php
include('../../include/header.php');
include('../../include/method.php');

checkConnection();
?>

<body>
<header class="p-[2rem] flex justify-center">
    <h2 class="text-center text-2xl font-semibold mb-10">
        Mes centres d'intérêts
    </h2>
</header>


<div class="flex flex-col justify-center sm:px-6 lg:px-8">

    <div class="max-w-7xl mx-auto px-4 py-4 sm:py-24 sm:px-6 lg:px-8">
        <form action="/dashboard/profile/interests.php" method="post" data-turbo="false">
            <div class="grid grid-cols-2 gap-4">
                <div class="mt-1">
                    <button
                            class="text-center appearance-none block w-full px-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:bg-blue-500 focus:text-white focus:shadow-2xl focus:shadow-blue-500 sm:text-sm">
                        Biologie
                    </button>
                </div>

                <div class="mt-1">
                    <button
                            class="text-center appearance-none block w-full px-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:bg-blue-500 focus:text-white focus:shadow-2xl focus:shadow-blue-500 sm:text-sm">
                        Mathématiques
                    </button>
                </div>
                <div class="mt-1">
                    <button
                            class="text-center appearance-none block w-full px-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:bg-blue-500 focus:text-white focus:shadow-2xl focus:shadow-blue-500 sm:text-sm">
                        Informatique
                    </button>
                </div>
                <div class="mt-1">
                    <button
                            class="text-center appearance-none block w-full px-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:bg-blue-500 focus:text-white focus:shadow-2xl focus:shadow-blue-500 sm:text-sm">
                        Langues
                    </button>
                </div>
            </div>
            <div class="mt-6 px-28">
                <button
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 "
                        type="submit">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<div class="flex justify-center mt-12">
    <?php include('../../include/footer.php'); ?>
</div>
</body>
