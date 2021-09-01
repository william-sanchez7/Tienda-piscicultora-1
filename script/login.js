const form = document.querySelector(".form-login"),//Trae el formulario
eField = form.querySelector(".email"),//Guarda en una const la mezcla de .fiel + .email
eInput = eField.querySelector("input"),//Guarda en una const la clase input-area + input
pField = form.querySelector(".password"),//guarda en una const la clase field + password
pInput = pField.querySelector("input");//guarda en una const la clase input-area+ input

form.onsubmit = (e)=>{
    e.preventDefault();
    if(eInput.value == ""){
        eField.classList.add("shake", "error");
    }
    if(pInput.value == ""){
        pField.classList.add("shake", "error");
    }

    setTimeout(()=>{
        eField.classList.remove("shake");
        pField.classList.remove("shake");
    },500);

    eInput.onkeyup = ()=>{
        if(eInput.value == ""){
            eField.classList.add("error");
        }else{
            eField.classList.remove("error");
        }
    }
    pInput.onkeyup = ()=>{
        if(pInput.value == ""){
            pField.classList.add("error");
        }else{
            pField.classList.remove("error");
        }
    }
}