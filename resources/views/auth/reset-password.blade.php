<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="row g-3 needs-validation">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="col-12">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
        </div>

        <!-- Password -->
        <div class="col-12">
            <x-input-label for="password" :value="__('Password')" class="form-label" />
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
        </div>

        <!-- Confirm Password -->
        <div class="col-12">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label"  />

            <x-text-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="invalid-feedback" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn btn-primary w-100">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
