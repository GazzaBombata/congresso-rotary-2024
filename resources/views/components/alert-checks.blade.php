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