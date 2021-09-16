$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
       loop:true,
       margin:0,
      
       autoplay:true,
       autoplayTimeout:3000,
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
});



$('.pcard').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})