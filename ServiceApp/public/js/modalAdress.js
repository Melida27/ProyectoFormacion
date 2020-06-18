$(document).ready(function(){
	$('#btn-addresses').click(function(event) {
		let idUser = $('#id-user');
		let formAddresses = $('#form-addresses');
		let contador = 0;

        //console.log('Hola, te amo mucho, estoy orgullosa de ti, me fascinas, eres el mejor!');
        $.get('/get-address/' + idUser.val(), function(addresses){
         	console.log(addresses);

         	formAddresses.empty();

         	if(addresses.length > 0){
          		for(let address in addresses){

	           		let titulo = document.createElement('h6');
	           		titulo.innerText = 'Dirección ' + (parseInt(address)+1);

	           		let divRow = document.createElement('div');
	           		divRow.setAttribute('class', 'row');

	           		formAddresses.append(titulo);

	                let divColAddress = document.createElement('div');
	                divColAddress.setAttribute('class', 'col');

	                let divColNeighborhood = document.createElement('div');
	                divColNeighborhood.setAttribute('class', 'col');

	                let divColMunicipality = document.createElement('div');
	                divColMunicipality.setAttribute('class', 'col');

	                let divColDepartment = document.createElement('div');
	                divColDepartment.setAttribute('class', 'col');

	                let inputAddress = document.createElement('input');
	                let inputNeighborhood = document.createElement('input');
	                let inputMunicipality = document.createElement('input');
	                let inputDepartment = document.createElement('input');

	                inputAddress.setAttribute('class', 'form-control mb-4');
	                inputNeighborhood.setAttribute('class', 'form-control mb-4');
	                inputMunicipality.setAttribute('class', 'form-control  mb-4');
	                inputDepartment.setAttribute('class', 'form-control  mb-4');

	                inputAddress.setAttribute('value', addresses[address].address);
	                inputNeighborhood.setAttribute('value', addresses[address].neighborhood);
	                inputMunicipality.setAttribute('value', addresses[address].name_municipality);
	                inputDepartment.setAttribute('value', addresses[address].name_department);

	                divColAddress.append(inputAddress);
	                divColNeighborhood.append(inputNeighborhood);
	                divColMunicipality.append(inputMunicipality);
	                divColDepartment.append(inputDepartment);

	                divRow.append(divColAddress);
	                divRow.append(divColNeighborhood);
	                divRow.append(divColMunicipality);
	                divRow.append(divColDepartment);

	                formAddresses.append(divRow);
            	}
            }else{
                let titulo = document.createElement('h4');
                titulo.innerText = 'No hay direcciones para mostrar...';
                formAddresses.append(titulo);
            }
        });
    });	
});