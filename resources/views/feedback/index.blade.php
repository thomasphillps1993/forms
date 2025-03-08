<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Your Feedback Submissions') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h2 class="text-2xl font-bold text-silver mb-6">Your Feedback Submissions</h2>
                
                @if ($feedbacks->isEmpty())
                    <p class="text-silver">No feedback submitted yet.</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($feedbacks as $feedback)
                            <li class="bg-gray-900 p-6 rounded-lg shadow-md">
                                <p class="text-silver">{{ $feedback->feedback }}</p>
                                <small class="text-gray-400">Submitted on: {{ $feedback->created_at }}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
