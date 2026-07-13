<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            
            <!-- Tombol Kelola & Lihat Web di sebelah kanan judul -->
            <div class="flex gap-3">
                <a href="/kelola-modul" class="bg-purple-600 text-white px-4 py-2 rounded-md font-bold text-xs uppercase tracking-widest hover:bg-purple-700 shadow-sm transition">
                    Kelola Modul
                </a>
                <a href="/" target="_blank" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-md font-bold text-xs uppercase tracking-widest hover:bg-blue-200 shadow-sm transition">
                    Lihat Web
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
