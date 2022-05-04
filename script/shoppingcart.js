
const containerMainShoppingcart = document.getElementById('overlay-shoppincart'),
btnOpen = document.getElementById('shoppingcart-open'),
btnClose = document.getElementById('shoppingcart-close'),
popupShoppingcart = document.getElementById('popup-shoppingcart');

btnOpen.addEventListener('click', function(){
    containerMainShoppingcart.classList.add('active');
    popupShoppingcart.classList.add('active');
})

btnClose.addEventListener('click', function(e){
e.preventDefault();
containerMainShoppingcart.classList.remove('active');
popupShoppingcart.classList.remove('active');
})