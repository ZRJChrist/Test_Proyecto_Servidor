<x-app-layout>

    {{-- <x-slot name="header">

    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm pb-2 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="relative h-14 w-auto">
                            <a href="{{ route('payments.create') }}">
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
                                        Inf {{ __('Payment') }}
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
                                @foreach ($payments as $payment)
                                    @php
                                        $statusCustomer = $payment->paid == 1 ? 'green' : 'red';
                                        $colorStatus = $payment->paid == 1 ? 'red' : 'indigo';
                                    @endphp
                                    <div
                                        class="md:flex md:border-0 md:m-0 my-2 mx-2 rounded-lg md:rounded-none border border-gray-400 grid grid-cols-1 md:bg-white bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 transition ease-in-out duration-100 md:hover:dark:bg-gray-700 md:hover:bg-gray-100 ">
                                        <div
                                            class="md:w-3/12 md:order-1 order-2 px-6 py-4 text-gray-900  dark:text-white">
                                            <div class="ps-3">
                                                <div class="text-pretty font-semibold">{{ __('Name') }}:
                                                    {{ $payment->name }}</div>
                                                <div class="font-normal dark:text-gray-300">{{ __('Phone') }}:
                                                    {{ $payment->phone }}</div>
                                                <div class="font-normal dark:text-gray-300">Email:
                                                    {{ $payment->email }}</div>

                                            </div>
                                        </div>
                                        <div
                                            class="md:w-3/12 md:order-2 md:border-0 order-3 border border-gray-500 mx-2 px-6 py-4 rounded-md text-gray-900  dark:text-white">
                                            <div class="ps-3">
                                                <span
                                                    class="md:hidden bg-blue-700 text-white rounded-lg px-2 py-0.5  font-bold ">Date
                                                    Info:
                                                </span>
                                                <div class="font-normal dark:text-gray-300">{{ __('Concept') }}:
                                                    {{ $payment->concept }}</div>
                                                <div class="font-normal dark:text-gray-300">{{ __('Amount') }}:
                                                    {{ $payment->amount }} €</div>
                                                <div class="font-normal dark:text-gray-300">{{ __('Date of issue') }}:
                                                    {{ \Carbon\Carbon::parse($payment->created_at)->format('d-M-Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="md:w-3/12 md:order-3 order-4 items-center px-6 py-4 text-gray-900 dark:text-white">
                                            <div class="ps-3">
                                                <span class="md:hidden ">Status Customer:</span>
                                                <x-badges :type="$statusCustomer">
                                                    {{ $payment->paid == 1 ? 'Paid' : 'No paid' }}
                                                </x-badges>
                                                @if ($payment->payment_date !== null)
                                                    <div class="font-normal dark:text-gray-300">{{ __('Date') }}:
                                                        {{ \Carbon\Carbon::parse($payment->payment_date)->format('d-M-Y') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="md:w-3/12 md:order-4 order-first px-6 py-4">
                                            <div
                                                class="max-md:grid-flow-col max-md:gap-4 max-[1300px]:grid max-[1300px]:grid-cols-1 max-[1300px]:w-fit max-[1300px]:space-x-0 flex space-x-5 ">

                                                @if (!$payment->paid)
                                                    <a class="w-fit mb-2"
                                                        href="{{ route('payments.edit', ['payment' => $payment->id]) }}">
                                                        <x-outline-buttons :class="__(
                                                            'py-2.5 px-5 transition ease-in-out duration-100',
                                                        )" :color="__('yellow')">
                                                            {{ __('Edit') }}
                                                        </x-outline-buttons>
                                                    </a>
                                                    <a class="w-fit mb-2" x-data
                                                        x-on:click="$dispatch('open-modal', {name: 'change-payment-status', id: {{ $payment->id }}, 'inf':{{ $payment->paid }}})">
                                                        <x-outline-buttons
                                                            class="py-2.5 px-5 transition ease-in-out duration-100"
                                                            :color="__($colorStatus)"> Pay
                                                        </x-outline-buttons>
                                                    </a>
                                                    <a class="w-fit mb-2" x-data
                                                        x-on:click="$dispatch('open-modal', {name: 'delete-payment', id: {{ $payment->id }}, 'inf':'{{ $payment->name }}'})">
                                                        <x-outline-buttons
                                                            class="py-2.5 px-5 transition ease-in-out duration-100"
                                                            color="red"> Delete
                                                        </x-outline-buttons>
                                                    </a>
                                                @endif
                                                @if ($payment->paid)
                                                    <a class="w-fit mb-2"
                                                        href="{{ route('payments.show', ['payment' => $payment->id]) }}">
                                                        <x-outline-buttons
                                                            class="py-2.5 px-5 transition ease-in-out duration-100"
                                                            :color="__('green')">
                                                            {{ __('Show') }}
                                                        </x-outline-buttons>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 mx-2">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-modal :name="__('change-payment-status')">
        <div>
            <div class="p-6">
                <h2 class="text-lg font-extrabold text-red-500">
                    Payment Status Change Warning </h2>
                <p class="mt-1 text-md text-gray-600 dark:text-gray-400">
                    Changing this payment status from "Not Paid" to "Paid" will update financial records and user
                    confirmations. Proceed with caution:
                </p>

                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">
                    By confirming this change, you accept the consequences. Please ensure stakeholders are informed.
                </p>
                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Are you sure you want to mark this payment as "Paid"?
                </p>
                <div class="flex px-5 justify-between">
                    <button x-on:click="$dispatch('close-modal', {name: 'change-payment-status'})"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">{{ __('Cancel') }}</button>
                    <form x-bind:action="`{{ url()->current() }}/${data.id}`" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="paid" :value="1">
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{ __('Mark as Paid') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>
    <x-modal :name="__('delete-payment')">
        <div>
            <div class="p-6">
                <h2 class="text-lg font-extrabold text-red-500">
                    {{ __('Delete Payment') }}
                </h2>
                <p class="mt-1 text-md text-gray-600 dark:text-gray-400">
                    {{ __('Are you sure you want to delete this payment? This action cannot be undone. Please consider the following:') }}
                </p>

                <ol class="list-decimal pl-6 mb-4 mt-1 text-md text-gray-600 dark:text-gray-400">
                    <li class="mb-2">
                        {{ __('All associated records, including financial data, will be permanently deleted.') }}</li>
                    <li class="mb-2">{{ __('Any reports or history related to this payment will be affected.') }}
                    </li>
                    <li class="mb-2">{{ __('This action is irreversible and may impact data integrity.') }}</li>
                </ol>

                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('By confirming this deletion, you accept the consequences. This payment will be permanently removed from the system.') }}
                </p>
                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Are you sure you want to proceed with deleting this payment?') }}
                </p>
                <div class="flex px-5 justify-between">
                    <button x-on:click="$dispatch('close-modal', {name: 'delete-payment'})"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">{{ __('Cancel') }}</button>
                    <form x-bind:action="`{{ url()->current() }}/${data.id}`" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{ __('Delete Payment') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>

</x-app-layout>
