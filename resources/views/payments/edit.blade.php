<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class="mx-auto px-10 py-2 rounded transition duration-250 ease-out hover:shadow-2xl"
                        method="POST" action="{{ route('payments.update', $payment) }}">
                        <div class="max-w-lg mx-auto">
                            @method('PUT')
                            @csrf
                            <div class="grid md:grid-cols-2 md:gap-6">
                                {{-- Id Customer --}}
                                <x-group-select class="mt-5" :name="__('customer_id')" :default="true" :title="__('Customer')"
                                    :data="$customers" :value="$payment->customer_id" :disabled="true" />

                                <x-group-input :icon="__('fa-solid fa-heading me-1')" :name="__('concept')" :value="$payment->concept" />

                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group mt-5">
                                    <x-text-input placeholder="" id="amount" type="number" step=".01"
                                        name="amount" :value="$payment->amount" />
                                    <x-input-label for="amount" icon="fa-solid fa-heading me-1" value="Amount" />
                                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                </div>
                                <x-group-select class="mt-5" :name="__('paid')" nameOption="status" :default="true"
                                    :title="__('Status Payment')" :data="[['id' => 0, 'status' => 'No Paid'], ['id' => 1, 'status' => 'Paid']]" :value="$payment->paid" />
                            </div>

                            <div class="relative z-0 w-full mb-5 group">

                                <x-label-noFloat :icon="__('fa-solid fa-comment me-1')" :value="__('Notes')" />
                                <textarea name="notes"
                                    class="resize-y w-full bg-transparent rounded border-gray-30 focus:border-blue:600 dark:text-white">{{ $payment->notes ?? null }}</textarea>
                            </div>

                            <x-primary-button class="px-5 py-2.5">{{ __('Submit') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
