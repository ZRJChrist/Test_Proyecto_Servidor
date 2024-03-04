<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm pb-2 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="w-96 mx-auto shadow-lg p-2 rounded-lg" method="POST"
                        action="{{ route('employees.update', ['employee' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <p class="text-gray-700 text-sm">Update Inf Employee</p>
                        <!-- DNI -->
                        <x-group-input name="dni" :value="$user->dni" />
                        <!-- Name -->
                        <x-group-input name="name" :value="$user->name" />
                        <!-- Email Address -->
                        <x-group-input name="email" :value="$user->email" />
                        <x-group-select name="type" :data="[['id' => 0, 'name' => 'Operator'], ['id' => 1, 'name' => 'Admin']]" :value="$user->is_admin" />

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <form class="w-96 mx-auto shadow-lg p-2 rounded-lg mt-5" method="POST"
                        action="{{ route('employees.newpass', ['employee' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <p class="text-gray-700 text-sm">New Password</p>
                        <div class="mt-4 relative z-0 w-full mb-5 group">
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required placeholder="" />
                            <x-input-label for="password" :value="__('Password')" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mt-4 relative z-0 w-full mb-5 group">

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required placeholder="" />
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
