@extends('layouts.app')

@section('content')
	<div class="page-header">
	  <h1>Checklist</h1>
	</div>
	<a href="checklist/create" class="btn btn-primary" role="button">Agrega una tecnologia</a>
	<div class="row">
		<div class="col-md-8">
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Nivel</th>						
						<th>Proyecto en que se uso</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($checklist as $item)
						<tr>
							<td>{{ $item->tecnologia->nombre }}</td>
							<td>{{ $item->nivel() }}</td>
							<td>{{ $item->usado_en }}</td>
							<td>
								<a href="checklist/{{ $item->id }}/edit" class="btn btn-primary" role="button">Editar</a>								
							</td>
							<td>
								<form action="checklist/{{ $item->id }}" method="POST">
									<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="_method" id="method" value="DELETE">
									<input type="submit" class="btn btn-danger" value="Borrar">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection