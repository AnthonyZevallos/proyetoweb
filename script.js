
$(function() {
    
    console.log('hola');
    
    $('#para_ocultar').hide();
    
    actualizarM();//yamando la funcion para que muestre los datos de de los libros
    
    $('#search').keyup(function(e){//query.js  cuando unput en id search
       
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
       
        
        
        
    })   ;
    //agregando libro
    

   $('#almacen-form').submit(function(e){
        
        const enviarDato ={
            
         ibsn:$('#ibsn').val(),
         titulo:$('#titulo').val(),   
         categoria:$('#categoria').val(),
         fechaPublicacion:$('#fechaPublicacion').val(), 
         fkautor:$('#fkautor').val(),
         fkproveedor:$('#fkproveedor').val(),   
         editorial:$('#editorial').val(),
         idioma:$('#idioma').val(), 
         precio:$('#precio').val(),
         descripcion:$('#descripcion').val()
         
                
               
            
        }
		//console.log(enviarDato); 
       
    $.post('insert.php',enviarDato,function(response){
           $('#almacen-form').trigger('reset');
           actualizarM();//llamar la funcion para que se muestre despues se agrege un nuevo libro
       });
           
           
       e.preventDefault(); //para que no se regresce la pagina    
     });
		
	 function actualizarM(){
        
          //ajax ya te envia por defecto los datos por que no ponemos ningun evento    
    $.ajax({
        
        url:'listar1.php',
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
                        <td>${muestra.idioma}</td>      
                      </tr>
                         `
                });
        $('#cuerpomostrar').html(modelo);
            
        }
        
    });  
         
 } 
     
        
        
    
        
   }); 



