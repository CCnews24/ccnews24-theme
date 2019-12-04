$(document).ready(function(){
    $('.main-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        prevArrow: $('.headline-articles__navigation--prev'),
       nextArrow: $('.headline-articles__navigation--next'),
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

