<?php
require "partials/head.php";
require "partials/nav.php";
require "partials/banner.php";
?>

<main>
    <div class="mx-auto max-w-lg px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-xl font-semibold">Create New Note</h1>
        <form method="POST" class="mt-10 space-y-4">
            <div class="flex flex-col gap-2">
                <label class="font-semibold" for="body">Description</label>
                <textarea rows="5" class="resize-none border border-slate-300 rounded p-4" name="body" id="body"></textarea>
            </div>
            <button type="submit" class="py-2 px-4 bg-blue-500 rounded text-white" type="submit">Save</button>
        </form>
    </div>
</main>

<?php require "partials/footer.php" ?>