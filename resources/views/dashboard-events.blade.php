<x-app-layout>
  <x-slot name="header">
    <x-header-dashboard />
  </x-slot>

  @auth
  <x-dashboard-item>
    Hai già effettuato l'accesso con l'email {{auth() -> user() -> email}}
  </x-dashboard-item>
  @endauth

  <div class="space-y-4">
    @foreach($events as $event => $value)
    <x-dashboard-item>
      {{$value->name}}
    </x-dashboard-item>
    @endforeach
  </div>


</x-app-layout>
