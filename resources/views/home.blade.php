<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body class="dark:bg-gray-900 flex">
        <div class="bg-white p-8 rounded-lg shadow">
            <form action="{{route('add.post')}}" method="post">
                @csrf
                <div class="px-2 py-1 border border-2 border-gray">
                    <label>
                        <input name='num1' type="text" class="h-6 w-full">
                        @error("num1")
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </label>
                </div>
                <div class="px-2 py-1 border border-2 border-gray">
                    <label>
                        <input name='num2' type="text" class="h-6 w-full">
                        @error("num2")
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </label>
                </div>
                <button type="submit"> Add</button>
            </form>
        </div>
    </body>
</html>
