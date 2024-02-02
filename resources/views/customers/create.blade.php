<x-app-layout>
    {{-- @vite(['resources/js/test.js']) --}}

    {{-- <x-slot name="header">
        <div class="mx-auto text-center">
            <h1 class="text-2xl font-bold dark:text-white">New Task</h1>
        </div>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class="mx-auto px-10 py-2 rounded transition duration-250 ease-out hover:shadow-2xl"
                        method="POST" action="{{ route('customers.store') }}">
                        <div class="max-w-lg mx-auto">
                            @csrf

                            <div class="grid md:grid-cols-2 md:gap-6">
                                <x-group-input :icon="__('fa-solid fa-heading me-1')" :name="__('cif')" />
                                <x-group-input :icon="__('fa-solid fa-heading me-1')" :name="__('name')" />
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <x-group-select class="mt-5 font-normal" :name="__('country_id')" :default="true"
                                    :title="__('Country')" :data="$country" />
                                <x-group-input :icon="__('fa-solid fa-heading me-1')" :name="__('phone')" />
                            </div>

                            <x-group-input :icon="__('fa-solid fa-heading me-1')" :name="__('email')" />
                            <x-group-input :icon="__('fa-solid fa-heading me-1')" :title="__('Acount Number')" :name="__('account_number')" />

                            <x-primary-button class="px-5 py-2.5">{{ __('Submit') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
