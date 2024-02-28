<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Grazie per la registrazione. Prima di procedere, verifica l\'indirizzo email aprendo la tua casella email e premendo il link di verifica email che hai appena ricevuto.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nuovo link di verifica è stato inviato all\'email che hai fornito in fase di registrazione.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Rimanda email di verifica') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Esci') }}
            </button>
        </form>
    </div>
</x-guest-layout>
