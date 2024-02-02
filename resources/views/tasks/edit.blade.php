<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class=" mx-auto px-10 py-2 rounded transition duration-250 ease-out hover:shadow-2xl"
                        method="POST" action="{{ route('tasks.update', [$task]) }}">
                        @method('PUT')
                        <div class="max-w-lg mx-auto">
                            @csrf
                            {{-- Task Title --}}
                            <x-group-input :icon="__('fa-solid fa-heading me-1')" :value="$task->title" :name="__('title')" />

                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Id Customer  --}}
                                <x-group-select :name="__('customer_id')" :title="__('Customer')" :default="true" :data="$customers"
                                    :value="$task->customer_id" />

                                {{-- Id Operator --}}
                                <x-group-select :name="__('operator_id')" :title="__('Operator')" :default="true"
                                    :data="$operators" :value="$task->operator_id" />
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                {{-- Description Task --}}
                                <x-label-noFloat :icon="__('fa-solid fa-square-plus me-1')" :value="__('Task Description (max-255)')" />
                                <textarea name="description"
                                    class="resize-y h-28 w-full bg-transparent rounded border-gray-30 focus:border-blue:600 dark:text-white">{{ $task->description }}</textarea>
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Contact Name --}}
                                <x-group-input :icon="__('fa-solid fa-user-large me-1')" :value="$task->contact_name" :name="__('contact_name')"
                                    :title="__('Contact Name')" />

                                {{-- Contact Number Phone --}}
                                <x-group-input :icon="__('fa-solid fa-phone')" :value="$task->contact_phone" :type="__('tel')"
                                    :name="__('contact_phone')" :title="__('Contact Number Phone')" />
                            </div>
                            <x-group-input :icon="__('fa-solid fa-envelope')" :value="$task->email" :type="__('email')" :name="__('email')"
                                :title="__('Contact Email')" />

                            <x-group-input :icon="__('fa-solid fa-city')" :value="$task->city" :name="__('city')" />

                            <x-group-input :name="__('address')" :icon="__('fa-solid fa-location-dot')" :value="$task->address" />
                            <div class="grid md:grid-cols-2 md:gap-6">

                                <x-group-input :icon="__('fa-solid fa-envelopes-bulk')" :type="__('number')" :value="$task->postal_code"
                                    :name="__('postal_code')" :title="__('Postal Code')" />

                                {{-- Province --}}
                                <x-group-select class="mb-5 md:mt-5 md:mb-0" :title="__('Province')" :name="__('province_id')"
                                    :data="$provinces" :value="$task->province_id" />
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">
                                {{-- Status --}}
                                <x-group-select class="mb-5 md:mt-5 md:mb-0" :title="__('Status')" :default="true"
                                    :name="__('status_id')" :data="$status" :value="$task->status_id" :nameOption="__('status_description')" />

                                {{-- Finish Date --}}
                                <x-group-input :type="__('date')" pattern="\d{2}-\d{2}-\d{4}" :title="__('Finish Date')"
                                    :name="__('scheduled_at')" :value="$task->scheduled_at" />
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                {{-- Task Previous Notes --}}
                                <x-label-noFloat :icon="__('fa-solid fa-comment me-1')" :value="__('Notes')" />
                                <textarea name="pre_notes"
                                    class="resize-y w-full bg-transparent rounded border-gray-30 focus:border-blue:600 dark:text-white">{{ trim($task->pre_notes) ?? '' }}</textarea>
                            </div>

                            <x-primary-button class="px-5 py-2.5">{{ __('Submit') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
