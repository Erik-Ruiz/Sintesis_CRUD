// localStorage.setItem('correos', "");
try{
    for (let i = 0; i < localStorage.getItem('correos').split(',').length; i++) {
        try {
            let check = document.getElementById('check_'+localStorage.getItem('correos').split(',')[i])
            check.checked = true;
        } catch (error) {
             
        }
        
    }
}catch(Exception){

}



const correo =(element)=>{
    let id = element.id.split('_')[1];
    
    let array = localStorage.getItem('correos');
    
    if(element.checked){
       array+=`,${id}` 
    }else{
        array = array.split(',').filter(function(item) {
            return item !== id
        })
    }
    
    localStorage.setItem('correos', array)
    console.log(localStorage.getItem('correos'))

}

const resetStorage =()=>{
    localStorage.setItem('correos', '')
}

const editNota =(id,alumno)=>{
    location.href = "../pages/notasalumno.php?id="+id+"&idAlumno="+alumno;
}

const irEditar =(id)=>{
    location.href = "../pages/formulario.php?id="+id;
}

const irEliminar =(id)=>{
    location.href = "../controller/eliminarcontroller.php?id="+id;
}

const irVer =(id)=>{
    location.href = "../pages/alumno.php?id="+id;
}