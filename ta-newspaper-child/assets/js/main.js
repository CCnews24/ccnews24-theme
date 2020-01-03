
const hasDropdown = document.querySelector('.has-dropdown'),
    hasDropdownIcon = document.querySelector('.has-dropdown i'),
    search = document.querySelector('.header__appbar--right__search__button'),
    topToggle = document.querySelector('.top-toggle'),
    drowerClose = document.querySelector('.drawer__header__close'),
    dropdown = document.querySelector('.dropdown-container'),
    hiden = document.querySelectorAll('.hiden'),
    blogPost = document.querySelectorAll('.blog-post'),
    article = document.querySelectorAll('.category-article'),
    category = document.querySelectorAll('.category-article'),
    elems = dropdown.getElementsByTagName('*'),
    overlay = document.querySelector('.modal-overlay'),
    closeSearch = document.querySelector('.header__searchbar__container__close');

 document.querySelector('body').addEventListener('click', (e) => {
   let target = e.target;
   let visible = document.querySelector('.is-visible');
   if(target == hasDropdown || target == hasDropdownIcon) {
     dropdown.classList.toggle('is-visible');
     overlay.classList.toggle('d-block');
   }
   if(target == overlay) {
    dropdown.classList.remove('is-visible');
    overlay.classList.remove('d-block');
  }
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


blogPost.forEach((e) => {
  e.addEventListener('click', (ev) => {
    let target = ev.target;
    let drop =  e.querySelector('.share-dropdown-soc');
    if(target == e.querySelector('.fa')){
      drop.classList.toggle('is-visible');
      e.querySelector('.modal-overlay').classList.toggle('d-block');
    } 
    if(target == e.querySelector('.modal-overlay')){
      drop.classList.remove('is-visible');
      e.querySelector('.modal-overlay').classList.remove('d-block');
    } 
  })
})

category.forEach((e) => {
  e.addEventListener('click', (ev) => {
    let target = ev.target;
    let drop =  e.querySelector('.share-dropdown-soc');
    if(target == e.querySelector('.fa')){
      drop.classList.toggle('is-visible');
      e.querySelector('.modal-overlay').classList.toggle('d-block');
    } 
    if(target == e.querySelector('.modal-overlay')){
      drop.classList.remove('is-visible');
      e.querySelector('.modal-overlay').classList.remove('d-block');
    } 
  })
})
