
<x-app-layout>
  <x-slot name="header">
    <x-header-dashboard />
  </x-slot>

  @if (session('success'))
  <x-alerts.success title="Confermato!">
    {{ session('success') }}
  </x-alerts.success>
  @endif

  @if (session('error'))
  <x-alerts.danger title="Errore:">
    {{ session('error') }}
  </x-alerts.danger>
  @endif

  @if ($errors->any())
  <x-alerts.danger title="Errore:">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </x-alerts.danger>
  @endif

  @auth
  <x-dashboard-item>
    Hai già effettuato l'accesso con l'email {{auth() -> user() -> email}}
  </x-dashboard-item>
  @endauth


  <x-dashboard-item>
    <div x-data="{ formOpen: false }">
      <x-primary-button x-show="!formOpen" @click="formOpen = true">
        <span class="font-bold flex flex-row gap-1 items-center">Aggiungi evento
          <x-icons.plus /></span>
      </x-primary-button>

      <form x-show="formOpen" class="max-w-md mx-auto space-y-4 my-4" method="POST" action="/events">
        @csrf
        <x-forms.input-text name="name" :value="old('name')">Nome evento</x-forms.input-text>
        <x-forms.textarea name="description" :value="old('description')">Descrizione evento</x-forms.textarea>
        <x-forms.input-text name="location" :value="old('location')">Luogo evento</x-forms.input-text>

        <div class="grid md:grid-cols-2 md:gap-4">
          <x-forms.datetimepicker name="start_date" :value="old('start_date')">Data e ora di inizio</x-datetimepicker>
            <x-forms.datetimepicker name="end_date" :value="old('end_date')">Data e ora di fine</x-datetimepicker>
        </div>
        <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Salva</button>
        <x-secondary-button @click="formOpen = false">Annulla</x-secondary-button>
      </form>
    </div>
  </x-dashboard-item>


  <div class="space-y-4 my-4">
    @foreach($events as $event => $value)
    <x-dashboard-item>
      {{$value->name}}
    </x-dashboard-item>
    @endforeach
  </div>


</x-app-layout>
