
$(function() {
    
    console.log('hola');
    
    $('#para_ocultar').hide();
    
    $('#search').keyup(function(e){//query.js  cuando aplasta boton en id search
       
     if ($('#search').val()){
         
      let search = $('#search').val();
        
        $.ajax(
          {
             
            url:'buscar.php',
            type:'POST',
            data:{search:search},//con esto podemos enviar un objeto el valor del input
            success: function(response){//esto espara recibir de lo que envia el vakent
             
            let tasks = JSON.parse(response);
                
           // console.log(tasks);    
               let plantilla = '';
                tasks.forEach(task => {//esto apara recorrer y mostrar  previamente a la pantalla de agregar1
                 plantilla +=`<li>
                   ${task.titulo}
                   ${task.descripcion}
            </li>`
                });
            //estamos diciendo del id contendorA  se plame el todo de la variable platilla    
            $('#contenedorA').html(plantilla);    
            $('#para_ocultar').show();//para mostras si busca algo     
              
            }    
            
        }
        
        
        )   
         
         
     }    
       
        
        
        
    });
    //agregando libro

    $('#almacen-form').submit(function(e){
        
        const enviarDato ={
            
         ibsn: $('#ibsn').val(),
         titulo: $('#titulo').val(),   
         categoria: $('#categoria').val(),
         fecha: $('#fechaPublicacion').val(), 
         autor: $('#fkautor').val(),
         di_proveedor: $('#fkproveedor').val(),   
         editorial: $('#editorial').val(),
         idioma: $('#idioma').val(), 
         precio: $('#precio').val(),
         imagen: $('#txtimg').val(),   
         descripcion: $('#descripcion').val(),
        
                
               
            
        }
    $.post('agregarL.php',enviarDato, function(response){
        
        
        
        console.log(response);
    } );    
        
        
        
        
    e.preventDefault();    
        
    });


});
