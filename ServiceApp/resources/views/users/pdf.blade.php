<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista General de Usuarios</title>
	<style>
		table{
			border: 1px solid #999;
			border-collapse: collapse;
		}

		table th, table td{
			font-family: sans-serif;
			font-size: 12px;
			border: 1px solid #999;
			padding: 10px;
		}

		table th{
			background-color: #666;
			color: #fff;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Identificación</th>
				<th>Nombre</th>
				<th>Correo Electrónico</th>
				<th>Teléfono</th>
				<th>Género</th>
				<th>Estado Civil</th>
				<th>Rol</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->identification_user }}</td>
					<td>{{ $user->first_name }} {{ $user->first_lastname }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->gender }}</td>
					<td>{{ $user->civil_status }}</td>
					<td>{{ $user->role }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>