  <x-layout>
<div x-data="{ modalOpen: false, dangerModalOpen: false, currentEvent: null, currentRegistration : null, openDangerModal: openDangerModal, redirectOpen : false }">

  <x-alert-checks />

  @auth
    <div class="space-y-4">
      @foreach($events as $event)
      <x-dashboard-item>
        <div class="flex items-center justify-between">
          <h3 class="text-lg">{{$event->name}}</h2>
            @php
            $registration = auth()->user()->registrations->firstWhere('event_id', $event->id);
            @endphp

            @if($registration)
            <x-danger-button @click="openDangerModal({{ $registration->id }}), console.log({{$registration->id}})">
              <span class="hidden sm:block">Annulla Iscrizione</span>
              <x-icons.bin />
            </x-danger-button>

            @else
            <x-secondary-button @click="currentEvent = {{$event}}, $dispatch('open-modal')">
              <span class="hidden sm:block">Registrati</span>
              <x-icons.right-arrow />
            </x-secondary-button>
            @endif
        </div>
      </x-dashboard-item>
      @endforeach
    </div>
  @endauth

  @guest
    <x-header :items="[
    ['name' => 'Lista Eventi', 'url' => '/events'],
  ]" />
    <main class="min-h-screen bg-gray-100 pt-20">
      <div class="space-y-4">
        @foreach($events as $event => $value)
        <x-dashboard-item>
          <div class="flex items-center justify-between">
            <h3 class="text-lg">{{$value->name}}</h2>
              <x-secondary-button @click="$dispatch('open-modal')">
                <span class="hidden sm:block">Registrati</span>
                <x-icons.right-arrow />
              </x-secondary-button>
          </div>
        </x-dashboard-item>
        @endforeach
      </div>
    </main>
  @endguest

  <x-popup-standard :title="'Conferma la registrazione'">
    @auth
    <!-- Modal body -->
    <div class="p-4 md:p-5 space-y-4">
      <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" x-text="currentEvent ? 'Sei sicuro di voler confermare l\'iscrizione a ' + currentEvent.name + '?' : 'corpo del modale'"> </p>
    </div>
    <!-- Modal footer -->
    <div class="flex flex-ow items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
      <form method="POST" action="/registrations" class="flex flex-col items-center content-center mb-0">
        @csrf
        <input type="hidden" name="event_id" :value="currentEvent ? currentEvent.id : '#' ">
        <x-primary-button type="submit">
          <span class="block">Conferma</span>
        </x-primary-button>
      </form>
      <x-secondary-button @click="$dispatch('close-modal')">
        <span class="sm:block">Annulla</span>
      </x-secondary-button>
    </div>
    @endauth

    @guest
    <!-- Modal body -->
    <div class="p-4 md:p-5 space-y-4">
      <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400"> Sembra che tu non abbia ancora eseguito l'accesso. Crea un account o accedi prima di registrarti.</p>
    </div>
    <!-- Modal footer -->
    <div class="flex flex-ow items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
      <x-primary-button type="submit" @click="window.location.href='/register'">
        <span class="block">Crea account</span>
      </x-primary-button>
      <x-primary-button type="submit" @click="window.location.href='/login'">
        <span class="block">Accedi</span>
      </x-primary-button>
      <x-secondary-button @click="$dispatch('close-modal')">
        <span class="sm:block">Annulla</span>
      </x-secondary-button>
    </div>
    @endguest
  </x-popup-standard>

  <x-popup-danger x-bind:danger-modal-open="dangerModalOpen">
    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" x-text="currentRegistration ? 'Confermi la cancellazione dell\'iscrizione #' + currentRegistration + '?' : 'corpo del modale'"></h3>
    <div class="flex flex-row items-center justify-evenly p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
      <form method="POST" id="delete-form" action="" class="flex flex-col items-center content-center mb-0">
        @csrf
        @method('DELETE')
        {{-- <input type="hidden" name="id" :value="currentRegistration ? currentRegistration.id : '#' "> --}}
        <x-danger-button type="submit">
          <span class="block">Elimina</span>
        </x-danger-button>
      </form>
      <x-secondary-button @click="dangerModalOpen = false">
        <span class="sm:block">Annulla</span>
      </x-secondary-button>
    </div>
  </x-popup-danger>


</div>



<script>
  function openDangerModal(id) {
    this.dangerModalOpen = true;
    this.currentRegistration = id;
    document.querySelector('#delete-form').action = '/registrations/' + id;
  }

</script>
</x-layout>
```