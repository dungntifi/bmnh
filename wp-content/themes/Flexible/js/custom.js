jQuery('ul.slimmenu').slimmenu({resizeWidth: '1044',collapserTitle: 'Menu',easingEffect:null,animSpeed:'medium',indentChildren: false,childrenIndenter: 'Menu;',});
// scroll to top
/*$("#toTop").css("display", "none");
 $(window).scroll(function(){
   if($(window).scrollTop() > 0){
     $("#toTop").fadeIn("slow");
   }
   else {
      $("#toTop").fadeOut("slow");
   }
 });*/
 $(".desktop").click(function(){
   $("html, body").animate({
    scrollTop:0
   },"slow");
  });
  $(".mobile").click(function(){
   $("html, body").animate({
    scrollTop:0
   },"slow");
  });
$(".collapse-button").on('click', function(){
  if($("#topNav").hasClass('mobileActive')){
    $("#topNav").removeClass('mobileActive');
  } else {
    $("#topNav").addClass('mobileActive');
  }
})
  /*$(".collapse-button").toggle(function(){
    $("#topNav").addClass('mobileActive');
  },
  function(){
    $(".menu-collapser").removeClass('mobileActive');
  })*/