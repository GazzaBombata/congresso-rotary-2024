<div class="hidden lg:flex lg:gap-x-12">
  @foreach ($items as $item)
  <a href="{{ $item['url'] }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $item['name'] }}</a>
  @endforeach
</div>
<div class="hidden lg:flex lg:flex-1 lg:justify-end">
  <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
</div>
