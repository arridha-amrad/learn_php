<?php
require "partials/head.php";
require "partials/nav.php";
?>

<main class="mx-auto max-w-lg py-10">

  <form class="space-y-4" method="POST" action="/session">

    <?php if (isset($errors["general"])): ?>
      <div class="py-2 bg-red-500/10 px-4 rounded">
        <p class="text-red-600"><?= $errors["general"] ?></p>
      </div>
    <?php endif ?>


    <div class="flex flex-col gap-2">
      <label for="email">Email</label>
      <input value="<?= $_POST["email"] ?? "" ?>" id="email" class="rounded border border-slate-300 py-2 px-4" type="text" name="email">
      <?php if (isset($errors["email"])): ?>
        <p class="text-sm text-red-500">
          <?= $errors["email"] ?>
        </p>
      <?php endif ?>
    </div>

    <div class="flex flex-col gap-2">
      <label for="password">Password</label>
      <input id="password" class="rounded border border-slate-300 py-2 px-4" type="password" name="password">
      <?php if (isset($errors["password"])): ?>
        <p class="text-sm text-red-500">
          <?= $errors["password"] ?>
        </p>
      <?php endif ?>
    </div>

    <button type="submit" class="px-4 py-2 rounded bg-green-500 text-white">Login</button>

  </form>

</main>

<?php require "partials/footer.php" ?>