// localStorage.setItem('correos', "");

for (let i = 0; i < localStorage.getItem('correos').split(',').length; i++) {
    try {
        let check = document.getElementById('check_'+localStorage.getItem('correos').split(',')[i])
        check.checked = true;
    } catch (error) {
        
    }
    
}
const verAlumno =(id)=>{
    location.href = "../pages/alumno.php?id="+id;
}

const correo =(element)=>{
    let id = element.id.split('_')[1];
    
    let array = localStorage.getItem('correos').split(',');

    if(element.checked){
       array.push(id) 
    }else{
        array = array.filter(function(item) {
            return item !== id
        })
    }
    
    localStorage.setItem('correos', array)
    console.log(localStorage.getItem('correos'))

}