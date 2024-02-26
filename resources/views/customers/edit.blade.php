<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Customer Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Update customer information') }}
                        </p>
                    </header>
                    <form action="{{ route('customers.update', [$customer]) }}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="w-full grid md:grid-cols-2 md:gap-6">
                            <x-group-input :name="__('name')" :value="$customer->name" />
                            <x-group-input :type="__('email')" :name="__('email')" :value="$customer->email" />
                            <x-group-input :type="__('tel')" :name="__('phone')" :value="$customer->phone">
                                <small class="absolute dark:text-gray-400">Ej: +34123123123</small>
                            </x-group-input>
                            <x-group-input :name="__('cif')" :value="$customer->cif" />
                            <x-group-input :name="__('account_number')" :title="__('Account Number')" :value="$customer->account_number" />
                            <x-group-select class="mt-5" :name="__('country_id')" :data="$country" :title="__('Country')"
                                :value="$customer->country_id" />
                        </div>
                        <x-primary-button class="px-5 py-2.5">{{ __('Submit') }}</x-primary-button>
                    </form>
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="" method="post">
                        
                    </form>
                </div>
            </div> --}}

        </div>
    </div>
</x-app-layout>
