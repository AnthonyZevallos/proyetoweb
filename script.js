
$(function() {
    //buscar 
   
    
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
    //agregando libro y validando
    

   $('#almacen-form').submit(function(e){
       
       var ibsn, titulo, categoria, fecha,fkautor,fkprovedor,editorial,idioma,precio,descripcion;
         
       ibsn =$('#ibsn').val();
       titulo =$('#titulo').val();
       categoria =$('#categoria').val();
       fecha =$('#fechaPublicacion').val();
       fkautor =$('#fkautor').val();
       fkprovedor =$('#fkproveedor').val();
       editorial =$('#editorial').val();
       idioma =$('#idioma').val();
       precio =$('#precio').val();
       descripcion =$('#descripcion').val();
       
       
   ibs = /^[0-9]{1,5}\-[0-9]{1,5}\-[0-9]{1,5}\-[0-9]{1,5}\-[0-9]{1,3}$/;//ibsn - - - -  
   descri =/\w\s/;//numeros letras espacio
     ti=/\w/; //numeros leteras 
    pre=/^\$+[0-9]{0,5}$/;   
    
    if( ibsn === "" ||  titulo === "" || categoria === "" || fecha=== "" || fkautor === "" || fkprovedor === "" || editorial === "" || idioma === "" || precio === "" || descripcion === ""){
        
        alert("todos los campos son obligatorios");  
            return false;
    } 
    else if(ibsn.length>24){
     alert("el ibsn es muy largo");  
            return false;       
            
    }
    else if(!ibs.test(ibsn)){
     alert("el ibsn no es valido");  
            return false;       
            
    } //titulo 
    else if(titulo.length>40){
     alert("el titulo es muy largo");  
            return false;       
            
    }
    else if(!descri.test(titulo)){
     alert("el titulo debe tener  un espacio minimo");  
            return false;       
            
    } //categoria    
     else if(categoria.length>30){
     alert("la categoria es muy largo");  
            return false;       
            
    } 
    else if(!ti.test(categoria)){
     alert("el categoria no es valido");  
            return false;       
            
    } //fecha    
    else if(fecha.length>10){
     alert("la fecha esta incorrecta");  
            return false;       
            
    }//editorial
    else if(editorial.length>50){
     alert("editorial demaciado largo");  
            return false;       
            
    }
    else if(!descri.test(editorial)){
     alert("el editorial no es valido");  
            return false;       
            
    }   
       //idioma
     else if(idioma.length>15){
     alert("idima demaciado largo");  
            return false;       
            
    }
    else if(!ti.test(idioma)){
     alert("el idioma no es valido");  
            return false;       
            
    }   
       //precio 
    else if(precio.length>5){
     alert("precio muy caro");  
            return false;       
            
    }
    /* else if(isNaN(precio)){ //solo para numeros
     alert("el precio no es numerico");  
            return false;       
            
    } */ 
    else if(!pre.test(precio)){
     alert("es necesario el sinvolo $ en el precio");  
            return false;       
            
    }   
     //descripcion   
    else if(descripcion.length>150){
     alert("la descripcion es demacio largo");  
            return false;       
            
    } 
     else if(!descri.test(descripcion)){
     alert("no puedes pomer varibles extraños");  
            return false;       
            
    }    
       
       
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
	
    $('#AutoP').submit(function(e){
        
       var nombA, apeA, nacioA;
         
       nombA =$('#nombreA').val();
       apeA =$('#apellidoA').val();
       nacioA =$('#nacionalidadA').val();
        vali=/\w\s/;
        va =/\w/;
     
        if(nombA ==="" || apeA ==="" || nacioA ===""){
           alert("todo los campos son necesarios");
            return false;
           }
        else if(nombA.length>20){
              alert("el nombre demaciado largo");
            return false;      
           }
        
        else if(apeA.length>40){
              alert("el apellido demaciado largo");
            return false;      
           }
        else if(!vali.test(apeA)){
              alert("apellido extraño");
            return false;      
           }
        else if(nacioA.length>25){
              alert("el nacionalidad demaciado largo");
            return false;      
           }
        else if(!va.test(nacioA)){
              alert("nacioalidad extraña");
            return false;      
           } 
        
        const guardando ={
            nombreA:$('#nombreA').val(),
            apellidoA:$('#apellidoA').val(),
            nacionalidadA:$('#nacionalidadA').val()
            }
        $.post('agregandoAutor.php',guardando,function(response){
            $('#AutoP').trigger('reset');
           alert(response); 
        
        });
        
        
      e.preventDefault();  
    });
    
    
    
    $('#dueñoL').submit(function(e){
        var nombr, apelli,telefono,pais,email,dni;
        nombr=$('#nombreP').val();
        apelli=$('#apellidoP').val();
        telefono=$('#telefonoP').val();
        pais=$('#paisP').val();
        email=$('#emailP').val();
        dni=$('#dniP').val();
        
        em= /\w+@\w+\.+[a-z]/;
        vali=/\w\s/;
        va =/\w/;
        cel =/^\+[0-9]{0,12}$/;
        
    if(nombr === "" || apelli ==="" || telefono ==="" || pais === "" || email === "" || dni === "" ){
       alert("todo los campos son obligatorios");
       return false;
       }
        else if(nombr.length>15){
         alert("el nombre es demaciado largo");
         return false;        
      }    
        else if(apelli.length>25){
         alert("el apellido es demaciado largo");
         return false;        
      }  
        else if(!vali.test(apelli)){
         alert("entradas extrañas");
         return false;        
      }
        else if(telefono.length>14){
         alert("el numero celular demaciado largo");
         return false;        
      } 
         else if(!cel.test(telefono)){
         alert("agrege el codigo de pais al numero de celular y tiene que ser numero");
         return false;        
      } 
        else if(pais.length>20){
         alert("el  pais no existe");
         return false;        
      }
        else if(!va.test(pais)){
         alert("pais incorrecto");
         return false;        
      }
        else if(email.length>30){
         alert("el email demaciado largo");
         return false;        
      }
        else if(!em.test(email)){
         alert("ingrese un email correcto");
         return false;        
      }
        else if(dni.length>8){
         alert("el numero dni demaciado largo");
         return false;        
      }
        else if(isNaN(dni)){
         alert("el dni no es numerico");
         return false;        
      }
        
      const almacenar ={
          nombreP:$('#nombreP').val(),
          apellidoP:$('#apellidoP').val(),
          telefonoP:$('#telefonoP').val(),
          paisP:$('#paisP').val(),
          emailP:$('#emailP').val(),
          dniP:$('#dniP').val()
          
      }  
    $.post('agregandoDueño.php',almacenar,function(response){
       $('#dueñoL').trigger('reset'); 
       alert(response); 
        
    });    
        
        
     e.preventDefault();   
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
          console.log(eliminardato); 
      $.post('borrar.php',{idI,eliminardato},function(response){
           console.log(response);
           $('#eliminar').trigger('reset');
           actualizarM();
        });      
        
      // console.log(eliminardato);
          
        e.preventDefault();  
      });    
    });
    
    
     
      
 
          
   });  



