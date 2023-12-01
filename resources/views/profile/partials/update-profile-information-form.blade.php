<section>
    <header>
        <h2 class="text-lg font-medium text-theme-primary-100 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-theme-primary-100 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" class="text-theme-primary-100" :value="__('Profile Image')" />
            <img id="image"
                src="{{ auth()->user()?->avatar ? asset(Storage::url(auth()->user()?->avatar)) : asset('assets/site/images/profile-placeholder.png') }}"
                class="w-40 h-40 fill-current text-gray-500  border border-theme-success-200 rounded"
                onclick="$('#hiddenImage').trigger('click'); return false;" style="cursor:pointer;">
            <input type="file" id="hiddenImage" name="image" class="hidden"
                accept="image/x-png, image/gif, image/jpeg, image/jpg"
                onchange="renderImgCrop(this, '#image' ,1/1,'bg');">

            <div class="hidden">
                <input value="" type="hidden" name="xImage" id="x" value="" class="x">
                <input value="" type="hidden" name="yImage" id="y" value="" class="y">
                <input value="" type="hidden" name="widthImage" id="width" value="" class="width">
                <input value="" type="hidden" name="heightImage" id="height" value="" class="height">

            </div>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="name" class="text-theme-primary-100" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text"
                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" class="text-theme-primary-100" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email"
                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-theme-primary-100 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-theme-primary-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-theme-success-200">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif --}}
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="hover:bg-theme-primary-300">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-theme-primary-100 ">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>



    <script>
    </script>
</section>
