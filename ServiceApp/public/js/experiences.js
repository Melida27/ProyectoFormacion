$(document).ready(function() {
	var inputCurriculum = $('#id_curriculum').val();

	$('#btn-add-experience').click(function(event) {
    	insertExperience();
    });

    function insertExperience(){
		$('#fk_curriculum').val(inputCurriculum);

		$.ajax({
            type: 'post',
            url: '/experiences',
            data: $('#form-experience').serialize(),
            headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function () {
                console.log("Insercion correcta");
                $('#form-experience')[0].reset();

                Swal.fire({
                    title: 'Felicitaciones',
                    text: `Experiencia Creada Exitosamente`,
                    icon: 'success',
                    confirmButtonColor: '#00796b',   
                })
                .then(()=>{
                    location.reload();
                });
            },
            error: function(error) {
                console.log(error);

                Swal.fire({
                    title: 'Error',
                    text: 'Error Al Crear La Experiencia',
                    icon: 'error',
                    confirmButtonColor: '#c20031',
                });
            }   
        });
	}

    /* ----------------------------------------------------------------------------- */

    $('.btn-delete').click(function(event){
        Swal.fire({
            title: 'Está usted seguro?',
            text: "Desea eliminar este registro?",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#00796b',
            cancelButtonColor: '#c20031',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $(this).parent().submit();
            }
        });
    });

    /* ----------------------------------------------------------------------------- */
});