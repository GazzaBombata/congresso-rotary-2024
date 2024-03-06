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

  {{-- create form div --}}
  <x-dashboard-item>
    <div x-data="{ formOpen: false }">
      <x-primary-button x-show="!formOpen" @click="formOpen = true">
        <span class="font-bold flex flex-row gap-1 items-center">Aggiungi evento
          <x-icons.plus /></span>
      </x-primary-button>

      <form x-show="formOpen" class="max-w-md mx-auto space-y-4 my-4" method="POST" action="/events">
        @csrf
        <x-forms.input-text name="name" fill="{{old('name')}}">Nome evento</x-forms.input-text>
        <x-forms.textarea name="description" fill="{{old('description')}}">Descrizione evento</x-forms.textarea>
        <x-forms.input-text name="location" fill="{{old('location')}}">Luogo evento</x-forms.input-text>

        <div class="grid md:grid-cols-2 md:gap-4">
          <x-forms.datetimepicker name="start_date" fill="old('start_date')">Data e ora di inizio</x-forms.datetimepicker>
          <x-forms.datetimepicker name="end_date" fill="old('end_date')">Data e ora di fine</x-forms.datetimepicker>
        </div>
        <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Salva</button>
        <x-secondary-button @click="formOpen = false">Annulla</x-secondary-button>
      </form>
    </div>
  </x-dashboard-item>

  {{-- events list --}}
  <div class="space-y-4 my-4">
    @foreach($events as $event => $value)
    <x-dashboard-item>
      <div x-data="{ updateFormOpen : false, deleteFormOpen: false }">
        <div class="flex flex-row space-around items-center justify-between">
          <h3 class="hidden sm:block text-lg">{{$value->name}}</h3>
          <div>
          <x-secondary-button class="gap-2" @click="updateFormOpen = true, deleteFormOpen = false, setTimeout(() => $refs.updateForm.scrollIntoView({ behavior: 'smooth' }), 0)">
            <span class="hidden sm:block">Modifica</span>
            <x-icons.edit />
          </x-secondary-button>
          <x-danger-button class="gap-2" @click="deleteFormOpen = true, updateFormOpen = false, setTimeout(() => $refs.deleteForm.scrollIntoView({ behavior: 'smooth' }), 0)">
            <span class="hidden sm:block">Elimina</span>
            <x-icons.bin />
          </x-danger-button>
          </div>
        </div>
        {{-- update form for each event --}}
        <form x-ref="updateForm" x-show="updateFormOpen" class="max-w-md mx-auto space-y-4 my-4" method="POST" action="/events/{{$value->id}}">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{$value->id}}">
          <x-forms.input-text name="name" fill="{{$value->name}}">Nome evento</x-forms.input-text>

          <x-forms.textarea name="description" fill="{{$value->description}}">Descrizione evento</x-forms.textarea>

          <x-forms.input-text name="location" fill="{{$value->location}}">Luogo evento</x-forms.input-text>

          <div class="grid md:grid-cols-2 md:gap-4">
          <x-forms.datetimepicker name="start_date" fill="{{ \Carbon\Carbon::parse($value->start_date)->format('M j, Y g:i A') }}">Data e ora di inizio</x-forms.datetimepicker>
          <x-forms.datetimepicker name="end_date" fill="{{ \Carbon\Carbon::parse($value->end_date)->format('M j, Y g:i A') }}">Data e ora di inizio</x-forms.datetimepicker>
        </div>
          <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Aggiorna</button>
          <x-secondary-button @click="updateFormOpen = false">Annulla</x-secondary-button>
        </form>
        {{-- delete form for each event --}}
        <form x-ref="deleteForm" x-show="deleteFormOpen" class="max-w-md mx-auto space-y-4 my-4" method="POST" action="/events/{{$value->id}}">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id" value="{{$value->id}}">
          <div class="flex flex-row space-around items-center justify-between gap-2">
            <h3 class="hidden sm:block text-lg">Sei sicuro di voler eliminare l'evento?</h3>
            <x-danger-button type="submit" class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
              Elimina</x-danger-button>
            <x-secondary-button @click="deleteFormOpen = false">Annulla</x-secondary-button>
          </div>
        </form>
      </div>
    </x-dashboard-item>
    @endforeach
  </div>


</x-app-layout>
