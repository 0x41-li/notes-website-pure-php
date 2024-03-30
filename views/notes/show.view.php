<?php

view("/partials/header.php");
view("/partials/nav.php");

?>


<div class="min-h-full">
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        <?= htmlspecialchars($heading) ?>
      </h1>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <a href="/notes" class="mb-8 inline-block bg-gray-800 text-sm text-white hover:bg-gray-700 font-bold px-4 py-2 rounded">Go Back</a>

      <p class="">
        <?= htmlspecialchars($note['body']) ?>
      </p>

      <form method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button class="mt-4 inline-block bg-red-500 text-sm text-white hover:bg-red-700 font-bold px-4 py-2 rounded">DELETE</button>
      </form>
    </div>
  </main>
</div>


<?php
view("/partials/footer.php");
