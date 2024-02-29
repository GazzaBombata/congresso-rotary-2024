<x-app-layout >
  <x-slot name="header">
    <x-header-dashboard />
  </x-slot>

  @auth
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          Hai già effettuato l'accesso con l'email {{auth() -> user() -> email}}
        </div>
      </div>
    </div>
  </div>
  @endauth



</x-app-layout>