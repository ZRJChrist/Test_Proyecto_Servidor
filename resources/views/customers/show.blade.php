<x-app-layout>
    @php
        $statusCustomer = $customer->active == 1 ? 'green' : 'red';
        $colorStatus = $customer->active == 1 ? 'orange' : 'green';
        $textStatusBtn = $customer->active == 1 ? 'Deactivate' : 'Active';
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8 grid md:grid-flow-col gap-2 md:grid-cols-1">
                            <div class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg overflow-hidden">
                                <p
                                    class="bg-green-100 text-green-800 text-md font-semibold inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <i class="fa-solid fa-users mr-2"></i>
                                    Costumer Information
                                </p>
                                <dl
                                    class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-70">
                                    <div class="flex flex-col pb-3 ">
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400"></dt>
                                        <x-dd :title="__('ID:')" :inf="$customer->id" />
                                        <x-dd :title="__('Name:')" :inf="$customer->name" />
                                        <x-dd :title="__('Phone:')" :inf="$customer->phone" />
                                        <x-dd :title="__('CIF:')" :inf="$customer->cif" />
                                        <x-dd :title="__('Email: ')" :inf="$customer->email" />
                                        <x-dd :title="__('Account Number: ')" :inf="$customer->account_number" />
                                        <x-dd :title="__('Country: ')" :inf="$country->name" />
                                        <x-badges :type="$statusCustomer">
                                            {{ __($customer->active == 1 ? 'Active' : 'Deactivated') }}
                                        </x-badges>
                                    </div>
                                </dl>
                            </div>
                            <div class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg  overflow-hidden">
                                <div class="sm:flex md:flex-col sm:space-x-2 md:space-x-0 grid grid-cols-2 w-fit">
                                    <a class="w-fit mb-2"
                                        href="{{ route('customers.edit', ['customer' => $customer->id]) }}">
                                        <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('yellow')">
                                            {{ __('Edit') }}
                                        </x-outline-buttons>
                                    </a>
                                    <a class="w-fit mb-2" x-data
                                        x-on:click="$dispatch('open-modal', {name: 'deactivate-customer', id: {{ $customer->id }}, inf: {{ $customer->active }}})">

                                        <x-outline-buttons class="py-2.5 px-5 transition ease-in-out duration-100"
                                            :color="__($colorStatus)">
                                            {{ __($textStatusBtn) }}
                                        </x-outline-buttons>
                                    </a>
                                    <a class="w-fit mb-2" x-data
                                        x-on:click="$dispatch('open-modal', {name: 'delete-customer', taskId: {{ $customer->id }}})">
                                        <x-outline-buttons class="py-2.5 px-5 transition ease-in-out duration-100"
                                            :color="__('red')">
                                            {{ __('Delete') }}
                                        </x-outline-buttons>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="my-5">
                            <span class="text-2xl font-bold ">Tasks</span>
                        </div>
                        @foreach ($tasks as $task)
                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 md:p-8 mb-8">
                                <div class="md:flex md:flex-col ">
                                    <div class="lg:px-6 md:order-5 md:w-4/12 md:ps-0 ps-2 py-4 order-first">
                                        <div
                                            class="max-md:grid-flow-col max-md:gap-4 max-[1300px]:grid max-[1300px]:grid-cols-1 max-[1300px]:w-fit max-[1300px]:space-x-0 flex space-x-5">
                                            <a class="w-fit mb-2"
                                                href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                                <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('yellow')">
                                                    {{ __('Edit') }}
                                                </x-outline-buttons>
                                            </a>
                                            <a class="w-fit mb-2" x-data
                                                x-on:click="$dispatch('open-modal', {name: 'delete-task', id: {{ $task->id }}, inf: '{{ $task->title }}' })">
                                                <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('red')">
                                                    {{ __('Delete') }}
                                                </x-outline-buttons>
                                            </a>
                                            <a class="w-fit mb-2"
                                                href="{{ route('tasks.show', ['task' => $task->id]) }}">
                                                <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('green')">
                                                    {{ __('Show') }}
                                                </x-outline-buttons>
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex flex-col border border-gray-200 dark:border-gray-700 p-2 rounded-lg overflow-hidden">
                                        <x-badges>
                                            <span>Main Information</span>
                                        </x-badges>
                                        <p class="text-lg font-bold">{{ $task->title }}</p>
                                        <p> {{ $task->description }}</p>
                                    </div>
                                    <div class="grid md:grid-cols-3 grid-cols-2 gap-1 mt-1">
                                        <div
                                            class="border border-gray-200 dark:border-gray-700 p-2 rounded-lg col-span-2 md:col-span-1 overflow-hidden">
                                            <x-badges type="purple"><span>Inf Contact</span></x-badges>
                                            <x-dd :title="__('Name: ')" :inf="$task->contact_name" />
                                            <x-dd :title="__('Phone: ')" :inf="$task->contact_phone" />
                                            <x-dd :title="__('Email: ')" :inf="$task->email" />
                                        </div>
                                        <div
                                            class="border border-gray-200 dark:border-gray-700 p-2 rounded-lg overflow-hidden">
                                            <x-badges type="pink"><span>Inf
                                                    {{ __('Localization') }}</span></x-badges>
                                            <dl
                                                class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                                <div class="flex justify-center pt-5">
                                                    <x-dd>{{ $task->address }} , {{ $task->city }},
                                                        {{ $task->postal_code }},
                                                        {{ $task->name_province }}</x-dd>
                                                </div>
                                        </div>
                                        <div
                                            class="border border-gray-200 dark:border-gray-700 p-2 rounded-lg flex justify-center pt-5 overflow-x-hidden">
                                            @php
                                                $type = match ($task->status_iso) {
                                                    'P' => 'yellow',
                                                    'C' => 'red',
                                                    default => 'green',
                                                };
                                                $icon = match ($task->status_iso) {
                                                    'P' => 'pause',
                                                    'C' => 'ban',
                                                    default => 'check',
                                                };
                                            @endphp
                                            <x-badges-status :type="$type" :icon="$icon">
                                                {{ $task->status_description }}
                                            </x-badges-status>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

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
                    <form x-bind:action="`{{ route('customers.index') }}/${data.id}`" method="post">
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
