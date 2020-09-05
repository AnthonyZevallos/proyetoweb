
$(function() {
    //buscar 
    console.log('hola');
    
    $('#para_ocultar').hide();
    
    actualizarM();//yamando la funcion para que muestre los datos de de los libros
    
    $('#search').keyup(function(e){//query.js  cuando ingresa el  unput en id search
       
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
           $('#almacen-form').trigger('reset');//resetear el formulario para q este en blanco
           actualizarM();//llamar la funcion para que se muestre despues se agrege un nuevo libro
       });
           
           
       e.preventDefault(); //para que no se regresce la pagina    
     });
		
    
    
    //mostrando los datos de cada fila de la tabla  libros
    
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
                      <tr darId="${muestra.idLIBRO}">
                        <td>${muestra.ibsn}</td>
                        <td>${muestra.titulo}</td>
                        <td>${muestra.categoria}</td>
                        <td>${muestra.idioma}</td>
                        <td>
                            <button class="botonparaE btn btn-danger"  data-toggle="modal" data-target="#modal3">
                               ELIMIANAR
                            </button>
                          
                        </td>
                      </tr>
                         `
                });
        $('#cuerpomostrar').html(modelo);
            
        }
        
    });  
         
 } 
    
    
//eliminando no yeva coma .val por que solo hay uno valor esta en formato json
//obteniendo el balor del class del boton clickeado, el ibsn del libro para poder bandarlo al backen y el #ibsnE es el id del imput del modadal    
    $(document).on('click','.botonparaE',function(){
        let elementoI = $(this)[0].parentElement.parentElement;
        let idI =$(elementoI).attr('darId');
        console.log(idI);
        
      $(document).on('click','#elim',function(e){
          
         let eliminardato=$('#ibsnE').val(); 
           
       $.post('borrar.php',{idI:idI,eliminardato:eliminardato},function(response){
           console.log(response);
           $('#eliminar').trigger('reset');
           actualizarM();
        });      
        
      // console.log(eliminardato);
          
        e.preventDefault();  
      });    
    });
    
    
     
   /* $("#elim").click(function(e){
        
        const eliminardato ={
            ibsnE:$('#ibsnE').val()
            
        }
        
     $.post('borrar.php',eliminardato,function(respuesta){
         
         
        $('#eliminar').trigger('reset'); 
         console.log(respuesta);
         actualizarM()
         
     });   
        
        
      e.preventDefault();  
        
    }); */   
        
    
          
   });  



