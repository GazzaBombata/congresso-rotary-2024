<!DOCTYPE html>
<html lang="it" class="h-full bg-white">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rotary Congresso 2024 - Homepage</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="icon" type="image/png" href="https://brandcenter.rotary.org/-/media/project/rotary/brandcenter/our-brand/brand-elements/rotarymoe-r.png?sc_lang=it-it&hash=36A0923F6434D285CDAE5A8509EBC3AB" alt="Rotary Logo">
</head>

<body class="h-full">
  <div class="bg-white">

    {{ $slot }}

  </div>
</body>

</html>