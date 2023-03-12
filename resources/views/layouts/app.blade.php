<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
</head>

<body>
    <div class=" h-[45rem] flex flex-col justify-between items-center p-6">
        <nav class="max-w-5xl w-full bg-blue-300 h-12 rounded-md flex items-center justify-center py-2 mb-4">
            <a href="{{ route('tasks.index') }}"
                class="bg-[#6A64F1] text-base font-semibold text-white rounded-md p-1">Task Manager</a>
        </nav>

        <div class="max-w-3xl w-full min-h-[26rem] rounded-md p-2 bg-blue-300">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>

</html>
