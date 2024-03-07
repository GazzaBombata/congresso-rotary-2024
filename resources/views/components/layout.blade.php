@auth
<x-app-layout>
  @if (isset($header))
  <x-slot name="header">
    {{ $header }}
  </x-slot>
  @endif
  {{$slot}}
</x-app-layout>
@endauth

@guest
<x-guest2>
  {{$slot}}
</x-guest2>
@endguest
