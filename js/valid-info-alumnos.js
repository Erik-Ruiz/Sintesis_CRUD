const validarDNI=(dni)=>{
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

    dni = dni.toUpperCase();

    if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            
            return false;
        }else{
            
            return true;
        }
    }else{
        
        return false;
    }
}

const validarTelefono =(tel)=>{
    if(tel.length == 9 && !isNaN(valor)){
        return true;
    }else{
        return false;
    }
}


const validarNota=(valor)=> {
    !isNaN(valor)  ? OK = true : OK = false;
    return OK;
}

const validarNombre = (val) => {
    const usernameRegex = /^[a-zA-Z]+$/;
    return !usernameRegex.test(val);
}


const ValidadorDeCorreo =(correo)=>{
    if (correo.lenght !== 0){
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
            msg=true;
        }else{
            msg=false;
        }
    }else{
        msg=false;
    }
    return msg;
}

const alertsForm=(msg)=>{
    
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: msg, 
    })
    
}



const FormEditNota =(event)=>{
    
    
    if(!validarNota(document.getElementById('nota').value)){
        event.preventDefault();
        alertsForm('Nota no valida')
    }
}


const FormAlumno =(event)=>{
    let nombre = document.getElementById('nombre').value
    let apellido = document.getElementById('apellido').value
    let apellido2 = document.getElementById('apellido2').value
    let correo = document.getElementById('correo').value
    let tel = document.getElementById('tel').value
    let dni = document.getElementById('dni').value
    
    if(validarNombre(nombre) || validarNombre(apellido) || validarNombre(apellido2)){
        event.preventDefault();
        alertsForm('Nombre o apellidos invalidos');
    }

    if(!validarDNI(dni)){
        event.preventDefault();
        alertsForm('DNI o NIE invalido')  
    }

    if(!ValidadorDeCorreo(correo)){
        event.preventDefault();
        alertsForm('Correo invalido');
    }

    if(!validarTelefono(tel)){
        event.preventDefault();
        alertsForm('Telefono invalido');
    }
}