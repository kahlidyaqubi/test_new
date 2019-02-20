<!Doctype html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>إنشاء حساب جديد</title>
</head>

<body>

@yield('content')

<!-- Footer Nav starts -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navBlue justify-content-center">
    <div class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <p>جميع الحقوق محفوظة</p>
            </li>
            <li class="nav-item text-center">
                <a href="#" class="icon twitter mr-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="icon linkedIn mr-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="icon facebook mr-3"><i class="fab fa-facebook-f"></i></a>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center heightt">
    <div class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <p class="white">تواصل معنا: 056330830</p>
            </li>
        </ul>
    </div>
</nav>
<!-- Footer Nav Ends -->

<script src="js/jquery3.3.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="2/thumbnail-slider.js" type="text/javascript"></script>
<script src="js/main.js"></script>

<script>
    ! function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://weatherwidget.io/js/widget.min.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }
    (document, 'script', 'weatherwidget-io-js');

</script>
</body>

</html>
