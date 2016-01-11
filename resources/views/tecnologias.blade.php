@extends('layouts.app')

@section('content')
	<div class="page-header">
	  <h1>Lista de tecnologias</h1>
	</div>
	<a href="tecnologias/create" class="btn btn-primary" role="button">Nueva</a>
	<div class="row">
		<div class="col-md-8">
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tecnologias as $tecnologia)
						<tr>
							<td>{{ $tecnologia->nombre }}</td>
							<td>
								<a href="tecnologias/{{ $tecnologia->id }}/edit" class="btn btn-primary" role="button">Editar</a>								
							</td>
							<td>
								<form action="tecnologias/{{ $tecnologia->id }}" method="POST">
									<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="_method" id="method" value="DELETE">
									<input type="submit" class="btn btn-danger" value="Borrar">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<p>
				{{ $tecnologias->render() }}
			</p>	
		</div>
	</div>
@endsection