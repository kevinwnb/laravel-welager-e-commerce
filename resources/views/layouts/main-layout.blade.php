<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/font awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
    <link rel="icon" href="{{ URL::asset('/assets/images/favicon.png') }}" type="image/x-icon" />

    <script src="/assets/js/sidenav.js"></script>
    @yield('head-content')
</head>

<body id="body">
    @yield('body-content')
</body>

<footer id="footer" style="background-color: #1b1c22;">
    <!--<script src="https://kit.fontawesome.com/bf5dc9b95c.js" crossorigin="anonymous"></script>-->
    <div class="container">
        <div class="row justify-content-between" style="padding: 50px 0 50px 0;">
            <div class="col-md-3">
                <h4 class="text-white mb-4">Discover</h4>
                <ul class="list-unstyled">
                    <li><a class="footerLinks" href="index.php">Wegener Technologies</a></li>
                    <li><a class="footerLinks" href="projects.php">Partner with us</a></li>
                    <li><a class="footerLinks" href="allPosts.php">Our services</a></li>
                    <li><a class="footerLinks" href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4 class="text-white mb-4">About</h4>
                <p style="color: rgba(255, 255, 255, 0.3);">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Fugiat culpa itaque unde illo ipsa architecto ipsum veniam, fugit earum, accusantium, quas saepe
                    nulla pariatur sint soluta aliquam nemo facilis deserunt.</p>
            </div>
            <div class="col-md-3 text-center">
                <h5 class="text-white mb-4">Follow Us</h5>
                <a class="footerLinks" href="https://www.linkedin.com/in/kevin-wegener-antolinez-044b17192"
                    target="_blank"><i class="fab fa-linkedin fa-2x px-2"></i></a><a class="footerLinks"
                    href="https://www.facebook.com/kevin.wegener.3154" target="_blank"><i
                        class="fab fa-facebook fa-2x px-2"></i></a><a class="footerLinks"
                    href="https://github.com/kevinwnb" target="_blank"><i class="fab fa-github fa-2x px-2"></i></a>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.3); padding: 50px;">
            <p class="text-center" style="color: rgba(255,255,255,0.3);">Copyright &copy;2020 All rights reserved</p>
        </div>
    </div>
</footer>

</html>
