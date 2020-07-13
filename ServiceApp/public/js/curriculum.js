$(document).ready(function() {
	let checkServices = $('#options-services');

	$.get('/allservices', function(services){
		for(let service in services){
			let check = document.createElement('input');
			check.setAttribute('type', 'checkbox');
			check.setAttribute('value', services[service].id);
			check.setAttribute('name', 'fk_service[]');

			let label = document.createElement('label');
			label.innerHTML = services[service].name_service;

			checkServices.append(check);
			checkServices.append(label);
		}
	});
});