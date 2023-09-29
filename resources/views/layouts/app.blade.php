<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AbsenceManager</title>

    @vite('resources/css/app.css')

    @livewireScripts
</head>
<body class="flex flex-col items-center justify-top">
@include("layouts.header")
<div class="w-screen h-full flex flex-row justify-center gap-4 overflow-y-auto">
    <div class="h-96 sticky top-0">
        @yield("sidebar")
    </div>
    <div class="h-96 flex-1 m-4 text-[var(--blue)] border-l-3 border-l-[var(--green)]">
        @yield("main")
    </div>
</div>
</body>
</html>
