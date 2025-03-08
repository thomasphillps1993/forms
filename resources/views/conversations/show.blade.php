<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Conversation') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-silver">
                    <!-- Display the Conversation Title -->
                    <h3 class="text-2xl font-bold">{{ $conversation->title }}</h3>
                    
                    <!-- Display the Conversation Description -->
                    <p class="mt-4">{{ $conversation->description }}</p>

                    <!-- Display Comments -->
                    <div class="mt-6">
                        <h4 class="text-xl font-semibold">Comments</h4>
                        
                        @foreach ($comments as $comment)
                            <div class="mt-4 p-4 bg-gray-700 rounded-lg">
                                <p><strong>{{ $comment->user->name }}</strong></p>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="bg-green-600 text-white p-2 rounded-md mt-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add Comment Form -->
                    <div class="mt-6">
                        <form action="{{ route('comment.store', $conversation->id) }}" method="POST">
                            @csrf
                            <textarea name="comment" rows="4" class="w-full p-2 bg-gray-800 text-white border border-gray-700 rounded-md" placeholder="Add a comment..." required></textarea>
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Post Comment</button>
                        </form>
                    </div>

                    <!-- Link to go back to the conversations index -->
                    <div class="mt-6">
                        <a href="{{ route('conversation.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Back to Conversations List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
