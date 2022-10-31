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