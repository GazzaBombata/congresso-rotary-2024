<div class="w-full flex flex-col justify-evenly items-center gap-4 pt-10">
<h2 class="text-lg font-bold">Non puoi visualizzare questa sezione, devi essere admin.</h2>
<form action="/makeadmin" method="POST">
  @csrf
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
  <x-primary-button type="submit" >
    <span class="font-bold flex flex-row gap-1 items-center">Diventa admin
  </x-primary-button>
</form>
</div>