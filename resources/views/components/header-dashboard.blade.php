@php
  $selectedStatus = 'bg-gray-200 text-white rounded-md px-3 text-sm font-medium ';
@endphp


    <div class="flex flex-row  place-content-around h-full items-center">
      <a href="/dashboard/personal" class="flex flex-col items-center justify-center sm:h-full {{ request()->is('dashboard/personal') ? $selectedStatus : ''}}">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight w-auto h-auto">
          Le tue registrazioni
        </h2>
      </a>
      <a href="/dashboard/events" class="flex flex-col items-center justify-center sm:h-full  {{ request()->is('dashboard/events') ? $selectedStatus : ''}}">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight w-auto">
          Eventi
        </h2>
      </a>
      <a href="/dashboard/participants" class="flex flex-col items-center justify-center sm:h-full  {{ request()->is('dashboard/participants') ? $selectedStatus : ''}}">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight w-auto">
          Partecipanti
        </h2>
      </a>
    </div>