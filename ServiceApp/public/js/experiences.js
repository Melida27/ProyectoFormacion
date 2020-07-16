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
                });

                location.reload();
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
});