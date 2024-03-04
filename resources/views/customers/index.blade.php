<x-app-layout>

    {{-- <x-slot name="header">

    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm pb-2 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="relative h-14 w-auto">
                            <a href="{{ route('customers.create') }}">
                                <x-outline-buttons :class="__('px-5 absolute bottom-1 end-2')" :color="__('blue')">
                                    {{ __('Add') }}
                                </x-outline-buttons>
                            </a>

                        </div>
                        <div class="w-full border-spacing-2 text-sm text-left text-gray-500 dark:text-gray-400">
                            <div
                                class="md:block hidden text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <div class="w-full grid grid-flow-col">
                                    <div class="px-6 py-3">
                                        {{ __('Contact') }}
                                    </div>
                                    <div class="px-6 py-3">
                                        Inf {{ __('Date') }}
                                    </div>
                                    <div class="px-6 py-3 ">
                                        {{ __('Status') }}
                                    </div>
                                    <div class="px-6 py-3 ">
                                        {{ __('Actions') }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                @foreach ($customers as $customer)
                                    @php
                                        $statusCustomer = $customer->active == 1 ? 'green' : 'red';
                                        $colorStatus = $customer->active == 1 ? 'red' : 'indigo';
                                        $textStatusBtn = $customer->active == 1 ? 'Unsubscribe' : 'Reenable';
                                    @endphp
                                    <div
                                        class="md:flex md:border-0 md:m-0 my-2 mx-2 rounded-lg md:rounded-none border border-gray-400 grid grid-cols-1 md:bg-white bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 transition ease-in-out duration-100 md:hover:dark:bg-gray-700 md:hover:bg-gray-100 ">
                                        <div
                                            class="md:w-3/12 md:order-1 order-2 px-6 py-4 text-gray-900  dark:text-white">
                                            <div class="ps-3">
                                                <div class="text-pretty font-semibold">{{ __('Name') }}:
                                                    {{ $customer->name }}</div>
                                                <div class="font-normal dark:text-gray-300">{{ __('Phone') }}:
                                                    {{ $customer->phone }}</div>
                                                <div class="font-normal dark:text-gray-300">Email:
                                                    {{ $customer->email }}</div>
                                                <div class="font-normal dark:text-gray-300">CIF: <span
                                                        class="blur-sm hover:blur-none">{{ $customer->cif }} </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="md:w-3/12 md:order-2 md:border-0 order-3 border border-gray-500 mx-2 px-6 py-4 rounded-md text-gray-900  dark:text-white">
                                            <div class="ps-3">
                                                <span
                                                    class="md:hidden bg-blue-700 text-white rounded-lg px-2 py-0.5  font-bold ">Date
                                                    Info:
                                                </span>
                                                <div class="font-normal dark:text-gray-300">{{ __('Registered') }}:
                                                    {{ \Carbon\Carbon::parse($customer->created_at)->format('d-M-Y H:i:s') }}
                                                </div>
                                                <div class="font-normal dark:text-gray-300">{{ __('Updated') }}:
                                                    {{ \Carbon\Carbon::parse($customer->updated_at)->format('d-M-Y H:i:s') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="md:w-3/12 md:order-3 order-4 items-center px-6 py-4 text-gray-900 dark:text-white">
                                            <div class="ps-3">
                                                <span class="md:hidden ">Status Customer:</span>
                                                <x-badges :type="$statusCustomer">
                                                    {{ __($customer->active == 1 ? 'Actived' : 'Deactivated') }}
                                                </x-badges>
                                            </div>
                                        </div>
                                        <div class="md:w-3/12 md:order-4 order-first px-6 py-4">
                                            <div
                                                class="max-md:grid-flow-col max-md:gap-4 max-[1300px]:grid max-[1300px]:grid-cols-1 max-[1300px]:w-fit max-[1300px]:space-x-0 flex space-x-5 ">
                                                <a class="w-fit mb-2"
                                                    href="{{ route('customers.edit', ['customer' => $customer->id]) }}">
                                                    <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('yellow')">
                                                        {{ __('Edit') }}
                                                    </x-outline-buttons>
                                                </a>
                                                <a class="w-fit mb-2" x-data
                                                    x-on:click="$dispatch('open-modal', {name: 'deactivate-customer', id: {{ $customer->id }}, 'inf':{{ $customer->active }}})">
                                                    <x-outline-buttons
                                                        class="py-2.5 px-5 transition ease-in-out duration-100"
                                                        :color="__($colorStatus)"> {{ __($textStatusBtn) }}
                                                    </x-outline-buttons>
                                                </a>
                                                <a class="w-fit mb-2"
                                                    href="{{ route('customers.show', ['customer' => $customer->id]) }}">
                                                    <x-outline-buttons
                                                        class="py-2.5 px-5 transition ease-in-out duration-100"
                                                        :color="__('green')">
                                                        {{ __('Show') }}
                                                    </x-outline-buttons>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 mx-2">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-modal :name="__('deactivate-customer')">
        <div>
            <div class="p-6">
                <h2 class="text-lg font-extrabold text-red-500">
                    {{ __('User Deactivation Warning') }}
                </h2>
                <p class="mt-1 text-md text-gray-600 dark:text-gray-400">
                    {{ __('Before proceeding, its important for you to understand the implications of deactivating this user. The action youre about to take will result in the permanent deactivation of the selected users account. Please consider the following:') }}
                </p>

                <ol class="list-decimal pl-6 mb-4 mt-1 text-md text-gray-600 dark:text-gray-400">
                    <li class="mb-2"><span
                            class="text-red-500 text-bold">{{ __('Associated Tasks') }}:</span>{{ __('All tasks assigned to this user will be affected. Their status will automatically change to Cancelled. This may influence the management and tracking of ongoing projects.') }}
                    </li>
                    <li class="mb-2"><span
                            class="text-red-500 text-bold">{{ __('Shared Responsibilities') }}:</span>{{ __('If this user is responsible for critical or shared tasks, please note that these responsibilities will become unassigned until manual adjustments are made.') }}
                    </li>
                    <li class="mb-2"><span
                            class="text-red-500 text-bold">{{ __('Restricted Access') }}:</span>{{ __('Once deactivated, the user will lose access to the platform and will be unable to log in or access their previously recorded data.') }}
                    </li>
                    <li class="mb-2"><span
                            class="text-red-500 text-bold">{{ __('Historical Information') }}:</span>{{ __('While tasks will still exist in the system, their Cancelled status may affect historical records and the clarity of information.') }}
                    </li>
                </ol>

                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('By confirming the deactivation of this user, you accept the aforementioned consequences. Please ensure relevant stakeholders are informed of these changes.') }}
                </p>
                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Are you sure you want to deactivate this user?') }}
                </p>
                <div class="flex px-5 justify-between">
                    <button x-on:click="$dispatch('close-modal', {name: 'deactivate-customer'})"
                        class="bg-gray-300
                        hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">{{ __('Cancel') }}</button>
                    <form x-bind:action="`{{ url()->current() }}/${data.id}`" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="active" :value="data.inf == 1 ? 0 : 1">
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{ __('Deactivate Customer') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>
</x-app-layout>
