$(document).ready(function(){
    $('.main-slider').slick({
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
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });
  });

const hasDropdown = document.querySelector('.has-dropdown'),
    search = document.querySelector('.header__appbar--right__search__button'),
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

