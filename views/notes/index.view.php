<?php

view("/partials/header.php");
view("/partials/nav.php");

?>


<div class="min-h-full">
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        <?= $heading ?>
      </h1>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <ul class="list-disc pl-8">
        <?php foreach ($notes as $note) : ?>
          <li>
            <a href="/note?id=<?= htmlspecialchars($note['id']) ?>" class="text-blue-500 pl-2 hover:underline">
              <?= htmlspecialchars($note['title']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <a class="bg-gray-800 text-sm text-white px-4 py-2 mt-4 inline-block rounded font-bold hover:bg-gray-700" href="/notes/create">Create a Note</a>
    </div>
  </main>
</div>


<?php

view("/partials/footer.php");
