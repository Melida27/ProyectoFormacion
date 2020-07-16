$(document).ready(function() {
	var inputCurriculum = $('#id_curriculum').val();

	$('#btn-add-study').click(function(event) {
    	insertStudy();
    });

    function insertStudy(){
		$('#fk_curriculum').val(inputCurriculum);

		$.ajax({
            type: 'post',
            url: '/studies',
            data: $('#form-study').serialize(),
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                console.log("Insercion correcta");
                $('#form-study')[0].reset();

                Swal.fire({
                    title: 'Felicitaciones',
                    text: `Estudio Creado Exitosamente`,
                    icon: 'success',
                    confirmButtonColor: '#00796b',   
                });

                location.reload();
            },
            error: function(error) {
                console.log(error);

                Swal.fire({
                    title: 'Error',
                    text: 'Error Al Crear El Estudio',
                    icon: 'error',
                    confirmButtonColor: '#c20031',
                });
            }   
        });
	}
});