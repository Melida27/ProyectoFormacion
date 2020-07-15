$(document).ready(function(){
	var spnOrderCreate = $('#spn-order-create');
	var spnStatusOrder = $('#spn-status-order');
	var spnServiceCreate = $('#spn-service-create');
	var spnScore = $('#spn-score');
	var spnClienteNombre = $('#spn-cliente-nombre');
	var spnClienteCiudad = $('#spn-cliente-ciudad');
	var spnClienteDireccion = $('#spn-cliente-direccion');
	var spnClienteBarrio = $('#spn-cliente-barrio');
	var spnClienteTelefono = $('#spn-cliente-telefono');
	var spnClienteEmail = $('#spn-cliente-email');
	var spnNameService = $('#spn-name-service');
	var spnDescriptionService = $('#spn-description-service');
	var pOrderDescription = $('#p-order-description');
	
     $('body').on('click', '.btn-admin-order', function(event) {
        getOrder($(this).attr('data-id'));

     });

	function getOrder(id){
       $.get('/orders/'+id, (response)=>{
       	 spnOrderCreate.text(response[0].date_order);
       	 spnStatusOrder.text(response[0].status_order);
         spnServiceCreate.text(response[0].date_service);
         spnScore.text(response[0].score);
         spnClienteNombre.text(response[0].client_first_name + ' ' + response[0].client_second_name + ' ' + response[0].client_first_lastname + ' ' + response[0].client_second_lastname);
         spnClienteCiudad.text(response[0].client_municipality);
         spnClienteDireccion.text(response[0].address);
         spnClienteBarrio.text(response[0].neighborhood);
         spnClienteTelefono.text(response[0].client_phone);
         spnClienteEmail.text(response[0].client_email);
         spnNameService.text(response[0].name_service);
         spnDescriptionService.text(response[0].description);
         pOrderDescription.text(response[0].order_description);
       });
	}
});
