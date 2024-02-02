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
                                    Create
                                </x-outline-buttons>
                            </a>

                        </div>
                        <div class="w-full border-spacing-2 text-sm text-left text-gray-500 dark:text-gray-400">
                            <div
                                class="md:block hidden text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <div class="w-full grid grid-flow-col">
                                    <div class="px-6 py-3">
                                        Information
                                    </div>
                                    <div class="px-6 py-3">
                                        Inf Date
                                    </div>
                                    <div class="px-6 py-3 ">
                                        Active
                                    </div>
                                    <div class="px-6 py-3 ">
                                        Actions
                                    </div>
                                </div>
                            </div>
                            <div>
                                @foreach ($customers as $customer)
                                    <div
                                        class="md:flex md:border-0 md:m-0 my-2 mx-2 rounded-lg md:rounded-none border border-gray-400 grid grid-cols-1 md:bg-white bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 transition ease-in-out duration-100 md:hover:dark:bg-gray-700 md:hover:bg-gray-100 ">
                                        <div
                                            class="md:w-3/12 md:order-1 order-2 px-6 py-4 text-gray-900  dark:text-white">
                                            <div class="ps-3">
                                                <div class="text-pretty font-semibold">Name: {{ $customer->name }}</div>
                                                <div class="font-normal dark:text-gray-300">Phone:
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
                                                <div class="font-normal dark:text-gray-300">Registered:
                                                    {{ $customer->created_at }}</div>
                                                <div class="font-normal dark:text-gray-300">Updated:
                                                    {{ $customer->updated_at }}</div>
                                            </div>
                                        </div>
                                        <div
                                            class="md:w-3/12 md:order-3 order-4 items-center px-6 py-4 text-gray-900 dark:text-white">
                                            <div class="ps-3">
                                                <span class="md:hidden ">Status Customer:</span>
                                                <x-badges
                                                    class="{{ $customer->active == 1 ? 'text-white bg-green-700 dark:text-green-300 dark:bg-green-900' : 'text-white bg-red-700 dark:text-red-300 dark:bg-red-900' }}">
                                                    {{ $customer->active == 1 ? 'Active' : 'Disabled' }}
                                                </x-badges>
                                            </div>
                                        </div>
                                        <div class="md:w-3/12 md:order-4 order-first px-6 py-4">
                                            <div
                                                class="max-md:grid-flow-col max-md:gap-4 max-[1300px]:grid max-[1300px]:grid-cols-1 max-[1300px]:w-fit max-[1300px]:space-x-0 flex space-x-5">
                                                <a class="w-fit mb-2"
                                                    href="{{ route('customers.edit', ['customer' => $customer->id]) }}">
                                                    <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('yellow')">
                                                        Edit
                                                    </x-outline-buttons>
                                                </a>
                                                <a class="w-fit mb-2" x-data
                                                    x-on:click="$dispatch('open-modal', {name: 'delete-customer', taskId: {{ $customer->id }}})">
                                                    <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('red')">
                                                        Delete
                                                    </x-outline-buttons>
                                                </a>
                                                <a class="w-fit mb-2"
                                                    href="{{ route('customers.show', ['customer' => $customer->id]) }}">
                                                    <x-outline-buttons :class="__('py-2.5 px-5 transition ease-in-out duration-100')" :color="__('green')">
                                                        Show
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
    <x-modal :name="__('delete-customer')">
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
                    <button x-on:click="$dispatch('close-modal', {name: 'delete-customer'})"
                        class="bg-gray-300
                        hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
                    <form x-bind:action="`{{ url()->current() }}/${task.taskId}`" method="post">
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
