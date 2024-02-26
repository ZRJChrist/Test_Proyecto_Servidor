<x-app-layout>
    {{-- <x-slot name="header">

    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm pb-2 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @if (Auth::user()->is_admin)
                            <div class="relative h-14 w-auto ">
                                <a href="{{ route('tasks.create') }}">
                                    <x-outline-buttons :class="__('px-5 absolute bottom-1 end-2')" :color="__('blue')">
                                        {{ __('Add') }}
                                    </x-outline-buttons>
                                </a>
                            </div>
                        @endif
                        <div class="w-full border-spacing-2 text-sm text-left text-gray-500 dark:text-gray-400">
                            <div
                                class="md:block hidden text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <div class="grid grid-flow-col">
                                    <div class="px-6 py-3">
                                        Inf {{ __('Contact') }}
                                    </div>
                                    <div class="px-6 py-3">
                                        Inf {{ __('Tasks') }}
                                    </div>
                                    <div class="px-6 py-3">
                                        Inf {{ __('Localization') }}
                                    </div>
                                    <div class="px-6 py-3">
                                        {{ __('Status') }}
                                    </div>
                                    <div class="px-6 py-3">
                                        {{ __('Actions') }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                @foreach ($tasks as $task)
                                    <div
                                        class="md:flex md:border-0 md:m-0 md:rounded-none border border-gray-200  grid grid-cols-1 m-2 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 transition ease-in-out duration-100 md:hover:dark:bg-gray-700 md:hover:bg-gray-100 ">
                                        <div
                                            class="md:order-1 md:w-4/12 md:rounded-none md:m-0 rounded-lg m-2 border border-gray-300 dark:border-gray-600 md:border-0 items-center px-6 md:px-0 lg:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white ">
                                            <p
                                                class="md:hidden bg-purple-100 text-purple-800 text-md font-semibold	inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                                                <i class="fa-solid fa-user mr-2"></i> Inf {{ __('Contact') }}
                                            </p>
                                            <div class="lg:ps-3">
                                                <div class="text-pretty font-semibold">{{ $task->contact_name }}</div>
                                                <div class="font-normal dark:text-gray-300">Email: {{ $task->email }}
                                                </div>
                                                <div class="font-normal dark:text-gray-300">Phone:
                                                    {{ $task->contact_phone }}</div>
                                            </div>
                                        </div>
                                        <div
                                            class="md:order-2 md:w-4/12 md:border-0 md:rounded-none md:m-0 border border-gray-300 dark:border-gray-600  rounded-lg m-2 items-center px-6 py-4 text-gray-900 whitespace-wrap dark:text-white ">
                                            <p
                                                class="md:hidden bg-green-100 text-green-800 text-md font-semibold	inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                                <i class="fa-regular fa-file-lines mr-2"></i>
                                                Inf {{ __('Task') }}
                                            </p>
                                            <div class="lg:ps-3">
                                                <div class="text-prettye font-semibold">{{ $task->title }}</div>
                                                <div
                                                    class="font-normal dark:text-gray-300 h-10 text-ellipsis overflow-hidden ...">
                                                    <p>Inf:{{ $task->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="md:grid-cols-3 md:order-3 md:w-9/12 grid grid-cols-2 gap-2 m-2 md:gap-0 md:m-0">
                                            <div
                                                class="md:col-span-2 md:border-0 border border-gray-300 dark:border-gray-600  rounded-lg items-center sm:px-6 px-3 py-4 text-gray-900 dark:text-white">
                                                <p
                                                    class="md:hidden bg-red-100 text-red-800 text-md font-semibold inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 mb-2 text-wrap">
                                                    <i class="fa-solid fa-location-dot mr-2"></i> Inf
                                                    {{ __('Localization') }}
                                                </p>
                                                <div class="lg:ps-3">
                                                    <div class="text-pretty font-normal">{{ $task->name_province }},
                                                        {{ $task->city }}</div>
                                                    <div class="font-normal dark:text-gray-300">{{ $task->address }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="md:justify-start md:border-0 flex place-content-center border border-gray-300 dark:border-gray-600  rounded-lg justify-center relative">

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
                                                <x-badges-status class="mt-5" :type="$type" :icon="$icon">
                                                    {{ __($task->status_description) }}
                                                </x-badges-status>
                                            </div>
                                        </div>
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
                                                    x-on:click="$dispatch('open-modal', {name: 'delete-task', id: {{ $task->id }}, data: '{{ $task->title }}' })">
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
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mb-2 mx-2">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
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
                        to this task will be permanently deleted. You won't be able to recover them once the action is
                        completed.</li>
                    <li class="mb-2"><span class="text-red-500 text-bold">Impact on History:</span>Deleting this task
                        will affect the history and tracking of
                        associated activities. Any reference or link to this task will no longer be available.</li>
                    <li class="mb-2"><span class="text-red-500 text-bold">Notified Collaborators:</span> If you shared
                        this task with other collaborators, be
                        aware that they will lose access to it once it is deleted.</li>
                    <li class="mb-2"><span class="text-red-500 text-bold">Documented Decisions:</span>If this
                        task contains important decisions, critical
                        comments, or any crucial information, consider archiving it or extracting relevant information
                        before deletion.</li>
                </ol>

                <p class="mb-4 mt-1 text-sm text-gray-600 dark:text-gray-400">By confirming the deletion of the task,
                    you accept responsibility for the
                    aforementioned consequences. Please reflect on the importance of this action and proceed with
                    caution.</p>
                <div class="flex px-5 justify-between">
                    <button x-on:click="$dispatch('close-modal', {name: 'delete-task'})"
                        class="bg-gray-300
                        hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
                    <form x-bind:action="`{{ url()->current() }}/${data.id}`" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete
                            Task</button>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>
</x-app-layout>
