<?php

view("partials/header.php");
view("partials/nav.php");

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

      <form method="post">
        <div class="space-y-12">
          <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>

              <div class="mt-2">
                <input id="title" name="title" placeholder="An awesome title" value="<?= $_POST['title'] ?? '' ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>

              <?php if (isset($errors["title"])) : ?>
                <p class="text-sm text-red-700 mt-2"><?= $errors["title"] ?></p>
              <?php endif; ?>

            </div>

            <div class="col-span-full">
              <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Descrition</label>

              <div class="mt-2">
                <textarea id="body" name="body" rows="3" placeholder="Write something awesome, isn't that what you always do!" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body'] ?? '' ?></textarea>
              </div>

              <?php if (isset($errors["body"])) : ?>
                <p class="text-sm text-red-700 mt-2"><?= $errors["body"] ?></p>
              <?php endif; ?>

            </div>

          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-700">Create</button>
          </div>
        </div>
      </form>

    </div>
  </main>
</div>


<?php
view("partials/footer.php");
