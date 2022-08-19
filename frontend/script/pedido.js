const tableOrderPay= document.getElementById('tbody-table-pay');
let productsLocalStorage = JSON.parse(localStorage.getItem("product")) || [0];
let priceTotal = document.getElementById('total-subtotal-pay');
const btnOrder = document.getElementById('btn-order');

//Prepara una alerta con sweetalert. es una librería de alertas js
const Toast = Swal.mixin({
    toast: true,
    position: '',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
//Si oprime en el botón de continuar pedido, me verifica si está iniciado la sesión de usuario
btnOrder && btnOrder.addEventListener('submit', (e)=>{
    e.preventDefault();
    //espera la respuesta del archivo dateUser, para traer el id usuario
    fetch('includes/dateUser.php', {
        method: 'POST'
    }).then(r => r.json())
    .then(data => {
        if(data.success!=0){
           btnOrder.submit();
        }else{
            Toast.fire({
                icon: 'error',
                title: '<h1> Inicia sesión para avanzar! </h1>'
            })
        }
    })
})
//Imprime los datos del carrito de compras a los detalles del pedido
function insert_product_orders(){
    //Destructura los datos del localStorage
    productsLocalStorage.forEach(({id, nombre, precio, cantidad}) => {
        tableOrderPay.innerHTML+= `
        <tr> 
            <td> <p>${nombre}</p> </td>
            <td> <p>${cantidad}</p> </td>
            <td> <p>${precio*cantidad}</p> </td>
        </tr>
        `;
        btnOrder.innerHTML+=`
            <input type="number" name="idProductOrder${id}" id="idProductOrder" value="${id}" hidden>
            <input type="number" name="priceUnitaryOrder${id}" id="priceUnitary" value="${precio}" hidden>
            <input type="number" name="quantyOrder${id}" id="quantyOrder" value="${cantidad}" hidden>
            <input type="text" name="dataProduct${id}" value='{"idProductOrder":${id},"priceUnitaryOrder":${precio},"quantyOrder":${cantidad}}' hidden> 
        `;
    });
}
btnOrder && insert_product_orders();
//Actualiza el precio total en los detalles del pedido
function total_price_orders(){
    productsLocalStorage = productsLocalStorage.map(({precio, cantidad}) => {
        return precio*cantidad;
    });
    //Suma el subtotal del producto anterior por el actual 
    let totalProducts = (productsLocalStorage) ? +productsLocalStorage.reduce((previousValue,currentValue) => previousValue+currentValue) : 0;
    priceTotal.innerHTML = `
        <h5>${totalProducts.toLocaleString('es-CO', {style: 'currency',currency: 'COP', minimumFractionDigits: 0})}</h5> 
        <h5>$0</h5>
        <h5>${totalProducts.toLocaleString('es-CO', {style: 'currency',currency: 'COP', minimumFractionDigits: 0})}</h5>
    `; 
    const subtotal = document.getElementById('subtotalOrder');
    subtotal.value = totalProducts;
    return totalProducts;
}  

btnOrder && total_price_orders();

   

