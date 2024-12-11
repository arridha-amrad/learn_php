<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
require base_path("views/partials/banner.php");
?>

<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<p class="mb-6">
			<a class="py-2 px-4 bg-blue-500 rounded text-white" href="/notes">go back</a>
		</p>
		<div>
			<h1 class="text-xl font-semibold">
				<?= htmlspecialchars($note["body"]) ?>
			</h1>
		</div>

		<form class="py-6" method="POST">
			<input type="text" hidden name="_method" value="DELETE">
			<input type="text" hidden name="post_id" value="<?= $note["id"] ?>">
			<button type="submit" class="text-red-500 font-semibold">Delete post</button>
		</form>

		<div class="py-6">
			<a class="text-green-600 text-semibold" href="/notes/edit?post_id=<?=$note['id']?>">Edit</a>
		</div>

	</div>
</main>

<?php require base_path("views/partials/footer.php") ?>