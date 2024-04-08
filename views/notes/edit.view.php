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

      <form action="/note" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">

        <div class="flex justify-end">
          <button type="submit"
            class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-700">DELETE</button>
        </div>
      </form>

      <form action="/note" method="post" class="mt-6">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">

        <div class="space-y-12">
          <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>

              <div class="mt-2">
                <input id="title" name="title" placeholder="An awesome title" value="<?= $note['title'] ?? '' ?>"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>

              <?php if (isset($errors["title"])): ?>
                <p class="text-sm text-red-700 mt-2">
                  <?= $errors["title"] ?>
                </p>
              <?php endif; ?>

            </div>

            <div class="col-span-full">
              <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Descrition</label>

              <div class="mt-2">
                <textarea id="content" name="content" rows="3"
                  placeholder="Write something awesome, isn't that what you always do!"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['content'] ?? '' ?></textarea>
              </div>

              <?php if (isset($errors["content"])): ?>
                <p class="text-sm text-red-700 mt-2">
                  <?= $errors["content"] ?>
                </p>
              <?php endif; ?>

            </div>

          </div>

          <div class="mt-4 flex items-center justify-end gap-x-6">
            <a href="/note?id=<?= $note['id'] ?>"
              class="rounded-md px-3 py-2 border border-gray-900 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-200">Cancel</a>
            <button type="submit"
              class="rounded-md px-3 py-2 bg-gray-900 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-500">Update</button>
          </div>
        </div>
      </form>

    </div>
  </main>
</div>


<?php
view("partials/footer.php");
