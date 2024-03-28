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
      <p class="">
        <?= $note['body'] ?>
      </p>
      <a href="/notes" class="mt-8 inline-block bg-gray-800 text-sm text-white hover:bg-gray-700 font-bold px-4 py-2 rounded">Go Back</a>
    </div>
  </main>
</div>


<?php
require_once __DIR__ . "/partials/footer.php";
