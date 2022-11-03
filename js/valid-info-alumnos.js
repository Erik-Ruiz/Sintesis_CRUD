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



const validarNota=(valor)=> {
    Number.isInteger(numero) ||  Number.isFloat(valor) ? OK = true : OK = false;
    return OK
}

const validarNombre = (val) => {
    const usernameRegex = /^[a-z0-9_.]+$/
    return usernameRegex.test(val)
  }


  const ValidadorDeCorreo =()=>{
    
    let msg;
    userI = document.getElementById('iconU');
    user = document.getElementById('correo');
    correo = document.getElementById('correo').value;
    
    if (correo.lenght !== 0){

        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
            msg={status:true,msg:'valido'};
        }else{
            msg={status:false,msg:'¡Correo no valido!'};
            user.style.borderColor = 'red';
            userI.style.color = 'red'; 
        }
    }else{
        msg={status:false,msg:'Correo vacio'};
        user.style.borderColor = 'red';
        userI.style.color = 'red';
    }

    return msg;
}