<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
require base_path("views/partials/banner.php");
?>

<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<p class="mb-6">
			<a class="py-2 px-4 bg-blue-500 rounded text-white" href="/note?id=<?= $note["id"] ?>">go back</a>
		</p>


		<form method="POST" action="/note?post_id=<?= $note["id"] ?>" class="mt-10 space-y-4">
      <input type="text" hidden name="_method" value="PUT">

			<div class="flex flex-col gap-2">
				<label class="font-semibold" for="body">Description</label>
				<textarea rows="5" class="border border-slate-300 rounded p-4" name="body"
					id="body"><?= $note["body"] ?></textarea>

				<?php if (isset($errors["body"])): ?>
					<p class="text-sm text-red-500">
						<?= $errors["body"] ?>
					</p>
				<?php endif ?>

			</div>
			<button type="submit" class="py-2 px-4 bg-blue-500 rounded text-white" type="submit">Update</button>
		</form>

	</div>
</main>

<?php require base_path("views/partials/footer.php") ?>