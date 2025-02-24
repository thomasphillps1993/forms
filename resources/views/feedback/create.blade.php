<x-app-layout>
    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h2 class="text-2xl font-bold text-silver mb-6">Submit Your Feedback</h2>
                
                <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-silver mb-2">Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full p-3 border-2 border-gray-600 rounded-lg bg-gray-900 text-silver placeholder-gray-400 focus:outline-none focus:border-silver">
                    </div>

                    <div>
                        <label for="email" class="block text-silver mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full p-3 border-2 border-gray-600 rounded-lg bg-gray-900 text-silver placeholder-gray-400 focus:outline-none focus:border-silver">
                    </div>

                    <div>
                        <label for="feedback" class="block text-silver mb-2">Feedback:</label>
                        <textarea id="feedback" name="feedback" required class="w-full p-3 border-2 border-gray-600 rounded-lg bg-gray-900 text-silver placeholder-gray-400 focus:outline-none focus:border-silver">{{ old('feedback') }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-3 bg-silver text-black rounded-lg hover:bg-gray-700 transition duration-300">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
