<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">wewe, {{ Auth::guard('student')->user()->name }}!</h3>
                    
                    <!-- Student Information -->
                    <div class="mb-6">
                        <h4 class="text-md font-medium mb-2">Your Information</h4>
                        <p>Name: {{ Auth::guard('student')->user()->name }}</p>
                        <p>Email: {{ Auth::guard('student')->user()->email }}</p>
                    </div>

                    <!-- Grades Section -->
                    <div class="mb-6">
                        <h4 class="text-md font-medium mb-2">Your Grades</h4>
                        <div class="mt-6">
                            <a href="{{ route('studentviews.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                View My Grades
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>