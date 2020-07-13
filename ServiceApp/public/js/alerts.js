$(document).ready(function() {
	/* ----------------------------------------------------------------------------- */
	@if(session('message'))
		Swal.fire({
			title: 'Felicitaciones',
			text: '{{ session('message') }}',
			icon: 'success',
			confirmButtonColor: '#00796b',
		});
	@endif

	/* ----------------------------------------------------------------------------- */

	@if(session('error'))
		Swal.fire({
			title: 'Error',
			text: '{{ session('error') }}',
			icon: 'error',
			confirmButtonColor: '#00796b',
		});
	@endif

	/* ----------------------------------------------------------------------------- */
});