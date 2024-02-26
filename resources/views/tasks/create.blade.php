<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class="mx-auto px-10 py-2 rounded transition duration-250 ease-out hover:shadow-2xl"
                        method="POST" action="{{ route('tasks.store') }}">
                        <div class="max-w-lg mx-auto">
                            @csrf

                            {{-- Task Title --}}
                            <x-group-input :icon="__('fa-solid fa-heading me-1')" :name="__('title')" />

                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Id Customer --}}
                                <x-group-select :name="__('customer_id')" :default="true" :title="__('Customer')"
                                    :data="$customers" />

                                {{-- Id Operator --}}
                                <x-group-select :name="__('operator_id')" :default="true" :title="__('Operator')"
                                    :data="$operators" />
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                {{-- Description Task --}}
                                <x-label-noFloat :icon="__('fa-solid fa-square-plus me-1')" :value="__('Task Description (max-255)')" />
                                <textarea name="description"
                                    class="resize-y h-28 w-full bg-transparent rounded border-gray-30 focus:border-blue:600 dark:text-white"></textarea>
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Contact Name --}}
                                <x-group-input :icon="__('fa-solid fa-user-large me-1')" :name="__('contact_name')" :title="__('Contact Name')" />

                                {{-- Contact Number Phone --}}
                                <x-group-input :icon="__('fa-solid fa-phone')" :type="__('tel')" :name="__('contact_phone')"
                                    :title="__('Contact Number Phone')" />
                            </div>

                            {{-- Contact Name --}}
                            <x-group-input :icon="__('fa-solid fa-envelope')" :type="__('email')" :name="__('email')"
                                :title="__('Contact Email')" />

                            {{-- City --}}
                            <x-group-input :icon="__('fa-solid fa-city')" :name="__('city')" />

                            {{-- Address --}}
                            <x-group-input :name="__('address')" :icon="__('fa-solid fa-location-dot')" />

                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Postal Code --}}
                                <x-group-input :icon="__('fa-solid fa-envelopes-bulk')" :type="__('number')" :name="__('postal_code')"
                                    :title="__('Postal Code')" />

                                {{-- Id Province --}}
                                <x-group-select class="mb-5 md:mt-5 md:mb-0" :name="__('province_id')" :data="$provinces"
                                    :default="true" :title="__('Province')" />
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Status --}}
                                <x-group-select class="mb-5 md:mt-5 md:mb-0" :name="__('status_id')" :data="$status"
                                    :nameOption="__('status_description')" :default="true" :title="__('Status')" />

                                {{-- Finish Date --}}
                                <x-group-input :type="__('date')" pattern="\d{2}-\d{2}-\d{4}" :name="__('scheduled_at')"
                                    :title="__('Finish Date')" />
                            </div>

                            <div class="relative z-0 w-full mb-5 group">

                                {{-- Task Previous Notes --}}
                                <x-label-noFloat :icon="__('fa-solid fa-comment me-1')" :value="__('Notes')" />
                                <textarea name="pre_notes"
                                    class="resize-y w-full bg-transparent rounded border-gray-30 focus:border-blue:600 dark:text-white"></textarea>
                            </div>

                            <x-primary-button class="px-5 py-2.5">{{ __('Submit') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
