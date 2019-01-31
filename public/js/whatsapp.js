/*
 Theme Name: Resume
 Theme URI: http://demo.newtemplate.net/resume/index.html
 Author: NewTemplate
 Author URI: https://themeforest.net/user/newtemplete
 Version: 0.1
 Description:  Resume One Page HTML5 Theme comes out with tons of powerful features. Its modern, attractive and clean design.
 */

!function(a){"use strict";a(".close-popup").on("click",function(){a(".whatsapp-area").css("display","none")}),a("#form-area").submit(function(a){var o=document.getElementById("whats-in").value.replace(/ /g,"%20");window.open("https://wa.me/1515551234567?text="+o,"_blank"),a.preventDefault()}),a(window).on("scroll",function(){var o=1e3;a(window).scrollTop()>=500?(a(".chat-button-area").addClass("zoomIn"),a(".chat-button-area").removeClass("zoomOut"),setTimeout(function(){a(".chat-button-area").css("display","block")},o)):(a(".chat-button-area").removeClass("zoomIn"),a(".chat-button-area").addClass("zoomOut"),setTimeout(function(){a(".chat-button-area").css("display","none")},o)),a(window).scrollTop()>=1e3?(a(".whatsapp-popup").addClass("bounceInDown"),a(".whatsapp-popup").removeClass("fadeOut"),setTimeout(function(){a(".whatsapp-popup").css("display","block")},o),setTimeout(function(){a(".chat-area").addClass("bounceIn"),a(".chat-area").css("visibility","visible")},2e3)):(a(".whatsapp-popup").removeClass("bounceInDown"),a(".whatsapp-popup").addClass("fadeOut"),setTimeout(function(){a(".whatsapp-popup").css("display","none")},o))})}(jQuery);