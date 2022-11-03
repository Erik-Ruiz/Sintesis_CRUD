const filtro =()=>{
    var matricula = document.getElementById('matricula');
    var nombre = document.getElementById('nombre');
    var ape = document.getElementById('apellido');
    var ape2 = document.getElementById('apellido2');
    var correo = document.getElementById('correo');
    var dni = document.getElementById('dni');
    //alert(matricula.value);
    redirect(nombre.value,ape.value,ape2.value,correo.value,dni.value,matricula.value)

}

const redirect = (nombre,ape,ape2,correo,dni,matricula)=>{
    location.href='../pages/admin.php?nombre='+nombre+'&apellido='+ape+'&apellido2='+ape2+'&correo='+correo+'&dni='+dni+'&matricula='+matricula;
}