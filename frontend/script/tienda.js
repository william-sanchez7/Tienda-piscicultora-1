window.onload = function () {
  const listaProducto = document.getElementById('popup-shoppingcart');
  const precioTotal = document.getElementById('pricepaytotal');
  let idButtonCar = document.querySelectorAll(`[id*=id-producto-]`);
  let form = document.querySelectorAll(`[id*=carrito-form-]`);
  const btnOpenCart = document.getElementById('shoppingcart-open');
  
  for(var i = 0; i < idButtonCar.length; i++) {//recorro el array con los id's del formulario
      form[i].addEventListener("submit", function (e) {
        e.preventDefault();
      });
      
      idButtonCar[i].addEventListener("click", function(){
        let producto_id = this.getAttribute("data-carrito-id");//atraigo el atributo del formulario
        let product = document.querySelector(`#product-${producto_id}`);//card del producto con sus datos
        read_dateProduct(product);
        insert_dateCart();
        
        btnOpenCart.click();//Activa el eventListener, archivo shoppingcart.js
      });
  }
  insert_dateCart();
    
    function read_dateProduct(product){
      let id_p = product.querySelector('[data-carrito-id]').getAttribute("data-carrito-id");
      const infoProduct = {
        id: id_p,
        imagen: product.querySelector('.item-image').src,
        nombre: product.querySelector('h3').textContent,
        precio: +product.querySelector(`[data-price-id="${id_p}"]`).value,
        cantidad: 1 
      }
      save_product(infoProduct);
    }
    
    function insert_dateCart(){
      let produc_localStorage = obtain_product() || [];
      fila = "";
      for(i=0; i<produc_localStorage.length; i++){
        fila += `
            <div>
              <div class="table-shoppingcart" id="${produc_localStorage[i].id}">
                  <div class="head-cart"> 
                    <div class="nombre-shoppingcart"> <h3> ${produc_localStorage[i].nombre}  </h3><h4 class="name-shopping"> x 1000g </h4></div>
                    <div class="quanty-cart"> <h4> cantidad</h4></div>
                    <div class="price-cart"> <h4> precio </h4></div>
                    <div class="icono-shoppingcart" data-id-delete="${produc_localStorage[i].id}"><i class='bx bx-x-circle'></i></div>
                  </div>
                  <div class="body-cart">  
                    <div class="img-shoppingcart"> <img src=" ${produc_localStorage[i].imagen} "> </img> </div>
                    <div class="cantidad-shoppingcart">
                      <button data-idlocalstorage="${produc_localStorage[i].id}" data-operation="resta"> - </button>
                      <input data-valueInput="${produc_localStorage[i].id}" class="input-carrito" type="number" value="${produc_localStorage[i].cantidad}" disabled>
                      <button data-idlocalstorage="${produc_localStorage[i].id}" data-operation="suma"> + </button>
                    </div>
                    <div class="precio-shoppingcart"><h1>$${produc_localStorage[i].precio}CO</h1></div>
                  </div>
              </div>
            </div>
          `;
      }
    
      listaProducto.innerHTML= fila;  
      let idCartS = document.querySelectorAll('[data-idlocalstorage]');
      
      
      idCartS.forEach((e) => { 
        
        e.addEventListener('click', function(){
          let obj = {
            id: this.getAttribute('data-idlocalstorage'),
            operation: this.getAttribute('data-operation')
          }       
          let infoLocalStorage = obtain_product();
          
          infoLocalStorage = infoLocalStorage.map(({id, imagen, nombre, cantidad, precio}) => {
            if(obj.operation == "suma"){
              return {id, nombre, imagen, precio, cantidad: (id == obj.id && cantidad>0)? cantidad+=1 : cantidad};
            }else{
              return {id, nombre, imagen, precio, cantidad: (id == obj.id && cantidad>1)? cantidad-=1 : cantidad};
            }
          }) 
          let inputValue = document.querySelector(`[data-valueInput='${obj.id}']`);
          if(inputValue.value >=1){
            inputValue.value = (obj.operation == "suma") ? +inputValue.value+1 : (inputValue.value>1) ? +inputValue.value-1 : inputValue.value;
          }else{
            inputValue.value = inputValue.value;
          }
          localStorage.setItem("product", JSON.stringify(infoLocalStorage));
          totalPrice();//Actualiza el precio total
        })
      });
      
      try {
          let btnDeletProduct = document.querySelectorAll('[data-id-delete]');
          for(var item of btnDeletProduct){
            item.addEventListener('click', function(){
              let obj = {
                id: this.getAttribute('data-id-delete')
              }
              delete_dateCart(obj);
              totalPrice();
            })
          } 
        } catch (error) {
          console.log("Como dijo mi papá, fuiste un error");
        }
        
    }

  function delete_dateCart(info_product){
    let infoLocalStorage = obtain_product(); 
    let arrayProduct = infoLocalStorage.filter(element => element.id != info_product.id);
    localStorage.setItem("product", JSON.stringify(arrayProduct));
    insert_dateCart();
  }
  
  function save_product(info_product){
    let arrayProduct = [];
    arrayProduct = obtain_product() || [];//Si hay datos en la función, le asigna el valor, si no, deja un array vacío
    
    let idNuevoObjeto = info_product.id;
    let idObjetoLocalStorage = arrayProduct.filter(elemento => elemento.id.includes(idNuevoObjeto));
    let objetosLocalStorage = arrayProduct.filter(elemento => elemento.id != idNuevoObjeto);
   /*Condicional para validar si existe otro producto igual y sumar la cantidad del producto*/
    if(idObjetoLocalStorage != 0){
      idObjetoLocalStorage[0].cantidad = idObjetoLocalStorage[0].cantidad + info_product.cantidad;
      arrayProduct = objetosLocalStorage;
      arrayProduct.push(idObjetoLocalStorage[0]);
    }else{
       arrayProduct.push(info_product);
    }
    localStorage.setItem("product", JSON.stringify(arrayProduct))
    
  }

  function obtain_product(){
    let info_product_localstorage = JSON.parse( localStorage.getItem("product") )
    return info_product_localstorage
  }

  function totalPrice(){
    let productoLocalStorage = obtain_product() || [];
      productoLocalStorage = productoLocalStorage.map(({precio, cantidad}) => {
        return precio*cantidad;
    });
    let totalProductos = +productoLocalStorage.reduce((a,b) => a+b,0);//sumar el elemento anterior, por el actual
    precioTotal.innerHTML = 
    `
    <h4> ${totalProductos.toLocaleString('es-CO', {style: 'currency',currency: 'COP', minimumFractionDigits: 0})} </h4>
    <h4> $0 </h4>
    <h4> ${totalProductos.toLocaleString('es-CO', {style: 'currency',currency: 'COP', minimumFractionDigits: 0})} </h4>
    `;
  }
  totalPrice();
};