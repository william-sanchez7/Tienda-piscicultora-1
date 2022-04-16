//popup profile user

var overlayUser = document.getElementById('overlay-user'),
	openPopupUser = document.getElementById('popupuser'),
	closePopupUser = document.getElementById('close-popup-user');

openPopupUser.addEventListener('click', function(){
	overlayUser.classList.add('active');
})

closePopupUser.addEventListener('click', function(e){
	e.preventDefault();
    overlayUser.classList.remove('active');
})