<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>

        <title>Calculator</title>
    </head>
    <body>
        <div>
            <div class="container app">
                <div class="row justify-content-center mt-5">
                    <div class="col-auto">
                        <div class="calculator-box">
                            <table class="calculator">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <input
                                                type="text"
                                                class="display"
                                                value="{{ $current }}"
                                                disabled
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a
                                                href="/calculator/updateCurrent/sign"
                                            >
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="+/-"
                                                />
                                            </a>
                                        </td>
                                        <td>
                                            <a
                                                href="/calculator/updateCurrent/point"
                                            >
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="."
                                                />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/calculator/save"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="M"
                                                />
                                            </a>
                                        </td>
                                        <td>
                                            <a
                                                href="/calculator/updateCurrent/percent"
                                            >
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="%"
                                                />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/calculator/append/1"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="1"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/append/2"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="2"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/append/3"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="3"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/operand/add"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="+"
                                            /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/calculator/append/4"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="4"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/append/5"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="5"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/append/6"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="6"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/operand/minus">
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="-"
                                                />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/calculator/append/7"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="7"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/append/8"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="8"
                                            /></a>
                                        </td>
                                        <td>
                                            <a href="/calculator/append/9"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="9"
                                            /></a>
                                        </td>
                                        <td>
                                            <a
                                                href="/calculator/operand/divide"
                                            >
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="/"
                                                />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/calculator/clear/"
                                                ><button class="button">
                                                    C
                                                </button></a
                                            >
                                        </td>
                                        <td>
                                            <a href="/calculator/append/0">
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="0"
                                                />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/calculator/equal/"
                                                ><input
                                                    type="button"
                                                    class="button"
                                                    value="="
                                            /></a>
                                        </td>
                                        <td>
                                            <a
                                                href="/calculator/operand/multiply"
                                            >
                                                <input
                                                    type="button"
                                                    class="button"
                                                    value="*"
                                                />
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-auto">
                        <p>
                            If you are using a modern browser
                            <a href="/">click here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
