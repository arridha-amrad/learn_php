<?php
require "partials/head.php";
require "partials/nav.php";
require "partials/banner.php";
?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a class="py-2 px-4 bg-blue-500 rounded text-white" href="/notes">go back</a>
        </p>
        <div>
            <h1 class="text-xl font-semibold">
                <?= $note["body"] ?>
            </h1>
        </div>
    </div>
</main>

<?php require "partials/footer.php" ?>