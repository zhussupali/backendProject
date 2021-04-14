<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #303030;
            }
            .header {
                align-items: center;
                display: flex;
                justify-content: space-around;
                background-color: #3A3A3A;
                color: white; 
            } 
            .header .headerlogo {
                margin-top: 20px;
                margin-bottom: 20px;
                text-align: center;
                cursor: pointer;
            }
            .login {
                text-align: center;
            }
            .login :hover {
                cursor: pointer;
            }
            a:link {
                text-decoration: none;
            }
            a:visited {
                text-decoration: none;
                color:white;
            }

            form {
                width: 40%;
                margin: 50px auto;
                color: white;
                text-align: center;
                display: block;
                /* justify-content: center; */
                align-items: center;
            }

            form p {
                color:white;
                font-size:32px;
                font-weight: bolder;
            }

            form input[type=email],[type=password],[type=text]{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                font-size: 18px;
            }

            form button {
                background-color: #e7e7e7; color: black;
                padding-left:30px;
                padding-right:30px;
                padding-top:10px;
                padding-bottom:10px;
            }
        </style>
    </head>
    <body>
        
        <div class = "header">
            <div class = "headerlogo" onclick="window.location.reload()">
                <img src="https://webstockreview.net/images/twitter-icon-white-png-3.png" alt="" width = '50'>
                <div class = "headerlogotext">twettie</div>
            </div>        
            <div class="login">
                <a href="{{ route('login') }}">
                    <img src="https://www.materialui.co/materialIcons/action/input_white_192x192.png" width='30' alt="">
                    <div>{{__('register.login')}}</div>
                </a>
            </div>
        </div>

        <form action="register" method="POST">
            @csrf
            <p>{{__('register.register')}}</p>
            <input type="text" id="name" name="name" placeholder="{{__('register.name')}}"><br><br>
            <input type="email" id="email" name="email" placeholder="{{__('register.email')}}"><br><br>
            <input type="password" id="password" name="password" placeholder="{{__('register.newPassword')}}"><br><br>
            <input type="password" id="confirm" name="confirm" placeholder="{{__('register.confirmPassword')}}"><br><br>
            <button type="submit">{{__('register.submit')}}</button>
        </form>


<style>
.languages {
    position: sticky;
    bottom: 0;
}
</style>
<div class="languages"><a href="{{ route('register/kz')}}">🇰🇿 </a><a href="{{ route('register/en')}}">🇺🇸 </a><a href="{{ route('register/ru')}}">🇷🇺</a></div>

    </body>
</html>
