$(document).ready(function(){
    
   $('#btnAdd').click(function() {
	   	
        var num = $('.clonedInput').length; // cuenta cuantos estan duplicados
        var newNum = new Number(num + 1); // agrega 1 al contador, para usarlo en el nuevo nombre
        
        // Se crea un nuevo elemento por clonacion y se le da el nuevo id y nombre
        var newElem = $('#input1').clone().attr('id', 'input' + newNum);

        // insert the new element after the last "duplicatable" input field
        $('#input' + num).after(newElem);
        //newElem.attr('autofocus', true);
	   $('#input' + newNum).find('#pregunta-pregdescripcion')
	   						.attr('name', 'pregunta[pregDescripcion'+newNum+']')
	   						.attr('id', 'pregunta-pregdescripcion'+newNum)
	   						.attr('autofocus', true)
	   						.attr('placeholder', 'Ingresa pregunta');
	   $('#input' + newNum).find('#pregunta-idresptipo')
	   						.attr('name', 'pregunta[idRespTipo'+newNum+']')
	   						.attr('id', 'pregunta-idresptipo'+newNum);
	   
});
   
   
   $("#pregunta-idresptipo").change(function(event){
       var idRespTipo=$(this).find('option:selected').val();
       
       var x=new XMLHttpRequest();
	   x.onreadystatechange = function(){
	   		if( this.readyState == 4 && this.status == 200){
	   	        resp=JSON.parse(this.responseText);
	   	        alert(resp);
	   		}
	   	};
	   	x.open('POST', '/encuesta/views/RespuestaTipo/tipoRespuesta.php', true);
	   	x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	   	x.send('idRespTipo='+idRespTipo);
	   });
     
});