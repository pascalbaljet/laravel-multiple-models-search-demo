<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search Demo</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:pt-0">
            <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8 sm:py-6 lg:py-8">
                <form>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="term">
                                Search
                            </label>
                            <input value="{{ $term }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="term" name="term" type="text">
                        </div>
                    </div>
                </form>

                <table class="table-auto w-full mb-6">
                    <tbody>
                        @foreach($results as $result)
                            <x-dynamic-component
                                :component="class_basename($result)"
                                :data="$result"
                                :class="$loop->even ? 'bg-gray-200' : ''" />
                        @endforeach
                    </tbody>
                </table>

                {!! $results->withQueryString()->links() !!}
            </div>
        </div>
    </body>
</html>