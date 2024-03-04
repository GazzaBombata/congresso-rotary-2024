<div x-data="{ modalOpen: false, dangerModalOpen: false }">

  @auth
  <x-app-layout>
    <div class="space-y-4">
      @foreach($events as $event => $value)
      <x-dashboard-item>
        <div class="flex items-center justify-between">
          <h3 class="text-lg">{{$value->name}}</h2>
            {{-- @if($condition) --}}
            <x-secondary-button @click="modalOpen = true">
              <span class="hidden sm:block">Registrati</span>
              <x-icons.right-arrow />
            </x-secondary-button>
                        <x-secondary-button @click="dangerModalOpen = true">
              <span class="hidden sm:block">Pericolo</span>
              <x-icons.right-arrow />
            </x-secondary-button>
            {{-- @else
            <x-danger-button>
              <span class="hidden sm:block">Annulla Iscrizione</span>
              <x-icons.bin />
            </x-danger-button>
            @endif --}}
        </div>
      </x-dashboard-item>
      @endforeach
    </div>


  </x-app-layout>
  @endauth

  @guest
  <x-layout>
    <x-header :items="[
    ['name' => 'Registrazione', 'url' => '#'],
    ['name' => 'Programma', 'url' => '#'],
    ['name' => 'News', 'url' => '#'],
    ['name' => 'Alloggio', 'url' => '#'],
    ['name' => 'Parcheggi', 'url' => '#']
  ]" />
    <main class="min-h-screen bg-gray-100 pt-20">
      <div class="space-y-4">
        @foreach($events as $event => $value)
        <x-dashboard-item>
          <div class="flex items-center justify-between">
            <h3 class="text-lg">{{$value->name}}</h2>
              <x-secondary-button>
                <span class="hidden sm:block">Registrati</span>
                <x-icons.right-arrow />
              </x-secondary-button>
          </div>
        </x-dashboard-item>
        @endforeach
      </div>
    </main>
  </x-layout>
  @endguest

  <x-popup-standard :title="'titolo'" :paragraph="'Questo è il corpo del modale.'" x-bind:modal-open="modalOpen">
    <x-secondary-button @click="modalOpen = false">
      <span class="hidden sm:block">Annulla</span>
      <x-icons.bin />
    </x-secondary-button>
    <x-primary-button>
      <span class="hidden sm:block">Conferma</span>
    </x-primary-button>
  </x-popup-standard>

  <x-popup-danger :paragraph="'Questo è il corpo del modale.'" x-bind:danger-modal-open="dangerModalOpen">
    <x-secondary-button @click="dangerModalOpen = false">
      <span class="hidden sm:block">Annulla</span>
      <x-icons.bin />
    </x-secondary-button>
    <x-primary-button>
      <span class="hidden sm:block">Conferma</span>
    </x-primary-button>
  </x-popup-danger>
  
</div>
