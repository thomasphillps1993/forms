<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-silver">
                    <!-- Clock Section with Alpine.js -->
                    <div x-data="{
                            time: new Date().toLocaleTimeString(),
                            init() {
                                setInterval(() => {
                                    this.time = new Date().toLocaleTimeString();
                                }, 1000); // Update the time every second
                            }
                        }"
                        x-init="init"
                        class="text-2xl font-bold text-center my-4">
                        <!-- Display the Clock -->
                        <span x-text="time"></span>
                    </div>

                    <!-- Navigation Bar -->
                    <nav class="bg-gray-900 p-4 rounded-lg shadow-md">
                        <div class="container mx-auto flex justify-between items-center">
                            <a class="text-2xl text-silver font-semibold hover:text-white" href="{{ url('/') }}">Forms</a>
                            <ul class="flex space-x-4">
                                @auth
                                  <li>
                                        <!-- Conversation Thread link -->
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg" href="{{ route('conversation.index') }}">Conversation Threads</a>
                                    </li>
                                    <li>
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg" href="{{ route('feedback.create') }}">Submit Feedback</a>
                                    </li>
                                    <li>
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg" href="{{ route('feedback.index') }}">Your Submissions</a>
                                    </li>
                                    <li>
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg" href="{{ route('reddit.index') }}">Reddit</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
