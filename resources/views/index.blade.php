<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>

        <title>Calculator</title>
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-auto">
                        <calculator></calculator>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-auto">
                        <p>If you wish to proceed with javascript disabled <a href="/calculator/">please click here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
