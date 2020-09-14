$(function(){
    
  $('#ignup').submit(function(e){
   var usuario,contra;   
     usuario=$('#user').val(); 
     contra=$('#pass').val(); 
     
      email= /\w+@\w+\.+[a-z]/;
         con =/\w/;
      
    if(usuario==="" || contra ===""){
      alert("todo los campos son necesarios ");
        return false;
       }
      else if(usuario.length>20){
     alert("el usuario demaciado largo ");
        return false;          
       }
      else if(!email.test(usuario)){
     alert("letra1@gmail.com");
        return false;          
       }
      else if(contra.length>25){
     alert("contraseña demaciado largo ");
        return false;          
       } 
      else if(!con.test(contra)){
     alert("la contraseña no permite caracteres raros");
        return false;          
       }
      
      
      const guardando ={
          user:$('#user').val(),
          pass:$('#pass').val()
      }
      
     $.post('nuevoUSUARIO.php',guardando,function(res){
           $('#ignup').trigger('reset');
           alert(res);
       });  
      
      e.preventDefault();
  });  
    
});