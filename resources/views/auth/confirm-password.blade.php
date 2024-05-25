<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="row g-3 needs-validation">
        @csrf

        <!-- Password -->
        <div class="col-12">
            <x-input-label for="password" :value="__('Password')" class="form-label"/>

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button class="btn btn-primary w-100">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
