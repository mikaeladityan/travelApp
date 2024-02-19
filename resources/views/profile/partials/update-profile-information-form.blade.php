<section>
    <style>
        input {
            color-scheme: dark;
        }
    </style>
    <header class="w-full">
        <h2 class="flex items-center justify-between text-lg font-medium text-gray-900 dark:text-gray-100">
            <p>
                {{ __('Pengaturan profil saya') }}
            </p>
            <p class="text-xs text-slate-300">
                {{ $user->role->role }}
            </p>
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update profil anda dengan data terbaru yang sesuai.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>
                {{-- Username --}}
                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" name="username" type="text" class="block w-full mt-1"
                        :value="old('username', $user->username)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>

                {{-- Name --}}
                <div class="flex items-center justify-center w-full gap-3 my-4">
                    <div class="w-full">
                        <x-input-label for="firstName" :value="__('Nama Depan')" />
                        <x-text-input id="firstName" name="firstName" type="text" class="block w-full mt-1"
                            :value="old('firstName', $user->firstName)" required autocomplete="firstName" />
                        <x-input-error class="mt-2" :messages="$errors->get('firstName')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="lastName" :value="__('Nama Belakang')" />
                        <x-text-input id="lastName" name="lastName" type="text" class="block w-full mt-1"
                            :value="old('lastName', $user->lastName)" required autocomplete="lastName" />
                        <x-input-error class="mt-2" :messages="$errors->get('lastName')" />
                    </div>
                </div>

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>


            </div>
            <div class="mt-5 md:mt-0">
                {{-- Photo --}}
                <div class="w-full">
                    <div class="flex items-end justify-center gap-4">
                        <div
                            class="relative flex items-center justify-center overflow-hidden rounded-lg shadow max-w-40 max-h-36 shadow-slate-100/40 ">
                            @if ($user->photo == null)
                                <img src="{{ asset('/storage/user/images.png') }}" alt="travel-photo-default"
                                    class="w-full">
                            @else
                                <img src="{{ asset('/storage/' . $user->photo) }}"
                                    alt="Foto profil {{ $user->username }}" class="w-full">
                            @endif
                        </div>
                        <div>
                            <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
                            <x-input-label for="photo" :value="__('Foto Profil')" />
                            <x-text-input id="photo" name="photo" type="file"
                                class="block w-full py-2 pl-3 mt-1 text-sm" :value="old('photo', $user->photo)" autocomplete="photo" />
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                        </div>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="flex items-center justify-center w-full gap-3 mt-5">
                    <div class="w-full">
                        <x-input-label for="phone" :value="__('Telepon / Whatsapp')" />
                        <x-text-input id="phone" name="phone" type="text" class="block w-full mt-1"
                            :value="old('phone', $user->phone)" autocomplete="phone" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="instagram" :value="__('@Instagram')" />
                        <x-text-input id="instagram" name="instagram" type="text" class="block w-full mt-1"
                            :value="old('instagram', $user->instagram)" autocomplete="instagram" />
                        <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="tiktok" :value="__('@Tiktok')" />
                        <x-text-input id="tiktok" name="tiktok" type="text" class="block w-full mt-1"
                            :value="old('tiktok', $user->tiktok)" autocomplete="tiktok" />
                        <x-input-error class="mt-2" :messages="$errors->get('tiktok')" />
                    </div>
                </div>


            </div>

            <div>
                {{-- street --}}
                <div>
                    <x-input-label for="street" :value="__('Jalan')" />
                    <x-text-input id="street" name="street" type="text" class="block w-full mt-1"
                        :value="old('street', $user->street)" autocomplete="street" />
                    <x-input-error class="mt-2" :messages="$errors->get('street')" />
                </div>

                {{-- Name --}}
                <div class="flex items-center justify-center w-full gap-3 my-4">
                    <div class="w-full">
                        <x-input-label for="city" :value="__('Kota')" />
                        <x-text-input id="city" name="city" type="text" class="block w-full mt-1"
                            :value="old('city', $user->city)" autocomplete="city" />
                        <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="province" :value="__('Provinsi')" />
                        <x-text-input id="province" name="province" type="text" class="block w-full mt-1"
                            :value="old('province', $user->province)" autocomplete="province" />
                        <x-input-error class="mt-2" :messages="$errors->get('province')" />
                    </div>
                </div>
                {{-- Name --}}
                <div class="flex items-center justify-center w-full gap-3 my-4">
                    <div class="w-full">
                        <x-input-label for="country" :value="__('Negara')" />
                        <x-text-input id="country" name="country" type="text" class="block w-full mt-1"
                            :value="old('country', $user->country)" autocomplete="country" />
                        <x-input-error class="mt-2" :messages="$errors->get('country')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="postCode" :value="__('Kode Pos')" />
                        <x-text-input id="postCode" name="postCode" type="text" class="block w-full mt-1"
                            :value="old('postCode', $user->postCode)" autocomplete="postCode" />
                        <x-input-error class="mt-2" :messages="$errors->get('postCode')" />
                    </div>
                </div>


            </div>
            <div>
                <div class="flex items-center justify-center w-full gap-3 mb-4">
                    {{-- Card --}}
                    <div class="w-5/12">
                        <x-input-label for="card" :value="__('Jenis Kartu Identitas')" />
                        <select name="card" id="card"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                            <option>--Pilih--</option>
                            <option value="KTP" {{ old('card', $user->card) == 'KTP' ? 'selected' : null }}>KTP
                            </option>
                            <option value="SIM" {{ old('card', $user->card) == 'SIM' ? 'selected' : null }}>SIM
                            </option>
                            <option value="KK"{{ old('card', $user->card) == 'KK' ? 'selected' : null }}>KK
                            </option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('username')" />
                    </div>

                    <div class="w-7/12">
                        <x-input-label for="idCard" :value="__('Nomer Kartu')" />
                        <x-text-input id="idCard" name="idCard" type="number" class="block w-full mt-1"
                            :value="old('idCard', $user->idCard)" autocomplete="idCard" />
                        <x-input-error class="mt-2" :messages="$errors->get('idCard')" />
                    </div>
                </div>

                <div class="flex items-center justify-start w-full gap-3 mb-4">
                    {{-- Actived --}}
                    <div class="w-5/12">
                        <x-input-label for="actived" :value="__('Masa Aktif')" />
                        <x-text-input id="actived" name="actived" type="date" class="block w-full mt-1"
                            :value="old('actived', $user->actived)" />
                        <x-input-error class="mt-2" :messages="$errors->get('actived')" />
                    </div>

                    <div class="w-5/12">
                        <x-input-label for="born" :value="__('Tanggal Lahir')" />
                        <x-text-input id="born" name="born" type="date" class="block w-full mt-1"
                            :value="old('born', $user->born)" />
                        <x-input-error class="mt-2" :messages="$errors->get('born')" />
                    </div>
                </div>


            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
