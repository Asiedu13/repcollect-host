<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="bg-gray-100 mx-[100px] min-h-full flex justify-center items-center m-2">
        {{-- <main class="w-[700px] flex justify-center items-center"> --}}
            {{$slot}}

        {{-- </main> --}}
    </body>
</html>
