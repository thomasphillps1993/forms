import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


document.addEventListener('DOMContentLoaded', () => {
    // Register the Alpine data component
    Alpine.data('weatherWidget', () => ({
        time: new Date().toLocaleTimeString(),
        weather: null,
        init() {
            // Update time every second
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
    }));

    // Initialize Alpine.js after registering the component
    Alpine.start();
});
