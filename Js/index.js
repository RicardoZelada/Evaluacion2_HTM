

window.mostrarErrores = (listaErrores)=>{
    let error = document.querySelector("#divErrores");
    let ol = document.createElement("ol");
    ol.classList.add("alert","alert-danger");
    listaErrores.forEach((items)=>{
        let li = document.createElement("li");
        li.classList.add("list-group-item");
        li.innerText = items;
        ol.appendChild(li);
    });
    error.appendChild(ol);
}

window.registroReserva = [];//Lista para guardar las reservas

const btnAux = document.querySelector("#btnEnviar");

btnAux.addEventListener('click', ()=>{
    let erroresDiv = document.querySelector("#divErrores");
    erroresDiv.innerHTML = "";

    let name = document.querySelector("#nombre-txt").value.trim();
    let fech_in = document.querySelector("#fecha-ingreso").value.trim();
    let fech_end = document.querySelector("#fecha-termino").value.trim();
    let date_in = document.querySelector("#hora-ingreso").value.trim();
    let date_end = document.querySelector("#hora-termino").value.trim();
    

    listaErrores = [];//Lista para los Errores
    if(name === ""){
        listaErrores.push("Ingrese un Nombre")
    }if(fech_in === ""){
        listaErrores.push("Ingrese Fecha de Ingreso")
    }if(fech_end === ""){
        listaErrores.push("Ingrese Fecha de Termino")
    }if(date_in === ""){
        listaErrores.push("Ingrese Hora de Ingreso")
    }if(date_end === ""){
        listaErrores.push("Ingrese Hora de Termino")
    }if(listaErrores.length === 0){
        let registroReserva = {}
            registroReserva.nombre = name;
            registroReserva.fechainicio = fech_in;
            registroReserva.fechatermino = fech_end;
            registroReserva.horainicio = date_in;
            registroContactos.horatermino = date_end;
                       

        window.registroReserva.push(registroReserva);
        
    }else{
        window.mostrarErrores(listaErrores);   
    }
});

//____________________Validacion Login______________________________________________



window.mostrarErrorLogin = (listaErrores)=>{
    let error = document.querySelector("#divError");
    let div = document.createElement("div");
    div.classList.add("alert","alert-danger");
    listaErrores.forEach((items)=>{
        let span = document.createElement("span");
        //span.classList.add("list-group-item");
        span.innerText = items;
        div.appendChild(span);
    });
    error.appendChild(div);
}

window.registroUsuario = [];//Lista para guardar los usuarios

const btnAuxr = document.querySelector("#btnEnviar-Login");

btnAuxr.addEventListener('click', ()=>{
    let errores = document.querySelector("#divError");
    errores.innerHTML = "";

    let name = document.querySelector("#nombre-txt").value.trim();
    let password = document.querySelector("#pass-txt").value.trim();    

    listaErrores = [];//Lista para los Errores
    if(name === ""){
        listaErrores.push("Ingrese un Nombre")
    }if(password === ""){
        listaErrores.push("Ingrese una contraseña")
    }if(listaErrores.length === 0){
        let registroUsuarios= {}
            registroUsuarios.nombre = name;
            registroUsuarios.password = password;
                       
        window.registroUsuario.push(registroUsuaios);
        
    }else{
        window.mostrarErrorLogin(listaErrores);   
    }
});