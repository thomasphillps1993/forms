<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Conversation Threads') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-silver">
                    <h3 class="text-2xl font-bold text-center">Your Conversations</h3>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Conversations List -->
                    <ul class="space-y-4">
                        @foreach ($conversations as $conversation)
                            <li class="bg-gray-700 p-4 rounded-lg">
                                <a href="{{ route('conversation.show', $conversation->id) }}" class="text-silver hover:text-white">
                                    {{ $conversation->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Link to Create a New Conversation -->
                    <div class="mt-6">
                        <a href="{{ route('conversation.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Create New Conversation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
