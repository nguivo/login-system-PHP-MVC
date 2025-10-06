<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <section class="header">
        <div class="top-bar">
            <ul>
                <li><a href=""><i class="bi bi-check-circle"></i> verified customer reviews</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">Support Center</a></li>
            </ul>
            <div class="contact-info">
                <a href="tel:+237676119207"><i class="bi bi-phone"></i> +(237) 6761-19-207</a>
            </div>
        </div>

        <div class="middle-bar">
            <div class="logo">
                <a href="/"><img src="/assets/images/logo.png" class="img-fluid" style="max-width: 40%" alt=""></a>
            </div>
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="What are you looking for?" />
                </div>
            </form>
            <ul class="nav-links">
                <li><a href="/login" class="">Login</a></li>
                <li><a href="/register" class="">Register</a></li>
            </ul>
        </div>

        <div class="lower-bar">
            <nav>
                <div class="text-logo">LoginSystem</div>
                <ul class="nav-links" id="menuList">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
                <div class="btns">
                    <a href="/login" class="myBtn">Login</a>
                </div>
                <div class="menu-icon">
                    <i class="bi bi-list" onclick="toggleMenu();"></i>
                </div>
            </nav>
        </div>
    </section>


    {{content}}

    <br><br><br><br><br><br><br><br>


    <section class="footer">
        <div class="footer-top">
            <div class="container">
                <p>There will be columns in here with links</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p> &copy;<?php echo date('Y'); ?> <a href="https://nguivo.com" target="_blank">NGUIVO</a>. All Rights Reserved</p>
        </div>
    </section>

    <script>
        let menuList = document.querySelector('#menuList');
        menuList.style.maxHeight = "0px";

        function toggleMenu(){
            if(menuList.style.maxHeight === "0px"){
                menuList.style.maxHeight = "340px";
            }
            else{
                menuList.style.maxHeight = "0px";
            }
        }
    </script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>