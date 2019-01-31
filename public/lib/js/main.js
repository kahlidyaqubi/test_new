
$(document).ready(function(){
    var scrollTop =0;
    $(window).scroll(function(){
        scrollTop = $(window).scrollTop();
        if (scrollTop > 500){
            $('.navbar').addClass ('solid');



            // $('.backToTop').addClass ('visible');
        }else if (scrollTop == 0){
            $('.navbar').removeClass('solid');


            // $('.backToTop').removeClass('visible');
        }
    });



    var scrollTop =0;
    $(window).scroll(function(){
        scrollTop = $(window).scrollTop();
        if (scrollTop > 500){
            $(".one").show();
            $(".two").hide();


            // $('.backToTop').addClass ('visible');
        }else if (scrollTop == 0){
          $(".one").hide();
            $(".two").show();

            // $('.backToTop').removeClass('visible');
        }
        });

  });





//   $(document).ready(function() {
//         // Transition effect for navbar
//         $(window).scroll(function() {
//           // checks if window is scrolled more than 500px, adds/removes solid class
//           if($(this).scrollTop() > 500) {
//               $('nav').addClass('solid');
//           } else {
//               $('nav').removeClass('solid');
//           }
//         });
//
// $function openCity(evt, cityName) {
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }
//     document.getElementById(cityName).style.display = "block";
//     evt.currentTarget.className += " active";
// }
// });
// /*************************************************************************
//     $("#show").click(function(){
//         $("aaa").show();
//     });
