
<x-layout>
  <x-header 
      :items="[
        ['name' => 'Registrazione', 'url' => '#'],
        ['name' => 'Programma', 'url' => '#'],
        ['name' => 'News', 'url' => '#'],
        ['name' => 'Alloggio', 'url' => '#'],
        ['name' => 'Parcheggi', 'url' => '#']
      ]"
    />

  <x-hero 
    mdOnlyPrompt="Leggi l'annuncio del governatore." 
    title="Congresso Rotary 2024, Brescia" 
    description="Nelle seguenti date: 21/22/23 giugno 2024 si terrà il Congresso Rotary.<br/>Consulta il programma di seguito e registrati." 
    :mdOnlyCta="['name' => 'Leggi di più', 'url' => '#']" 
    :primaryCta="['name' => 'Registrati', 'url' => '#']" 
    :secondaryCta="['name' => 'Consulta il programma', 'url' => '#']" 
  />
</x-layout>