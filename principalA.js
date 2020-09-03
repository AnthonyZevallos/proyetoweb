$(function() {
    
  console.log('hola');
    
    
       
   
       
      $('.btn').click(function(e){
           
           const search= $('#search').val();
          
        $.ajax({
            url:'buscarPrincipal.php',
            type:'POST',
            
            data: {
                search:search
                
            },
            success: function(loquemanda){
                let muestras = JSON.parse(loquemanda); //TRANSFORMANDO EL STRING JSON A UN OBJETO PARA PODER  MOSTRARLO
           let modelo='';
            muestras.forEach(muestra =>{
                modelo +=`
                      <tr>
                        <td>${muestra.ibsn}</td>
                        <td>${muestra.titulo}</td>
                        <td>${muestra.categoria}</td>
                        <td>${muestra.nombre}</td>
                        <td>${muestra.apellido}</td>
                        <td>${muestra.nombre_provedor}</td>
                        <td>${muestra.apellido_provedor}</td>
                        <td>${muestra.idioma}</td>
                        <td>${muestra.precio}</td>
                      </tr>
                         `
                });
        $('#cuerpomostrar').html(modelo);
                
            }
            
        });   
           
       e.preventDefault();    
       }); 
       
 
       
       
       
             
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$.ajax({
        
        url:'listaPrincipal.php',
        type:'GET',
        success: function(r){
          let muestras = JSON.parse(r); //TRANSFORMANDO EL STRING JSON A UN OBJETO PARA PODER  MOSTRARLO
           let modelo='';
            muestras.forEach(muestra =>{
                modelo +=`
                      <tr>
                        <td>${muestra.ibsn}</td>
                        <td>${muestra.titulo}</td>
                        <td>${muestra.categoria}</td>
                        <td>${muestra.nombre}</td>
                        <td>${muestra.apellido}</td>
                        <td>${muestra.nombre_provedor}</td>
                        <td>${muestra.apellido_provedor}</td>
                        <td>${muestra.idioma}</td>
                        <td>${muestra.precio}</td>
                      </tr>
                         `
                });
        $('#cuerpomostrar').html(modelo);
            
        }
        
    });      
    
    
    
});