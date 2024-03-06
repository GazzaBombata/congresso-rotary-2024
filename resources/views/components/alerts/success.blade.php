
<div 
x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
class="z-50 p-6 mb-4 text-lg text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" role="alert">
  <span class="font-bold">{{$title}}</span> {{$slot}}
</div>
