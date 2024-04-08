<?php

use Core\Request;

view("partials/header.php");
view("partials/nav.php");

?>


<div class="min-h-full">

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

      <form action="/login" method="post">

        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
          </div>

          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <form class="space-y-6" action="/login" method="POST" novalidate>

              <div class="mt-2">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>

                <div class="mt-2">
                  <input id="email" name="email" type="email" value="<?= old("email") ?? '' ?>"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <?php if (isset($errors["email"])): ?>
                  <p class="text-sm text-red-700 mt-2">
                    <?= $errors["email"] ?>
                  </p>
                <?php endif; ?>
              </div>

              <div class="mt-2">
                <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>

                <div class="mt-2">
                  <input id="password" name="password" type="password" value=""
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <?php if (isset($errors["password"])): ?>
                  <p class="text-sm text-red-700 mt-2">
                    <?= $errors["password"] ?>
                  </p>
                <?php endif; ?>
              </div>

              <?php if (isset($errors["login"])): ?>
                <p class="text-sm text-red-700 mt-2">
                  <?= $errors["login"] ?>
                </p>
              <?php endif; ?>



              <div class="mt-4">
                <button type="submit"
                  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
              </div>
            </form>
          </div>
        </div>

      </form>

    </div>
  </main>

</div>



<?php
view("partials/footer.php");
