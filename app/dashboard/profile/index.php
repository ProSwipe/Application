<?php
include('../../include/header.php');
include('../../include/method.php');

checkConnection();
?>

<body>

<div class="flex justify-center">
    <div class="w-40 rounded-full ring-4 ring-primary ring-offset-base-100 ring-offset-2 mt-10">
        <img class="rounded-full"
             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.photoprof.fr%2Fimages_dp%2Fphotographes%2Fprofil_vide.jpg&f=1&nofb=1&ipt=52feabd317379dcbced27dcc0c0e36ac02ee8f7cfae826932babda47fbc08a44&ipo=images" />

    </div>
</div>


<div class="font-bold flex justify-center mt-2">
    <p>
        Valentin
    </p>
</div>

<div class="flex flex-col px-[4rem]">

    <div class="mt-6 flex justify-center">
        <a href="mon_profil.html"
           class="text-center transform hover:scale-110 motion-reduce:transform-none duration-300 bg-sky-600 hover:bg-sky-700 text-gray-100 py-4 px-12 rounded-xl items-center w-full">
            <span>Mon profile</span>
        </a>

    </div>
    <div class="mt-6 flex justify-center">
        <a href="interets.html"
           class="text-center transform hover:scale-110 motion-reduce:transform-none duration-300 bg-sky-600 hover:bg-sky-700 text-gray-100 py-4 px-12 rounded-xl items-center w-full">
            <span>Mes centres d'intérêts</span>
        </a>

    </div>
</div>
<div class="flex justify-center mt-12">
    <?php include('../../include/footer.php'); ?>
</div>
</body>