<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="antialiased text-slate-900 bg-slate-50 dark:bg-slate-950">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-black">
            
            <div class="mb-8 transition-transform hover:scale-105 duration-300">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-indigo-500 drop-shadow-[0_0_15px_rgba(99,102,241,0.5)]" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white dark:bg-slate-900 shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden sm:rounded-3xl">
                <div class="text-slate-200">
                    {{ $slot }}
                </div>
            </div>

            <div class="mt-8 text-slate-500 text-xs tracking-widest uppercase">
                &copy; {{ date('Y') }} {{ config('app.name') }}
            </div>
        </div>
    </body>
</html>