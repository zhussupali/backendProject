<Doctype! html>
<html>
<head>
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

            .userInfo {
                padding-top:20px;
                width:50%;
                margin:auto;
                /* background-color: red; */
                display:flex;
                text-align: center;
            }

            .userInfo .img {
                margin: auto;
            }

            .userInfo img {
                border-radius: 50%;
                object-fit: cover;
            }

            input {
                margin: auto;
                color:white;
                background:url('/local/person.jpg');
            }

            .userInfo .textInfo {
                padding-right:150px;
                margin: auto;
                text-align:left;
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
            <div class = "headerlogo">
                <a href="{{ route('wall') }}">
                    <img src="https://webstockreview.net/images/twitter-icon-white-png-3.png" alt="" width = '50'>
                    <div class = "headerlogotext">twettie</div>
                </a>
            </div>
            <div class="dropdown">
            <button class="dropbtn">{{session('name')}}</button>
            <div class="dropdown-content">
                <a href="{{ route('profile') }}"><img src="https://st3.depositphotos.com/6672868/13701/v/380/depositphotos_137014128-stock-illustration-user-profile-icon.jpg" width='30' alt="">{{__('profile.editProfile')}}</a>
                <a href="{{ route('login') }}"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/OOjs_UI_icon_logOut-ltr.svg/1024px-OOjs_UI_icon_logOut-ltr.svg.png" width='30' alt="">{{__('profile.logOut')}}</a>
            </div>
            </div>        
            </div>


            <div class="userInfo">
                <div class="img">
                    <form action="setProfImage" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img src="{{asset(''.$userInfo[0]->image_url)}}" alt=""  width="200" height="200">
                        <input type="file" id="file" name="file" accept="image/png, image/jpeg"><br><br>
                        <button type="submit">{{__('profile.saveChanges')}}</button><br><br>
                    </form>
                </div>
                <div class="textInfo"><h1>{{ $userInfo[0]->name }}</h1><h6>{{__('profile.createdAt')}}{{ $userInfo[0]->created_at }}</h6></div>
                
            </div>            


<style>
.languages {
    position: sticky;
    bottom: 0;
    padding-top: 225px;
}
</style>
<div class="languages"><a href="{{ route('profile/kz')}}">🇰🇿 </a><a href="{{ route('profile/en')}}">🇺🇸 </a><a href="{{ route('profile/ru')}}">🇷🇺</a></div>

</body>
</html>