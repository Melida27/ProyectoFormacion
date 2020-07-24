$(document).ready(function(){
	var btn_info = $('.btn-info-technical');
  var btn_final_order = $('.btn-final-order');
	var identification_technical = $('.identification_technical');
	var name_technical = $('.name_technical');
	var email_technical = $('.email_technical');
	var phone_technical = $('.phone_technical');
	var birthdate_technical = $('.birthdate_technical');
	var gender_technical = $('.gender_technical');
	var experience_technical = $('.experience_technical');
	var tbody_studies = $('.tbody_studies');
	var tbody_experiences = $('.tbody_experiences');
  var container_addresses = $('.container_addresses');
  var form_add_address = $('.form_add_address');
  var btn_new_address = $('.btn_new_address');
  var btn_cancel_address = $('#btn-cancel-address');
  var btn_add_address = $('#btn-add-address');
  var data_id_customer = '';
  var data_id_tech = '';
  var data_id_service = '';
  var btn_save_order = $('#btn-save-order');
   var selectFilter = $('#select_filter');

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
  var btnFinalOrder = $('#btn-final-order');
  var btnAceptarOrder = $('#btn-aceptar-order');
  var btnRechazarOrder = $('#btn-rechazar-order');
  var notesCard = $('#notes-card');
  var btnNewNote = $('#btn_new_note');
  var formNote = $('#form-note');
    var orderId = '';

  var fk_technical = $('#fk_technical');
  var fk_service = $('#fk_service');

         $('.card_pendiente').css({display: 'inline-block'});
      $('.card_rechazado').css({display: 'inline-block'});
      $('.card_cancelado').css({display: 'inline-block'});
      $('.card_proceso').css({display: 'inline-block'});
      $('.card_finalizado').css({display: 'inline-block'});

    btn_final_order.click(function(event) {
      data_id_customer = $(this).attr('data-id');
      data_id_tech = $(this).attr('id-tech');
      data_id_service = $(this).attr('id-service');

      fk_technical.val(data_id_tech);
      fk_service.val(data_id_service);

    	getAddress(data_id_customer);
    });

    btn_info.click(function(event) {
      getInfoTechnical($(this).attr('data-id'));
    });

    btn_new_address.click(function(event) {
      form_add_address.css({
        display: 'block'
      });
    });

    btn_cancel_address.click(function(event) {
      form_add_address.css({
        display: 'none'
      });
    });

    btn_add_address.click(function(event) {
      insertAddress();
    });

    btn_save_order.click(function(event) {
      insertOrder();
    });


    function getInfoTechnical(idCurriculum) {
       $.get('/technical-info/'+idCurriculum, (response) => {
       	tbody_experiences.empty();
       	tbody_studies.empty();
       	   identification_technical.text(response.technical_info.identification_user);
           name_technical.text(response.technical_info.first_name + ' ' + response.technical_info.second_name + ' ' + response.technical_info.first_lastname + ' ' + response.technical_info.second_lastname);
           email_technical.text(response.technical_info.email);
           phone_technical.text(response.technical_info.phone);
           birthdate_technical.text(response.technical_info.birthdate);
           gender_technical.text(response.technical_info.gender);
           experience_technical.text(response.curriculum.experience + " años");

           for (var i = 0;i < response.studies.length; i++) {
               let row = document.createElement('tr');

           	   let studyTd1 = document.createElement('td');
           	   studyTd1.innerHTML = response.studies[i].institution;

               let studyTd2 = document.createElement('td');
           	   studyTd2.innerHTML = response.studies[i].type;

           	   let studyTd3 = document.createElement('td');
           	   studyTd3.innerHTML = response.studies[i].title;

           	   let studyTd4 = document.createElement('td');
           	   studyTd4.innerHTML = response.studies[i].end_date;

               row.append(studyTd1);
               row.append(studyTd2);
               row.append(studyTd3);
               row.append(studyTd4);

               tbody_studies.append(row);
           }


           for (var i = 0;i < response.experiences.length; i++) {
               let row = document.createElement('tr');

           	   let experienceTd1 = document.createElement('td');
           	   experienceTd1.innerHTML = response.experiences[i].company_name;

               let experienceTd2 = document.createElement('td');
           	   experienceTd2.innerHTML = response.experiences[i].position;

           	   let experienceTd3 = document.createElement('td');
           	   experienceTd3.innerHTML = response.experiences[i].time_experience_company;

           	   let experienceTd4 = document.createElement('td');
           	   experienceTd4.innerHTML = response.experiences[i].description;

               row.append(experienceTd1);
               row.append(experienceTd2);
               row.append(experienceTd3);
               row.append(experienceTd4);

               tbody_experiences.append(row);
           }
       });
    }


    function getAddress(id) {
      container_addresses.empty();
      let option = document.createElement('option');
      option.innerHTML = 'Seleccione...';
      container_addresses.append(option);

      $.get('/get-address/'+id, function(addresses){
        console.log(addresses);

         for (var i = 0; i < addresses.length; i++) {
           let option = document.createElement('option');
           option.setAttribute('value',addresses[i].id);
           option.innerHTML = addresses[i].address + ' | ' + addresses[i].neighborhood + ' | ' + addresses[i].name_municipality;
           
           container_addresses.append(option);
         }
      });
    }

    function insertAddress(){
          $.ajax({
              type: 'post',
              url: '/store-address',
              data: $('#form-address').serialize(),
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function (id) {
                  alert('Direccion agregada exitosamente');
                  $('#form-address')[0].reset();
                  getAddress(data_id_customer);
                  form_add_address.css({
                  display: 'none'
                });

              },
              error: function(error) {
                  alert('Error al crear la direccion');
              }
          });
    }

    function insertOrder(){
      $.ajax({
              type: 'post',
              url: '/orders',
              data: $('#form_orders').serialize(),
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function (response) {
                  Swal.fire({
                    title: 'Felicitaciones',
                    text: 'Orden creada exitosamente',
                    icon: 'success',
                    confirmButtonColor: '#00796b' 
                })
                .then(()=>{
                  window.location.href = '/orders-customer';
                });

              },
              error: function(error) {
                  console.log(error);
              }
          });
    }



      $('body').on('click', '.btn-admin-order', function(event) {
      orderId = $(this).attr('data-id');
        getOrder(orderId);

     });

  function getOrder(id){
       $.get('/orders/'+id, (response)=>{
        console.log(response);
        
         spnOrderCreate.text(response[0].date_order);
         spnStatusOrder.text(response[0].status_order);

         if(response[0].status_order == 'Pendiente' || response[0].status_order == 'Rechazado'){
           spnServiceCreate.text('N/A');
         }else {
           spnServiceCreate.text(response[0].date_service);
         }
         

         spnScore.text(response[0].score);
         spnClienteNombre.text(response[0].first_name + ' ' + response[0].first_lastname + ' ' + response[0].second_lastname);
         spnClienteTelefono.text(response[0].phone);
         spnClienteEmail.text(response[0].email);
         spnNameService.text(response[0].name_service);
         spnDescriptionService.text(response[0].description);
         pOrderDescription.text(response[0].order_description);

         if(response[0].status_order == 'Pendiente'){
             btnFinalOrder.css({display: 'none' });
             notesCard.css({display: 'none'});
             btnAceptarOrder.css({display: 'none'});
             btnRechazarOrder.css({display: 'none'});
         }else if(response[0].status_order == 'Proceso'){
             btnFinalOrder.css({display: 'none' });
             notesCard.css({display: 'block'});
             btnNewNote.css({display: 'block'});
             formNote.css({display: 'block'});
             btnAceptarOrder.css({display: 'none'});
             btnRechazarOrder.css({display: 'none'});
         }else if(response[0].status_order == 'Finalizado'){
             btnFinalOrder.css({display: 'none' });
             notesCard.css({display: 'block'});
             btnNewNote.css({display: 'none'});
             formNote.css({display: 'none'});
             btnAceptarOrder.css({display: 'none'});
             btnRechazarOrder.css({display: 'none'});
         }else if(response[0].status_order == 'Rechazado' || response[0].status_order == 'Cancelado'){
             btnFinalOrder.css({display: 'none' });
             notesCard.css({display: 'none'});
             btnAceptarOrder.css({display: 'none'});
             btnRechazarOrder.css({display: 'none'});
         }

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
    $('#note_order').val('Cliente: ' + $('#note_order').val());
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

  btnAceptarOrder.click(function(event) {
    $('#calendar').css({
      display: 'block'
    });
  });


   $('#guardar-aceptada').click(function(event) {

    updateDateService('Proceso',$('#date-service').val());
  });
  

  btnFinalOrder.click(function(event) {
    updateOrderStatus('Finalizado','La orden ha sido Finalizada');
  });

  btnRechazarOrder.click(function(event) {
    updateOrderStatus('Rechazado','La orden ha sido Rechazada');
  });
  

  function updateOrderStatus(value,message) {
    $.ajax({
            type: 'put',
            url: '/orders-status/'+orderId,
            data: {value: value},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(){
              Swal.fire({
                    title: 'Felicitaciones',
                    text: message,
                    icon: 'success',
                    confirmButtonColor: '#00796b' 
                })
                .then(()=>{
                  location.reload();
                });
            }
        });
  }


  function updateDateService(value, date){
     $.ajax({
            type: 'put',
            url: '/date-service/'+orderId,
            data: {value: value,
                  date: date},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(){
              Swal.fire({
                    title: 'Felicitaciones',
                    text: 'Orden Aceptada',
                    icon: 'success',
                    confirmButtonColor: '#00796b' 
                })
                .then(()=>{
                  location.reload();
                });
            }
        });
  }


    selectFilter.change(function(event) {
    if($(this).val() == 'finalizado'){
      $('.card_pendiente').css({display: 'none'});
      $('.card_rechazado').css({display: 'none'});
      $('.card_cancelado').css({display: 'none'});
      $('.card_proceso').css({display: 'none'});
      $('.card_finalizado').css({display: 'inline-block'});
    }else if($(this).val() == 'pendiente'){
       $('.card_pendiente').css({display: 'inline-block'});
      $('.card_rechazado').css({display: 'none'});
      $('.card_cancelado').css({display: 'none'});
      $('.card_proceso').css({display: 'none'});
      $('.card_finalizado').css({display: 'none'});
    }else if($(this).val() == 'rechazado'){
       $('.card_pendiente').css({display: 'none'});
      $('.card_rechazado').css({display: 'inline-block'});
      $('.card_cancelado').css({display: 'none'});
      $('.card_proceso').css({display: 'none'});
      $('.card_finalizado').css({display: 'none'});
    }else if($(this).val() == 'proceso'){
      $('.card_pendiente').css({display: 'none'});
      $('.card_rechazado').css({display: 'none'});
      $('.card_cancelado').css({display: 'none'});
      $('.card_proceso').css({display: 'inline-block'});
      $('.card_finalizado').css({display: 'none'});
    }else if($(this).val() == 'todas'){
       $('.card_pendiente').css({display: 'inline-block'});
      $('.card_rechazado').css({display: 'inline-block'});
      $('.card_cancelado').css({display: 'inline-block'});
      $('.card_proceso').css({display: 'inline-block'});
      $('.card_finalizado').css({display: 'inline-block'});
    }else if($(this).val() == 'cancelado'){
       $('.card_pendiente').css({display: 'none'});
      $('.card_rechazado').css({display: 'none'});
      $('.card_cancelado').css({display: 'inline-block'});
      $('.card_proceso').css({display: 'none'});
      $('.card_finalizado').css({display: 'none'});
    }

  });
});