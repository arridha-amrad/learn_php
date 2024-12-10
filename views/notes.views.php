<?php
require "partials/head.php";
require "partials/nav.php";
require "partials/banner.php";
?>

<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<?php foreach ($notes as $note) : ?>
			<li>
				<a class="text-blue-500 hover:underline" href="/note?id=<?= $note['id'] ?>">
					<?= htmlspecialchars($note["body"]) ?>
				</a>
			</li>
		<?php endforeach; ?>
		<div class="py-4">
			<a class="text-blue-500 underline" href="/note/create">Create note</a>
		</div>
	</div>
</main>

<?php require "partials/footer.php" ?>