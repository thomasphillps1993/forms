<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Reddit Feed') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h2 class="text-2xl font-bold text-silver mb-6">Latest Reddit Posts</h2>
                
                @if (empty($posts))
                    <p class="text-silver">No posts found.</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($posts as $post)
                            <li class="bg-gray-900 p-6 rounded-lg shadow-md">
                                <h3 class="text-xl font-semibold text-white">{{ $post['data']['title'] }}</h3>
                                <p class="text-silver">{{ $post['data']['selftext'] ?? 'No description available' }}</p>
                                <small class="text-gray-400">Submitted on: {{ \Carbon\Carbon::createFromTimestamp($post['data']['created_utc'])->diffForHumans() }}</small>
                                <div class="mt-4">
                                    <a href="{{ $post['data']['url'] }}" class="text-blue-400 hover:text-blue-600" target="_blank">Read more</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
