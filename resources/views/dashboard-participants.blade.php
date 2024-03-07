<x-layout>
  <x-slot name="header">
    <x-header-dashboard />
  </x-slot>

    <x-alert-checks />
    
  @auth
  <x-dashboard-item>
    Hai già effettuato l'accesso con l'email {{auth() -> user() -> email}}
  </x-dashboard-item>
  @endauth

  @auth
  @if(Auth::user()->role == 'admin')
  <div class="space-y-4">
    @foreach($users as $user)
    <x-dashboard-item>
      {{$user->name}}
    </x-dashboard-item>
    @endforeach
  </div>
  @endif
  @endauth

  @auth
  @if(Auth::user()->role == 'user')
  <x-makeadmin-button />
  @endif
  @endauth



</x-layout>
