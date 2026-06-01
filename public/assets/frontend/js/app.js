scrollCue.init();
document.addEventListener( 'DOMContentLoaded', function() {

    var caseStudySwiper = new Swiper(".case-study", {
        slidesPerView: 1,
        effect: 'fade',
        watchSlidesProgress: true,
    });

    var caseStudyBoxSwiper = new Swiper(".case-study-box", {
        slidesPerView: 1,
        navigation: {
            nextEl: ".home-case-study .swiper-button-next",
            prevEl: ".home-case-study .swiper-button-prev",
        },
        pagination: {
            el: ".home-case-study .swiper-controls .swiper-pagination",
        },
        thumbs: {
            swiper: caseStudySwiper,
        },
    });

    var successSwiper = new Swiper(".home-succes-swiper", {
        slidesPerView: 1,
        spaceBetween: '30px',
        navigation: {
            nextEl: ".cstm-swiper-nav.swiper-button-next",
            prevEl: ".cstm-swiper-nav.swiper-button-prev",
        },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
    
    
    var successSwiper = new Swiper(".value-succes-swiper", {
        slidesPerView: 1,
        spaceBetween: '0px',
        navigation: {
            nextEl: ".home-customer-success .swiper-button-next",
            prevEl: ".home-customer-success .swiper-button-prev",
        },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
    var caseSwiper = new Swiper(".case-study-swiper", {
        slidesPerView: 1,
        spaceBetween: '30px',
        navigation: {
            nextEl: ".cstm-swiper-nav.swiper-button-next",
            prevEl: ".cstm-swiper-nav.swiper-button-prev",
        },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 2,
        },
      },
    });


    var indRecSwiper = new Swiper(".industries-rec-swiper", {
        slidesPerView: 1,
        spaceBetween: '80px',
        navigation: {
            nextEl: ".industries-rec-section .swiper-button-next",
            prevEl: ".industries-rec-section .swiper-button-prev",
        },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 4,
        },
      },
    });
    
    
    
document.getElementById('resume').onchange = function () {
    // const names = this.value ;
    const files = event.target.files;
    const fileName = files[0].name;
    document.querySelector('.results').innerHTML = fileName;
};



    // $(document).ready(function() {
    //     $(window).scroll(function() {
    //         if ($(document).scrollTop() > 100) {
    //         $("header").addClass("scrolled");
    //         } else {
    //         $("header").removeClass("scrolled");
    //         }
    //     });
    // });

    
    // Uncomment for accordion hover function
    // document.querySelectorAll('.home-services .accordion .accordion-item').forEach(function(item){
    //     item.addEventListener('mouseover', function() {
    //         this.querySelector('.collapse').classList.add('show');
    //         this.querySelector('.accordion-button').classList.remove('collapsed');
    //     });
    //     item.addEventListener('mouseout', function() {
    //         this.querySelector('.collapse').classList.remove('show');
    //         this.querySelector('.accordion-button').classList.add('collapsed');
    //     });
    // });
    

    // var a = 0;
    // $(window).scroll(function() {
    //     var scrolltop = $(window).scrollTop();
    //     if($("*").hasClass("count-trigger")){
    //     var oTop = $('.count-trigger').offset().top - window.innerHeight;
    //         if (a == 0 && scrolltop > oTop) {
    //                 $('.count').each(function () {
    //                     $(this).prop('Counter',0).animate({
    //                         Counter: $(this).text()
    //                     }, {
    //                         duration: 5000,
    //                         easing: 'swing',
    //                         step: function (now) {
    //                             $(this).text(Math.ceil(now));
    //                         }
    //                     });
    //                 });
    //         a = 1;
    //         }
    //     }
    // });

});

// var $industryGrid = $('.industry-filter-row').isotope({
//     // filter: ''
// });
  
// $('.industry-filter-button-group').on( 'click', 'button', function() {
//     var filterValue = $(this).attr('data-filter');
//     $('.industry-filter-button-group').find('.is-checked').removeClass('is-checked');
//     $(this).addClass('is-checked');
//     $industryGrid.isotope({ filter: filterValue });
// });
