<form action="{{ route('chirps.store') }}" method="POST" class="w-full">
    @csrf

    <div>
        <x-input-label for="message" :value="__('Message')" class="sr-only" />
        <x-textarea-input id="message" name="message" placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full" />
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
    </div>

    <div class="mt-6">
        <x-primary-button>
            {{ __('Chirp') }}
        </x-primary-button>
    </div>
</form>
