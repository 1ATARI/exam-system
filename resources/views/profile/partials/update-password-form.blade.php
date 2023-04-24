<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 form-horizontal form-label-left">
        @csrf
        @method('put')

        <div class="item form-group">
            <x-input-label class="col-form-label col-md-3 col-sm-3 label-align" for="current_password" :value="__('Current Password')" />
            <div class="col-md-6 col-sm-6 ">

                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="item form-group">

            <x-input-label class="col-form-label col-md-3 col-sm-3 label-align" for="password" :value="__('New Password')" />
            <div class="col-md-6 col-sm-6 ">

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="item form-group">
            <x-input-label class="col-form-label col-md-3 col-sm-3 label-align" for="password_confirmation" :value="__('Confirm Password')" />
            <div class="col-md-6 col-sm-6 ">

                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

        </div>

        <div class="flex items-center gap-4">
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <x-primary-button class="btn btn-danger btn-round">{{ __('Save') }}</x-primary-button>
                </div>
            </div>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
