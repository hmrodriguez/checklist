@extends('layouts.app')

@section('content')
	<div class="page-header">
	  <h1>{{ $usuario->name }} <small>{{ $usuario->email }}</small></h1>
	</div>
	<button class="btn btn-primary no-print" onclick="window.print()">
		<i class="fa fa-btn fa-print"></i>Imprimir
	</button>
	<div class="row">
		<div class="col-md-8">
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Nivel</th>						
						<th>Proyecto en que se uso</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($usuario->checklist as $item)
						<tr>
							<td>{{ $item->tecnologia->nombre }}</td>
							<td>{{ $item->nivel() }}</td>
							<td>{{ $item->usado_en }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>            
		</div>
	</div>
@endsection