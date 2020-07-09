<table class="table table-striped">
	<tbody>			   
		<tr>
		  <th>NOMBRE:</th>
		  <td>{{ $query[0]->name_service }}</td>
		</tr>

		<tr>
		  <th>IMAGEN:</th>
		  <td><img src="{{ $query[0]->image }}" alt="" class="img-thumbnail" width="300"></td>
		</tr>

		<tr>  
			<th>DESCRIPCIÓN: </th>
			<td>{{ $query[0]->description }}</td>
		</tr>

		<tr>
			<th>CATEGORÍA:</th>
			<td>{{ $query[0]->name_category}}</td>
		</tr>

		<tr >
		  <th>CREADA:</th>
		  <td>{{ $query[0]->created_at }}</td>
		</tr>
		
		<tr>
		  <th>ACTUALIZADA:</th>
		  <td>{{ $query[0]->updated_at }}</td>
		</tr>
	</tbody>
</table>
          