<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Create New Conversation') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-silver">
                    <form method="POST" action="{{ route('conversation.store') }}">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-silver">Title</label>
                            <input type="text" id="title" name="title" class="w-full mt-1 p-2 rounded-md bg-gray-700 text-white" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-silver">Description</label>
                            <textarea id="description" name="description" class="w-full mt-1 p-2 rounded-md bg-gray-700 text-white"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Create Conversation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
