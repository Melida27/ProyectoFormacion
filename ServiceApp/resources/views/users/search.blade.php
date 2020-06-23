@forelse ($users as $user)
	<tr>
		<td>{{ $user->first_name }}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->phone }}</td>

		<td class="text-center">
			@if ($user->status == "1")
			<i class="fa fa-check text-success"></i>
			@else
			<i class="fa fa-times text-danger"></i> 
			@endif
		</td>

		<td>
			<a href="{{ url('users/'.$user->id )}}" class="btn btn-sm btn-custom">
				<i class="fa fa-search"></i>
			</a>

			<a href="{{ url('users/'.$user->id.'/edit/')}}" class="btn btn-sm btn-custom btn-edit-user" data-id="{{ $user->id }}">
				<i class="fa fa-pen"></i>
			</a>

			<form action="{{ url('users/desactivar/'.$user->id) }}" method="post" style="display: inline-block;">
				@csrf
				@method('PUT')
				<button type="button" class="btn btn-sm btn-custom-danger btn-desactivar">
					<i class="fa fa-ban"></i>
				</button>
			</form>
		</td>
	</tr>
@empty
	<tr>
		<td colspan="4">
			No hay usuarios con ese nombre!!
		</td>
	</tr>
@endforelse