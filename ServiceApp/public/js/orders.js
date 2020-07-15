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

	var orderId = '';
	
     $('body').on('click', '.btn-admin-order', function(event) {
     	orderId = $(this).attr('data-id');
        getOrder(orderId);

     });

	function getOrder(id){
       $.get('/orders/'+id, (response)=>{
       	console.log(response),
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

         getNotes(id);
       });
	}

	function getNotes(id){
		$('#notes').empty();
		$.get('/notes/'+id, (response)=>{

           for (var i = 0; i < response.length; i++) {
           	 let div1 = document.createElement('div');
           	 div1.classList.add('card');
           	 div1.classList.add('card-style');

           	 let div2 = document.createElement('div');
           	 div2.classList.add('card-body');

           	 let p = document.createElement('p');
           	 p.classList.add('card-text');
           	 p.innerHTML = response[i].note;
             
             div2.append(p);
           	 div1.append(div2);

           	 $('#notes').append(div1);
           };
		});
	}
    
    $('#btn_new_note').click(function(event) {
    	insertNote();
    });

	function insertNote(){
		$('#order-id').val(orderId);
		$.ajax({
            type: 'post',
            url: '/notes',
            data: $('#form-note').serialize(),
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                console.log("Insercion correcta");
                getNotes(orderId);
                $('#form-note')[0].reset();

            },
            error: function(error) {
                console.log(error);
             }   
        });
	}

});
