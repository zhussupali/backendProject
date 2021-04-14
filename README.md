# Twettie - Simple social network

Write here anything you want!

## About

**Twettie** is a simple social network, made with laravel php framework, where every user can easily register and re-log any time. It has a wall to type posts, say hello, share your todays mood, find friends or just have a fun.

## How it works

Basic logic is also simple. There are 2 tables in database. ```users``` and ```posts```.  The components you can see in ER-diagram provided below. The tables are linked by ```user_id```, being ```one-to-many```, since each user can have many posts, and so one post would have only one user who posted it.
<br>

**ER-diagram**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/ER-diagram.png)

## Main features

* Registration and login *(with checking input fields)*
* Mail sending after registration
* Customizing profile image
* Posting texts
* Switching 3 languages *(kz, en, ru)*

## Screenshots with demo
**Demo**
[![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/edit.png)](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/demo.mp4)
<br>

**Main page**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/wall.png)
<br>

**Edit profile page**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/edit.png)
<br>

**Login page**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/login.png)
<br>

**Register page**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/register.png)
<br>

**Authorization mails**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/mails.png)

<br>

**Posts Table**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/post_table.png)

<br>

**Users Table**
<br>
![](https://github.com/zhussupali/backendProject/blob/main/resources/gitMaterials/users_table.png)