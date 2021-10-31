<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <a href="/excercises">Excercises</a> |
                <a href="/excercise-history">Excercise History</a> |
                <a href="/workout-routines">Workout Routines</a> |
                <a href="/my-routine">My Routine</a> |
                <a href="/user/{{ auth()->user()->id }}">User Data</a> |
            </div>
        </div>
    </div>
</x-app-layout>
