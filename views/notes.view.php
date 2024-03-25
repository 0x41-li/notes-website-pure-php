<?php

require_once __DIR__ . "/partials/header.php";
require_once __DIR__ . "/partials/nav.php";

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
              <?= $note['title'] ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>
</div>


<?php
require_once __DIR__ . "/../partials/footer.php";
