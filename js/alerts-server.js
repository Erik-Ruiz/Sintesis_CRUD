
window.onload = function() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    
    if(urlParams.has('error')){
        
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: urlParams.get('error'),
        }) 
    }

    if(urlParams.has('ok')){

        Swal.fire(
            'Good job!',
            urlParams.get('ok'),
            'success'
          )
    }


};