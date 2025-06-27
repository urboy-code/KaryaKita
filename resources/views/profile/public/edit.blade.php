<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white">{{ __('Edit Profile') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.public.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mt-4">
                            <x-input-label for="bio" :value="__('Bio')" />
                            <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full border-gray-700 shadow-sm rounded-md">{{ old('bio', $user->profile->bio) }}</textarea>

                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" name="city" type="text"
                                class="mt-1 block w-full border-gray-300 shadow-sm bg-white" :value="old('city', $user->profile->city)" />

                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
                            <x-text-input name="profile_photo" id="profile_photo" type="file" />

                            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
                        </div>

                        @if ($user->profile->profile_photo)
                            <div class="mt-4">
                                <p>{{ __('Current Profile Photo') }}</p>
                                <img class="w-32 h-32 object-cover rounded-full"
                                    src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                                    alt="{{ $user->name }}" />
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
