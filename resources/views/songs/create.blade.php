<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<!DOCTYPE html>
<html>
<head>
    <title>إنشاء حساب</title>
    <!--Made with love by Mutiullah Samim -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style media="screen">
        .container{
            max-width: 100%;
            overflow-x: hidden;
        }
        .input-group-prepen{
            background: #c4233d;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        h1{
            color: #c4233d;
            margin-top:150px;
            font-weight: bold;
            text-shadow: 0 0 10px white, 0 0 10px white;
        }
        label{
            color:white;
        }
        .navbar{
            background: black;
            height: 82px;
        }
        .navbar-light .navbar-nav .nav-link {
            color: white;
        }
        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link:active {
            color: #c4233d;
        }
        .navbar-light .navbar-nav .active>.nav-link,h5{
            color: white;

        }
        h1{
            margin-top: 65px;
        }
        tags tag.tagify--noAnim{
            display: none;
        }
        tags .input{
            color: white
        }
        tags .input{
            color: white

        }
    </style>
</head>
<body>
<!--****************************************** modal ************************************** -->
<!-- <div class="modal" id="myModal" tabindex="-1" role="dialog" >
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-body">
                   <img src="dist/images/check.jpg" alt="" class="image">
                   <p style="font-size:30px;color:#c4233d;">شكرا لك ,</p>
                   <p style="font-size:20px;">سيتم ارسال رسالة الى ايميلك خلال دقائق , </p>
                   <p style="font-size:20px;">رجاء قم بمراجعته</p>
               </div>
               <div class="modal-footer " align="center">
                   <button  type="button" class="btn button" data-dismiss="modal"> ok</button>
               </div>
           </div>
       </div> -->
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">
        <!-- <img src="images/7777.png" alt=""> -->
        <div class="media">
            <img alt="Maan Logo" src="images/logo.svg" style="width:200px;margin-rigth:20px;height:70px">
            <div class="media-body">
                <h5 class=" align-center" style="margin-right:-52px;margin-top:22px">مركز العمل التنموي معا</h5>
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav ">
            <li class="nav-item " >
                <a class="nav-link" href="#">الرئيسية <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">من نحن </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">المبادرات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">آخر الاخبار </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تجارب ملهمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تواصل معنا</a>
            </li>
            <li class=""><a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black" class="" href="index.php">انشاء حساب</a></li>
            <li class=""><a style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black" class="" href="index.php">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
<!--************************************** navbar end ****************************************-->
<div class="container">
    <div class="row justify-content-center">
        <h1>إنشاء حساب</h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <!--1  -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center ">
                    <h3>البيانات الشخصية</h3>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="input-group form-group">
                        <div class="input-group-prepend"		>
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="اسم المستخدم رباعياَ">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="كلمة المرور">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="الهاتف">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="الجوال">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="العمر ">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="الايميل">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="رابط حساب الفيس بوك">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">الجنس</span>
                        </div>

                        <label style="margin-right:20px" for="">ذكر</label>
                        <input type="radio" class="form-control" placeholder="">
                        <label for="">أنثى</label>
                        <input type="radio" class="form-control" placeholder="">


                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-table"></i></span>

                        </div>
                        <input id="datepicker" width="276" placeholder="تاريخ الميلاد"/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                        </div>
                        <input name="country" list="country" class="form-control" placeholder="المحافظة">
                        <datalist id="country">
                            <option value="الغرب">
                            </option><option value="الشرق">
                            </option><option value="الشمال">
                            </option><option value="الجنوب">
                            </option>
                        </datalist>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                        </div>
                        <input name="city" list="city" class="form-control" placeholder="المدينة">
                        <datalist id="city">
                            <option value="غزة">
                            </option><option value="خانيونس">
                            </option><option value="النصيرات ">
                            </option><option value="بيت لاهيا"
                            </option>
                        </datalist>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="العنوان">
                    </div>


                </form>
            </div>

        </div>
        <!-- 2 -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center ">
                    <h3>الاهتمامات</h3>

                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
                        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
                        <select data-placeholder="اختر اهتماماتك من القائمة" multiple class="chosen-select" name="test">
                            <option value=""></option>
                            <option>دعم خدمات التعليم</option>
                            <option>دعم خدمات الصحة</option>
                            <option>دعم خدمات الدعم النفسي والاجتماعي</option>
                            <option>دعم تمثيل الشباب داخل المخيمات</option>
                            <option>دعم خدمات البنية التحتية</option>
                        </select>

                </form>

                <script type="text/javascript">
                    $(".chosen-select").chosen({
                        no_results_text: "Oops, nothing found!"
                    })
                </script>

            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend"		>
                    <span class="input-group-text">أخرى</span>
                </div>
                <!-- <input type="text" class="form-control" placeholder="ان كان لديك اهتمامات أخرى غير أدخلها ..."> -->
                <input name='tags' style="margin-bottom:-50px;" placeholder='أدخل اهتماماتك ان لم تجدها في القاشمة السابقة صم اضغط Enter' value='jQuery,Script,Net'>
                <!--  j[vfm]-->

                <link rel="stylesheet" type="text/css" href="	css/jquerysctipttop.css">
                <link rel="stylesheet" type="text/css" href="	css/tagify.css">

                </head>

                <body>
                <div class="jquery-script-center">
                    <ul>
                    </ul>
                    <div class="jquery-script-ads"><script type="text/javascript"><!--
                            google_ad_client = "ca-pub-2783044520727903";
                            /* jQuery_demo */
                            google_ad_slot = "2780937993";
                            google_ad_width = 728;
                            google_ad_height = 90;
                            //-->
                        </script>
                        <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
                        </script></div>
                    <div class="jquery-script-clear"></div>
                </div>
            </div>
        </div>
        <div class="input-group form-group" style="margin-top:-150px">
            <div class="input-group-prepend"		>
                <label for="">هل استفدت من مراكز العائلة سابقا؟</label>
            </div>
            <label style="margin-right:10px"for="">نعم</label>
            <input type="radio" class="form-control" placeholder="">
            <label for="">لا</label>
            <input type="radio" class="form-control" placeholder="">
        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend"		>
                <span class="input-group-text"></span>
            </div>
            <textarea style="padding:5px"name="name" rows="6" cols="60" placeholder="اذا كانت اجابتك نعم , ماهي الزوايا التي استفدت منها؟"></textarea>

        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend"		>
                <span class="input-group-text"></span>
            </div>
            <textarea name="name" rows="6" cols="60" placeholder="اضف نبذة عن الأعمال المجتمعية التي شاركت بها"></textarea>

        </div>




        <div class="form-group" style="text-align:center">
            <input type="submit" value="إنشاء حساب" class="btn  login_btn" style="text-align:center">
        </div>
        </form>
    </div>
</div>
</div>
</div>
<!--**************************************************************الفوتر الاخير بداية *****************************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;margin-top:50px;height:40px;padding-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019  ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img src="images/7777.png" style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--*********************************************** footer end ***************************************  -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="js/jQuery.tagify.js"></script>
<script>
    $('[name=tags]').tagify();
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

</body>
</html>
