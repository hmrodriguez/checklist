@extends('layouts.app')

@section('content')
	<div class="page-header">
	  <h1>Agregar tecnologia</h1>
	</div>	
	<div class="row">
		<div class="col-md-8">
			<form action="/checklist" method="POST">
				<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="tecnologia">Tecnología, Herramienta, Lenguaje o Técnica</label>
					<select name="tecnologia_id" id="tecnologia_id" class="form-control">
						@foreach ($tecnologias as $tecnologia)
							<option value="{{ $tecnologia->id }}">{{ $tecnologia->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="nivel">Nivel</label><br>
					<label class="radio-inline"><input type="radio" name="nivel" value="1">Bajo</label>
					<label class="radio-inline"><input type="radio" name="nivel" value="2">Medio</label>
					<label class="radio-inline"><input type="radio" name="nivel" value="3">Alto</label>
					<label class="radio-inline"><input type="radio" name="nivel" value="4">Experto</label>
				</div>
				<div class="form-group">
					<label for="usado_en">Proyecto en que se uso</label>
					<input type="text" name="usado_en" id="usado_en" class="form-control">
				</div>
				<input type="submit" class="btn btn-primary" value="Grabar">		
			</form>			
		</div>
	</div>
@endsection