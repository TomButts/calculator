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
      <div>
        <div class="container">
          <div class="row justify-content-center mt-5">
            <div class="col-auto">
              <div class="calculator-box">
                  <form action="">
                    
                    @if ($calculator)
                      <input type="hidden" name="calculator" value="{{ $calculator }}" />
                    @endif

                    <table class="calculator">
                      <tbody>
                        <tr>
                          <td colspan="4">
                            <input type="text" class="display" value="{{ $current }}"disabled>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="button" class="button" value="+/-"></td>
                          <td><input type="button" class="button" value="."></td>
                          <td><input type="button" class="button" value="M"></td>
                          <td><input type="button" class="button" value="%"></td>
                        </tr>
                        <tr>
                          <td><input type="button" class="button" value="1"></td>
                          <td><input type="button" class="button" value="2"></td>
                          <td><input type="button" class="button" value="3"></td>
                          <td><input type="button" class="button" value="+"></td>
                        </tr>
                        <tr>
                          <td><input type="button" class="button" value="4"></td>
                          <td><input type="button" class="button" value="5"></td>
                          <td><input type="button" class="button" value="6"></td>
                          <td><input type="button" class="button" value="-"></td>
                        </tr>
                        <tr>
                          <td><input type="button" class="button" value="7"></td>
                          <td><input type="button" class="button" value="8"></td>
                          <td><input type="button" class="button" value="9"></td>
                          <td><input type="button" class="button" value="/"></td>
                        </tr>
                        <tr>
                          <td><button class="button">C</button></td>
                          <td><input type="button" class="button" value="0"></td>
                          <td><input type="button" class="button" value="="></td>
                          <td><input type="button" class="button" value="*"></td>
                        </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
         </div>
        </div>
      </div>
    </body>
</html>
