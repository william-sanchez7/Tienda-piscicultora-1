
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

      
      function date(){
          var datos = new FormData();
          datos.append("user", cuenta.value);
          datos.append("password", clave.value);
          datos.append("register", btn_login.value);
          fetch('includes/loginValidate.php', {
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
          date();
      })
})
