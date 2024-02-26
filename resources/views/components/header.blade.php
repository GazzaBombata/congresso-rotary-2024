<header x-data="{ show: false }" class="absolute inset-x-0 top-0 z-50">
      <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <x-header-logo />

        <x-md-menu :items="$items" />

        <!-- hamburger icon to toggle the floating mobule menu -->
        <div class="flex lg:hidden">
          <button @click="show = !show" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 toggle-button">
            <span class="sr-only">Apri il menù</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
      </nav>

      <x-mobile-menu :items="$items" />


