$(document).ready(function(){
    /*$('.main-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        prevArrow: $('.headline-articles__navigation--prev'),
       nextArrow: $('.headline-articles__navigation--next'),
       responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerMode: true,
            autoplay: false,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });

    $('.lbl-wrapper')*/
  });

const hasDropdown = document.querySelector('.has-dropdown'),
    search = document.querySelector('.header__appbar--right__search__button'),
    topToggle = document.querySelector('.top-toggle'),
    drowerClose = document.querySelector('.drawer__header__close'),
    closeSearch = document.querySelector('.header__searchbar__container__close');
hasDropdown.addEventListener('click', () => {
    document.querySelector('.dropdown-container').classList.toggle('is-visible');
})
search.addEventListener('click', () => {
    document.querySelector('.header__searchbar').classList.add('is-active');
})
closeSearch.addEventListener('click', () => {
    document.querySelector('.header__searchbar').classList.remove('is-active');
})
topToggle.addEventListener('click', () => {
  document.querySelector('.drawer').classList.add('drawer-active');
  document.querySelector('body').classList.add('body-unscroll');
})
drowerClose.addEventListener('click', () => {
  document.querySelector('.drawer').classList.remove('drawer-active');
  document.querySelector('body').classList.remove('body-unscroll');
})
// document.querySelectorAll('.header__appbar--right_btn').forEach( (e) => {
//   e.addEventListener('click', () => {
//     document.querySelector('#rcl-overlay').classList.toggle('d-block');
// })
// })

