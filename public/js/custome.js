  
  $(document).ready(function(){
    $('.sidenav').sidenav();
     $('#slide-out').sidenav({ width:'200px',edge: 'right' });
     $('#user-profile-sidebar').sidenav({ width:'200px',edge: 'right' });
     $('#cart-sidebar').sidenav({ width:'200px',edge: 'right' });
     $('.cart-menu').click(function(){
       $('#cart-sidebar').sidenav('open');
     }); 
  });
   
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  

  $(document).ready(function(){
    $('select').formSelect();
  });
 
$('#home-slider').owlCarousel({
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    dots: true,
    nav:false,
    navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
 $('#popular-courses-sider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
   	responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        768:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
 

 

$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

 $('#relatedCourse').owlCarousel({
    loop:true,
    margin:10,    
    nav:false,
    dots:false,
    navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        768:{
            items:2
        },
        1000:{
            items:3
        }
    }
});



$(document).ready(function() {
    "use strict"; 
    // home contact info
    $(".trggericon").on("click", function(e){ 
      $(this).parent('.top-contact').addClass('togglecontact');
    });
    $(".top-contact .close").on("click", function(e){ 
      $(this).parent('.top-contact').removeClass('togglecontact');
    });
    $('.cart-close').click(function(){
      $(this).parents('.cart-side-list').remove();
    });
    // $('.empty-cart').click(function(){
    //    $(this).parent().parent().remove();
    // });
    $("#empty").click(function() {
    $("#cart-ul").empty();
});
});


$(document).ready(function(){
  $('ul.tabs').tabs();
});
$(document).ready(function(){
  $('ul.tabs').tabs('select_tab', 'tab_id');
});
 
  $(document).ready(function(){
    $('.modal').modal();
      $('#ragistration').modal('close');
  });
if($('.courses-sidebar').length){
var $sidebar   = $("#category-sidebar-fix"), 
    $window    = $(window),
    offset     = $sidebar.offset(),
    topPadding = 15;

$window.scroll(function() {
    if ($window.scrollTop() > offset.top) {
        $sidebar.stop().animate({
            marginTop: $window.scrollTop() - offset.top + topPadding,
            top: '250px'
        });
    } else {
        $sidebar.stop().animate({
            marginTop: 0,
            bottom: '250px'
        });
    }
});
}
/*
| Check Image exits or not
*/
function imageExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}
/*
| Check Image exits or not
*/
function videoExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}
