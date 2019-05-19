$(document).ready(function(){
    $('#btn-agregar').on('click', function(){
        var idPregunta=parseInt($('#preg').text());
        
        var x=new XMLHttpRequest();
    	x.onreadystatechange = function(){
    		if( this.readyState == 4 && this.status == 200){
    	        resp=JSON.parse(this.responseText);
    	      
    			$('#prueba').html(resp[0]);
                $('#preg').text(resp[1]);
    		}
    	};
    	x.open('POST', '/encuesta/views/Encuesta/generaPregunta.php', true);
    	x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    	x.send('idPregunta='+idPregunta);
        
    });
    
    $('#btnAdd').click(function() {
    	
        var num = $('.clonedInput').length; // cuenta cuantos estan duplicados
        var newNum = new Number(num + 1); // agrega 1 al contador, para usarlo en el nuevo nombre
        
        // Se crea un nuevo elemento por clonacion y se le da el nuevo id y nombre
        var newElem = $('#input'+num).clone().attr('id', 'input' + newNum);
     
        // manipulate the name/id values of the input inside the new element
        //newElem.children(':last').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
     
        // insert the new element after the last "duplicatable" input field
        $('#input' + num).after(newElem);
        //newElem.attr('autofocus', true);
        var idelem='#input' + newNum
        var id=$(idelem + ' input:first').attr('id');
        $('#input1 input:firs').attr('id', id + newNum);
      });
     
});