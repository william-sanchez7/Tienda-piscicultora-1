const formulario = document.getElementById('formulario');//Trae el id del formulario de registro
const entradas = document.querySelectorAll("#formulario input");//obtiene todos los inputs del formulario de registro
// expresiones irregulares para usarlos en los inputs del registro
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}
// objeto con los campos en falso para usarlos en una condición
const campos = {
	user: false,
	name: false, 
	password: false,
	email: false,
	tellphone: false
}
// función qué contiene un switch para enviar valores de las expresiones irregulares, el evento es según acorde a lo
// que estamos escribiendo por teclado en los inputs y su respectivo nombre del campo en los inputs
const validarFormulario = (e) => {
	switch(e.target.name){//obtiene el nombre del input con e.target.name
		case "name": 
			validarCampo(expresiones.nombre, e.target, 'name');//envía los datos correspondientes a otra función llamada validarCampo
		break;
		case "email": 
			validarCampo(expresiones.correo, e.target, 'email');
		break;
		case "tellphone": 
			validarCampo(expresiones.telefono, e.target, 'tellphone');
		break;
		case "user": 
			validarCampo(expresiones.usuario, e.target, 'user');
		break;
		case "password": 
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();//verifica si se cambió las contraseñas ya verificadas
		break;
		case "password2": 
			validarPassword2();//función qué verifica ambas contraseñas si son iguales
		break;
	}
}
//función qué verifica si ingresa la información correcta en los inputs para mostrar iconos u colores 
// según su estado de validación o fallo
const validarCampo = (expresion, input, campo) => { //parametros recibidos de las expresiones irregulares, el valor del input, y el nombre del input o campo
	if(expresion.test(input.value)){//verifica si las expresiones están acorde con el valor del input
		document.getElementById(`group-${campo}`).classList.remove('input-box-incorrect');
		document.getElementById(`group-${campo}`).classList.add('input-box-correct');
		document.querySelector(`#group-${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#group-${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#group-${campo} .form-input-error`).classList.remove('form-input-error-active');
		campos[campo] = true;//objeto booleano llamado campos qué verifica si el nombre del input ingresado contiene valores  
	}else{
		document.getElementById(`group-${campo}`).classList.add('input-box-incorrect');
		document.getElementById(`group-${campo}`).classList.remove('input-box-correct');
		document.querySelector(`#group-${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#group-${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#group-${campo} .form-input-error`).classList.add('form-input-error-active');
		campos[campo] = false;
	}
}
//Valida si las contraseñas están correctas, sincroniza iconos u colores
const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){//Si las contraseñas son distintas
		document.getElementById(`group-password2`).classList.add('input-box-incorrect');
		document.getElementById(`group-password2`).classList.remove('input-box-correct');
		document.querySelector(`#group-password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#group-password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#group-password2 .form-input-error`).classList.add('form-input-error-active');
		campos['password'] = false;//objeto booleano qué verifica si el nombre del input contiene algún valor
	}else{
		document.getElementById(`group-password2`).classList.remove('input-box-incorrect');
		document.getElementById(`group-password2`).classList.add('input-box-correct');
		document.querySelector(`#group-password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#group-password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#group-password2 .form-input-error`).classList.remove('form-input-error-active');
		campos['password'] = true;
	}
}
// función qué verifica si se tecleó el formulario
entradas.forEach((input) =>{
	input.addEventListener('keyup', validarFormulario);//al levantar la tecla del teclado
	input.addEventListener('blur', validarFormulario);//al darle click en otro lado
});

formulario.addEventListener('submit', (e) =>{
	const terminos = document.getElementById('terminos');
	//condición para verificar si los datos del objeto son verdaderos o falsos
	if(campos.user && campos.name && campos.email && campos.password && campos.tellphone && terminos.checked){
		
		// formulario.reset();//restablece los valores ingresados de los inputs -no activar
		document.getElementById('form-msj-exito').classList.add('form-msj-exito-active');
			//Función con tiempo limite del mensaje de exito
			setTimeout(() =>{
				document.getElementById('form-msj-exito').classList.remove('form-msj-exito-active');
			}, 5000);
		
		document.querySelectorAll('.form-group-correct').forEach((icono) => {
			icono.classList.remove('form-group-correct');
		});
	
	}else{
		document.getElementById('msj-error').classList.add('msj-error-active');
	}
});