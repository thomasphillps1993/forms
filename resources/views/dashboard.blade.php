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
                    <div x-data="{
                        time: new Date().toLocaleTimeString(),
                        weather: null,
                        init() {
                            setInterval(() => {
                                this.time = new Date().toLocaleTimeString();
                            }, 1000);
                    
                            this.getLocation();
                        },
                        async getLocation() {
                            try {
                                const res = await fetch('http://ip-api.com/json/');
                                const data = await res.json();
                                if (data.lat && data.lon) {
                                    this.getWeather(data.lat, data.lon);
                                }
                            } catch (error) {
                                console.error('Error fetching location:', error.message);
                            }
                        },
                        async getWeather(lat, lon) {
                            try {
                                const res = await fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true`);
                                const data = await res.json();
                                this.weather = data.current_weather;
                            } catch (error) {
                                console.error('Error fetching weather data:', error.message);
                            }
                        }
                    }" x-init="init" class="text-2xl font-bold text-center my-4">

                        <!-- Clock -->
                        <div class="text-white mb-4">
                            🕒 <span x-text="time"></span>
                        </div>

                        <!-- Weather Section -->
                        <template x-if="weather">
                            <div
                                class="mt-4 bg-gray-900 text-silver p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                <p class="text-xl font-semibold mb-2">
                                    🌡️ Temp: <span x-text="weather.temperature"></span>°C
                                </p>
                                <p class="text-lg">
                                    💨 Wind Speed: <span x-text="weather.windspeed"></span> km/h
                                </p>
                                <p class="text-sm text-gray-400 mt-2">
                                    Updated just now
                                </p>
                            </div>
                        </template>
                    </div>


                    <!-- Navigation Bar -->
                    <nav class="bg-gray-900 p-4 rounded-lg shadow-md">
                        <div class="container mx-auto flex justify-between items-center">
                            <a class="text-2xl text-silver font-semibold hover:text-white"
                                href="{{ url('/') }}">Forms</a>
                            <ul class="flex space-x-4">
                                @auth
                                    <li>
                                        <!-- Conversation Thread link -->
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg"
                                            href="{{ route('conversation.index') }}">Conversation Threads</a>
                                    </li>
                                    <li>
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg"
                                            href="{{ route('feedback.create') }}">Submit Feedback</a>
                                    </li>
                                    <li>
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg"
                                            href="{{ route('feedback.index') }}">Your Submissions</a>
                                    </li>
                                    <li>
                                        <a class="text-silver hover:text-white px-4 py-2 rounded-lg"
                                            href="{{ route('reddit.index') }}">Reddit</a>
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
