<!Doctype html>
<html>

<head>
    <title>وكالة الرأي الصادق</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="stylesheet" href="/sadeq/sadeq2/css/bootstrap.min.css" type="text/css">
    <link href="/sadeq/sadeq2/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/sadeq/sadeq2/css/style.css" type="text/css">
</head>

<body>

<!-- navbar starts -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navBlue">
    <a class="navbar-brand" href="#">وكالة الرأي الصادق</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الأخبار السياسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الأخبار الرياضية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الأخبار العامة</a>
            </li>
        </ul>
    </div>
    <form class="form-inline justify-content-end">
        <input class="form-control " type="search" placeholder="بحث" aria-label="Search">
        <button class="btn btn-outline-dark mr-2" type="submit">بحث</button>
    </form>
</nav>

@yield('content')

<!-- Scripts -->
<script src="/sadeq/sadeq2/js/jquery3.3.1.js"></script>
<script src="/sadeq/sadeq2/js/popper.min.js"></script>
<script src="/sadeq/sadeq2/js/bootstrap.min.js"></script>
<script src="/sadeq/sadeq2/js/main.js"></script>

</body>

</html>