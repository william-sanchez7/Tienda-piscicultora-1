
window.addEventListener('load', () => {    
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
    
      const form = document.getElementById("formRegister"),//Trae el formulario
      cuenta = document.getElementById('cuenta-user'),
      clave = document.getElementById('cuenta-clave'),
      btn_login = document.getElementById('btn-login');

      //trae una promesa de la bd para saber si existe el usuario o no
      function date(){
          var datos = new FormData();//crea un formulario simulado de la funcion formdata
          //Se le agregan los datos con su identificador y el valor qué contiene el elemento
          datos.append("user", cuenta.value);
          datos.append("password", clave.value);
          datos.append("register", btn_login.value);
          //Ruta de la qué se espera la promesa o datos
          fetch('includes/loginValidate.php', {//Ese es el archivo donde se valida si el usuario existe en la bd
              method: 'POST',
              body: datos
          }).then(Response => Response.json())
          .then(datoss => {
            if(datoss.success==1){
                location.reload();
            }else{
                Toast.fire({
                    icon: 'error',
                    title: '<h1> contraseña incorrecta! </h1>'
                  })
            } console.log(datoss);
          });
      }

      form.addEventListener('submit', (e) => {
          e.preventDefault();
          date();//llama la función de arriba para saber si el usuario existe o no
      })
      
})
