$('#Buttonbuscar').on('click',function(e){
//$(document).ready(function() {
	var path = "/soporteTecnico/web/admin/searchUser";//$("#dialogo").attr("data-path");
    var data = $("#inputBuscar").val();
    var url = path;
    $.ajax({
        type: "POST",
        url: path,
        data: { parameter: data },
	    success: function(data) {
	    	$('#dialogo').html(data);
            //$('#dialogo').loadIfModified()
	    	console.log("exito");
 			//alert (resp);
	    },
        error: function(jqXHR,estado,error) {
        	//console.log(estado);
        	//console.log(error);
        	//alert (estado);
        	console.log("error");
        },
        complete: function (jqXHR,estado){
        	//console.log(estado);
        	//console.log("completo")
        },
        //timeout: 1000
	});
});

$('#dialogo').on("click","table tbody tr ",function(e){
        var rowIndex = $(this).index(); //indice de la fila seleccionada
        var colum= $('td:first-child'); //todos los primeros td
        var element; 
        $.each( colum, function( key, value ) { //recorrer el objeto colum
            if(rowIndex==key){
                element = value;
                return false;
            }
        });
        var id = parseInt(element.innerHTML);
        $('#registronetbook_controlbundle_maquina_usuario').val(id);
});


$(document).ready(function() {
	$('table').addClass('table table-striped table-responsive table-bordered table-hover');
    // Get the ul that holds the collection of detalleMovimiento
// setup an "add a tag" link
    var $addTagLink = $('<a href="#" class="add_tag_link">Nuevo Movimiento</a>');
    var $newLinkLi = $('<li></li>').append($addTagLink);

    // Get the ul that holds the collection of detalleMovimiento
   var $collectionHolder = $('ul.detalleMovimiento');
    // add the "add a tag" anchor and li to the detalleMovimiento ul
    $collectionHolder.append($newLinkLi);
    
    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    
    $addTagLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();
        
        // add a new tag form (see code block below)
        addTagForm($collectionHolder, $newLinkLi);
    });
});

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var $prototype = $collectionHolder.data('prototype');
    // get the new index
    var $index = $collectionHolder.data('index');
    
    // Replace '$$name$$' in the prototype's HTML to
    // instead be a number based on how many items we have
    var $newForm = $prototype.replace(/__name__/g, $index);
    // increase the index with one for the next item
    $collectionHolder.data('index', $index + 1);
    
    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append($newForm);
    
    // also add a remove button, just for this example
    $newFormLi.append('<a href="#" class="remove-tag">x</a>');
    
    $newLinkLi.before($newFormLi);
    
    // handle the removal, just for this example
    $('.remove-tag').click(function(e) {
        e.preventDefault();
        
        $(this).parent().remove();
        
        return false;
    });
}