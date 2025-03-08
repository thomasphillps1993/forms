<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-silver">
                    <!-- Update Profile Information Section -->
                    <div class="space-y-6">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-2xl font-semibold text-silver">Update Profile Information</h3>
                            <p class="text-gray-400 text-sm">Edit your personal information below.</p>
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Update Password Section -->
                        <div class="p-6 sm:p-8">
                            <h3 class="text-2xl font-semibold text-silver">Change Password</h3>
                            <p class="text-gray-400 text-sm">Update your password to ensure your account is secure.</p>
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <!-- Delete User Section -->
                        <div class="p-6 sm:p-8">
                            <h3 class="text-2xl font-semibold text-silver">Delete Account</h3>
                            <p class="text-gray-400 text-sm">Permanently delete your account and all associated data.</p>
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
