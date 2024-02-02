<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                            <p
                                class="bg-blue-100 text-blue-800 text-md font-semibold inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                                <i class="fa-solid fa-circle-info mr-2"></i>
                                Main Information
                            </p>
                            <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">
                                {{ $task->title }}</h1>
                            <div class="md:px-5">
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">
                                    {{ $task->description }}
                                </p>
                            </div>
                            <div class=" border border-black dark:border-gray-500 rounded-lg md:mx-5 p-2">
                                <span>Previous Notes: </span>
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">
                                    {{ $task->pre_notes }}
                                </p>
                            </div>
                            <div class="mt-2 border border-black dark:border-gray-500 rounded-lg md:mx-5 p-2">
                                <span>Later Notes: </span>
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">
                                    {{ $task->later_notes }}
                                </p>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                                <p
                                    class="bg-green-100 text-green-800 text-md font-semibold inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <i class="fa-solid fa-users mr-2"></i>
                                    Costumer/Contact Information
                                </p>
                                <dl
                                    class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Customer</dt>

                                        <x-dd :title="__('ID:')" :inf="$task->customer_id" />
                                        <x-dd :title="__('Name:')" :inf="$task->customer_name" />
                                        <x-dd :title="__('Phone:')" :inf="$task->customer_phone" />
                                        <x-dd :title="__('CIF:')" :inf="$task->customer_cif" />
                                        <x-dd :title="__('Email: ')" :inf="$task->customer_email" />

                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Inf Contact</dt>
                                        <x-dd :title="__('Name:')" :inf="$task->contact_name" />
                                        <x-dd :title="__('Phone:')" :inf="$task->contact_phone" />
                                        <x-dd :title="__('Email:')" :inf="$task->email" />
                                    </div>
                                </dl>
                            </div>
                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                                <p
                                    class="bg-purple-100 text-purple-800 text-md font-semibold	inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                                    <i class="fa-regular fa-file-lines mr-2"></i>
                                    Additional Task Information
                                </p>
                                <dl
                                    class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Operator</dt>
                                        <x-dd :title="__('ID:')" :inf="$task->operator_id" />
                                        <x-dd :title="__('Name: ')" :inf="$task->operator_name" />
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Address</dt>
                                        <div class="flex">
                                            <x-dd>{{ $task->address }} , {{ $task->city }},
                                                {{ $task->postal_code }}, {{ $task->name_province }} ,
                                                {{ $task->iso_country }}</x-dd>
                                        </div>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Status Task</dt>
                                        <x-badges :isoStatus="$task->iso_status">{{ $task->status_description }}</x-badges>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>


</x-app-layout>
