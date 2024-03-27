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
      <a href="/notes" class="bg-blue-500 text-white hover:bg-blue-700 font-bold px-4 py-2 rounded">Go Back</a>
      <p class="mt-4">
        <?= $note['body'] ?>
      </p>
    </div>
  </main>
</div>


<?php
require_once __DIR__ . "/partials/footer.php";
