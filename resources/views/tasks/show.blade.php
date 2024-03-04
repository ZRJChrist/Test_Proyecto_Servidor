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
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-2">
                                    <span class="text-white">Finish date:</span>
                                    {{ \Carbon\Carbon::parse($task->scheduled_at)->format('d-M-Y') }}
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
                                        <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Inf Contact
                                            <x-dd :title="__('Name:')" :inf="$task->contact_name" />
                                            <x-dd :title="__('Phone:')" :inf="$task->contact_phone" />
                                            <x-dd :title="__('Email:')" :inf="$task->email" />
                                        </dt>
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
                                        @php
                                            $type = match ($task->iso_status) {
                                                'P' => 'yellow',
                                                'C' => 'red',
                                                default => 'green',
                                            };
                                            $icon = match ($task->iso_status) {
                                                'P' => 'pause',
                                                'C' => 'ban',
                                                default => 'check',
                                            };
                                        @endphp
                                        <x-badges-status :type="$type" :icon="$icon">
                                            {{ $task->status_description }}
                                        </x-badges-status>
                                    </div>
                                </dl>
                            </div>
                            <div class="lg:px-6 md:order-5 md:w-4/12 md:ps-0 ps-2 py-4 order-first">
                                <div
                                    class="max-md:grid-flow-col max-md:gap-4 max-[1300px]:grid max-[1300px]:grid-cols-1 max-[1300px]:w-fit max-[1300px]:space-x-0 flex space-x-5">
                                    <a class="w-fit mb-2" href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                        <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('yellow')">
                                            {{ __('Edit') }}
                                        </x-outline-buttons>
                                    </a>
                                    @if (Auth::user()->is_admin)
                                        <a class="w-fit mb-2" x-data
                                            x-on:click="$dispatch('open-modal', {name: 'delete-task', taskId: {{ $task->id }}, taskTitle: '{{ $task->title }}' })">
                                            <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('red')">
                                                {{ __('Delete') }}
                                            </x-outline-buttons>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->is_admin)
            <x-modal :name="__('delete-task')">
                <div>
                    <div class="p-6">
                        <h2 class="text-lg font-extrabold text-red-500">
                            {{ __('Are you sure you want to delete this task ?') }}
                        </h2>
                        <p class="mt-1 text-md text-gray-600 dark:text-gray-400">
                            {{ __('Before proceeding, we want to alert you about the consequences of deleting this task. The action you are about to take is irreversible and will result in the permanent loss of information associated with this task. Make sure to consider the following:') }}
                        </p>

                        <ol class="list-decimal pl-6 mb-4 mt-1 text-md text-gray-600 dark:text-gray-400">
                            <li class="mb-2"><span class="text-red-500 text-bold">Irreversible Data Loss:</span> All
                                information,
                                comments, and attached files related
                                to this task will be permanently deleted. You won't be able to recover them once the
                                action
                                is
                                completed.</li>
                            <li class="mb-2"><span class="text-red-500 text-bold">Impact on History:</span>Deleting
                                this
                                task
                                will affect the history and tracking of
                                associated activities. Any reference or link to this task will no longer be available.
                            </li>
                            <li class="mb-2"><span class="text-red-500 text-bold">Notified Collaborators:</span> If
                                you
                                shared
                                this task with other collaborators, be
                                aware that they will lose access to it once it is deleted.</li>
                            <li class="mb-2"><span class="text-red-500 text-bold">Documented Decisions:</span>If this
                                task contains important decisions, critical
                                comments, or any crucial information, consider archiving it or extracting relevant
                                information
                                before deletion.</li>
                        </ol>

                        <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">By confirming the deletion of the
                            task,
                            you accept responsibility for the
                            aforementioned consequences. Please reflect on the importance of this action and proceed
                            with
                            caution.</p>
                        <div class="flex px-5 justify-between">
                            <button x-on:click="$dispatch('close-modal', {name: 'delete-task'})"
                                class="bg-gray-300
                            hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
                            <form x-bind:action="`{{ url()->current() }}/${task.taskId}`" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}
                                    {{ __('Task') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </x-modal>
        @endif
</x-app-layout>
