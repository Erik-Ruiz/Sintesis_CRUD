const filtro =()=>{
    //var matricula = document.getElementById('matricula');
    var nombre = document.getElementById('nombre');
    // var ape = document.getElementById('apellido');
    // var ape2 = document.getElementById('appelido2');
    // var correo = document.getElementById('correo');
    // var dni = document.getElementById('dni');
    //alert(matricula.value);
    redirect(nombre.value)

}

const redirect = (nombre)=>{
    location.href='../pages/admin.php?nombre='+nombre;
}