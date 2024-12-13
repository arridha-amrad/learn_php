<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="shrink-0">
          <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="/" class="<?= url_is('/') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium  hover:bg-gray-700 hover:text-white">Home</a>
            <a href="/about" class="<?= url_is('/about') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
            <a href="/contact" class="<?= url_is('/contact') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>

            <?php if ($_SESSION["user"] ?? false) : ?>
              <a href="/notes" class="<?= url_is('/notes') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Notes</a>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
          <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <?php if ($_SESSION["user"] ?? false) : ?>
                <div class="flex items-center gap-4">
                  <p class="text-white font-semibold text-xl"><?= $_SESSION["user"]["name"] ?></p>
                  <form action="/session" method="POST">
                    <input type="text" hidden name="_method" value="DELETE">
                    <button class="px-4 py-2 bg-white text-black rounded">Logout</button>
                  </form>
                </div>
              <?php else: ?>
                <div class="flex gap-3">
                  <a class="px-4 py-2 bg-blue-500 rounded" href="/register">Register</a>
                  <a class="px-4 py-2 bg-white text-black rounded" href="/login">Login</a>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
      <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!-- Menu open: "hidden", Menu closed: "block" -->
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- Menu open: "block", Menu closed: "hidden" -->
          <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>