<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wall</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href = "css/style.css">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #2B3856 ;
            }
            .header {
                align-items: center;
                display: flex;
                justify-content: space-around;
                background-color: #4863A0;
                color: white; 
            } 
            .header .headerlogo {
                margin-top: 20px;
                margin-bottom: 20px;
                text-align: center;
                cursor: pointer;
            }
            a:link {
                text-decoration: none;
            }
            a:visited {
                text-decoration: none;
                color:white;
            }
            .post {
                width: 70%;
                margin: 50px auto;
                color: white;
                text-align: center;
                display: flex;
                align-items: center;
            }

            .post .userInfo {
                align-items: center;
            }
            .post .userInfo img {
                border-radius: 50%;
                width: 70px;
                height: 70px;
                object-fit: cover;

            }
            .post .userInfo .fullname {
                width:150px;
                margin-left:10px;
                margin-right:10px;
            }
            .post .date {
                opacity: 0.5;
                font-size: 8px;
            }
            .post textarea {
                border: 0.5px solid #ccc;
                border-radius: 4px;
                width:100%;
                background-color: transparent;
                resize: vertical;
                font-size: 18px;
                color: #EBF4FA;
            }

            
            /* Style the footer */
            .footer {
                margin:auto;
                width: 50%;
                background: #2B3856;
                color: #f1f1f1;
                position: sticky;
                bottom: 0;
                opacity: 0.95;
                
            }

            .footer form {
                display: flex;
            }


            .footer textarea {
                width:100%;
                background-color: transparent;
                resize: none;
                font-size: 18px;
                color: #EBF4FA;
            }
            .footer button {
                padding-left:32px;
                padding-right:32px;
                background-color: whitesmoke;
                border: none;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                color:#2B3856;
            }

            .footer button:hover {
                cursor:pointer;
                background-color: #4863A0;
                color:white;
            }

            /* Dropdown Button */
            .dropbtn {
            background-color: #4863A0;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
            position: relative;
            display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
            display: none;
            margin-left: 3px ;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            
            }

            /* Links inside the dropdown */
            .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {background-color: #ddd;}

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {display: block;}

            /* Change the background color of the dropdown button when the dropdown content is shown */
            .dropdown:hover .dropbtn {background-color: #2B3856;}

        </style>
    </head>
    <body>


        <div class = "header">
            <div class = "headerlogo" onclick="window.location.reload()">
                <img src="https://webstockreview.net/images/twitter-icon-white-png-3.png" alt="" width = '50'>
                <div class = "headerlogotext">twettie</div>
            </div>
            <div class="dropdown">
            <button class="dropbtn">{{session('name')}}</button>
            <div class="dropdown-content">
                <a href="{{ route('profile') }}"><img src="https://st3.depositphotos.com/6672868/13701/v/380/depositphotos_137014128-stock-illustration-user-profile-icon.jpg" width='30' alt="">{{__('wall.editProfile')}}</a>
                <a href="{{ route('login') }}"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/OOjs_UI_icon_logOut-ltr.svg/1024px-OOjs_UI_icon_logOut-ltr.svg.png" width='30' alt="">{{__('wall.logOut')}}</a>
            </div>
            </div>        
            
        </div>

        @foreach (array_reverse($post) as $key=>$i) 
            <div class = "post">
                <div>
                    <div class = "userInfo">
                        <img src="{{asset(''.$i->image_url)}}" alt="">
                        <div class="fullname">{{$i->name}}</div>
                    </div>
                    <div class="date">{{ date('h:i A, jS \of F Y ', strtotime($i->created_at)) }}</div>
                </div>
                <textarea readonly name="" id="" cols="30" rows="5">{{$i->text}}</textarea>
            </div>
        @endforeach


        <div class="footer" id="myfooter">
            <form action="tweet" method="POST">
                @csrf

<div ><a href="{{ route('wall/kz')}}">🇰🇿</a><br><a href="{{ route('wall/en')}}">🇺🇸</a><br><a href="{{ route('wall/ru')}}">🇷🇺</a></div>
                <textarea name="tweetarea" id="tweetarea" cols="50" rows="3" placeholder="{{__('wall.textareaPlaceholder')}}"></textarea>
                <button type="submit">{{__('wall.post')}}</button>

            </form>
        </div>
    </body>
</html>