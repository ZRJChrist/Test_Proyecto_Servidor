<x-app-layout>
    {{-- @vite(['resources/js/test.js']) --}}

    {{-- <x-slot name="header">
        <div class="mx-auto text-center">
            <h1 class="text-2xl font-bold dark:text-white">New Task</h1>
        </div>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class="w-fit mx-auto px-10 py-2 rounded transition duration-250 ease-out hover:shadow-2xl"
                        method="POST" action="{{ route('tasks.store') }}">
                        <div class="max-w-lg mx-auto">
                            @csrf
                            <!-- Task Title -->
                            <div class="relative z-0 w-full mb-5 group mt-5">
                                <x-text-input placeholder="" id="title" type="text" name="title"
                                    :value="old('title')" required />
                                <x-input-label for="title" :icon="__('fa-solid fa-heading me-1')" :value="_('Title')" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    {{-- Id Customer --}}
                                    <x-select :name="__('customer')" required>
                                        <option value="null" selected>Customer</option>
                                        @foreach ($costumers as $costumer)
                                            <option {{ $costumer->id == old('customer') ? 'selected' : '' }}
                                                value="{{ $costumer->id }}">{{ $costumer->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-input-error :messages="$errors->get('customer')" class="mt-2" />
                                </div>

                                {{-- Id Operator --}}
                                <div class="relative z-0 w-full mb-5 group">
                                    <x-select :name="__('operator')" required>
                                        <option value="null" selected>Operators</option>
                                        @foreach ($operators as $operator)
                                            <option {{ $operator->id == old('operator') ? 'selected' : '' }}
                                                value="{{ $operator->id }}">{{ $operator->name }}</option>
                                        @endforeach
                                    </x-select>
                                    <x-input-error :messages="$errors->get('operator')" class="mt-2" />
                                </div>

                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                {{-- Task Description --}}
                                <x-text-input placeholder="" id="description" type='text' name="description"
                                    :value="old('description')" required />
                                <x-input-label for="description" :icon="__('fa-solid fa-square-plus me-1')" :value="__('Task Description')" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">
                                {{-- Contact Name --}}
                                <div class="relative z-0 w-full mb-5 group">
                                    <x-text-input placeholder="" id="name" type='text' name="name"
                                        :value="old('name')" required />
                                    <x-input-label for="name" :icon="__('fa-solid fa-user-large me-1')" :value="__('Contact Name')" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                {{-- Contact Number Phone --}}
                                <div class="relative z-0 w-full mb-5 group">
                                    <x-text-input placeholder="" id="phone" type='tel' name="phone"
                                        :value="old('phone')" required />
                                    <x-input-label for="phone" :icon="__('fa-solid fa-phone')" :value="__('Contact Number Phone')" />
                                    <x-input-error :messages="$errors->get('')" class="mt-2" />
                                </div>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                {{-- Contact Email --}}
                                <x-text-input placeholder="" id="contact_email" type='email' name="email"
                                    :value="old('email')" required />
                                <x-input-label for="email" :icon="__('fa-solid fa-envelope')" :value="__('Contact Email')" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            {{-- City --}}
                            <div class="relative z-0 w-full mb-5 group">
                                <x-text-input placeholder="" id="city" type='text' name="city"
                                    :value="old('city')" required />
                                <x-input-label for="city" :icon="__('fa-solid fa-city')" :value="__('City')" />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-text-input placeholder="" id="address" type='text' name="address"
                                    :value="old('address')" required />
                                <x-input-label for="address" :icon="__('fa-solid fa-location-dot')" :value="__('Address')" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    {{-- Postal code --}}
                                    <x-text-input placeholder="" id="postal_code" type='number' name="postal_code"
                                        :value="old('postal_code')" required />
                                    <x-input-label for="postal_code" :icon="__('fa-solid fa-envelopes-bulk')" :value="__('Postal Code')" />
                                    <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    {{-- Provinces --}}
                                    <x-select :name="__('province')" required>
                                        <option value="null" selected>Provinces</option>
                                        @foreach ($provinces as $province)
                                            <option {{ $province->id == old('province') ? 'selected' : '' }}
                                                value="{{ $province->id }}">{{ $province->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-input-error :messages="$errors->get('province')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-6">
                                {{-- Status --}}
                                <div class="relative z-0 w-full mb-5 group">
                                    <x-select :name="__('status')" required>
                                        <option value="null" selected>Status</option>
                                        @foreach ($status as $statusItem)
                                            <option {{ $statusItem->id == old('status') ? 'selected' : '' }}
                                                value="{{ $statusItem->id }}">{{ $statusItem->status_description }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    {{-- Task Date --}}
                                    <x-text-input id="date" type='date' name="date"
                                        pattern="\d{2}-\d{2}-\d{4}" :value="old('date')" required />
                                    <x-input-label for="Date" :value="__('Date')" />
                                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                                </div>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                {{-- Task Previous Notes --}}
                                <x-label-noFloat :icon="__('fa-solid fa-comment me-1')" :value="__('Notes')" />
                                <textarea name="notes" class="bg-transparent rounded border-gray-30 focus:border-blue:600 dark:text-white"
                                    name="" cols="50" rows="3"></textarea>
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
