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
    @foreach($users as $user)
    <x-dashboard-item>
      {{$user->name}}
    </x-dashboard-item>
    @endforeach
  </div>



</x-app-layout>
