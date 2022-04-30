<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: rgb(255, 255, 255);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }
            .logo{
                font-size: 80px;
            }

            .title {
                font-size: 60px;
            }

            .subtitle {
                font-size: 25px;
            }

            .links{
                margin-top: 5px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 1px;
            }

            .copyright{
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="logo m-b-md">
                    <img src="{{config('cms.logo')}}" width="350px" >
                </div>

                <div class="subtitle" style="margin-bottom: 3px;">
                    <strong>Social Media Management Application</strong> <br> Version 0.1.1
                </div> 
                

                <div class="links">
                    <a href="https://docs.google.com/document/d/1CHC_tIl8CnDNyKUIYywnkhNy61TREVmnVev84SJUQY4/edit?usp=sharing">Docs</a>
                    <a href="https://docs.google.com/spreadsheets/d/1BlbzNJG6tRVjXFftcosIXMmEbfHYgx-UFG14EAzifFg/edit?usp=sharing" target="_blank">Timeline</a>
                    <a href="#">News</a>
                    <a href="#">Blog</a>
                    <a href="#">GitHub</a>
                    <a href="./privacypolicy">Privacy Policy</a>
                    <a href="./tandc">Terms and Conditions</a>
                    <a href="#">About us</a>
                </div>

                <div class="copyright">
                    <small>
                        <i>{{config('cms.copyright')}}</i> &copy; 2021 
                    </small>    
                </div>

            </div>
        </div>
    </body>
</html>
