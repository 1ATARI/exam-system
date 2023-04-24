<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="item form-group">

            <x-input-label class="col-form-label col-md-3 col-sm-3 label-align" for="name" :value="__('Name')" />
            <div class="col-md-6 col-sm-6 ">


                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full form-control   " :value="old('name', $user->name)" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="item form-group">
            <x-input-label class="col-form-label col-md-3 col-sm-3 label-align" for="email" :value="__('Email')" />
            <div class="col-md-6 col-sm-6 ">

                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full form-control" :value="old('email', $user->email)" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Image <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="file" name="image" accept="image/*" class=" image">
            </div>
        </div>
        <div class="item form-group text-center">

            <div class="col-md-6 col-sm-6 ml-5">

                <img src="{{$user->image_path}}" width="100px" height="100px" class="image img-thumbnail image-preview" >
            </div>
        </div>


        <div class="flex items-center gap-4">

            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <x-primary-button class="btn btn-danger btn-round">{{ __('Save') }}</x-primary-button>
                </div>
            </div>
            @if (session('status') === 'profile-updated')
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
