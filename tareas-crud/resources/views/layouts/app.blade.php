<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-slate-950 text-slate-200">
        <div class="min-h-screen">
            <div class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-800 bg-slate-950/80">
                @include('layouts.navigation')
            </div>

            @isset($header)
                <header class="bg-slate-900/50 border-b border-slate-800 shadow-sm">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <div class="text-3xl font-bold text-white tracking-tight">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <main class="py-10">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>