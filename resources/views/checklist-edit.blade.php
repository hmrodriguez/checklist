@extends('layouts.app')

@section('content')
	<div class="page-header">
	  <h1>Editar tecnologia</h1>
	</div>	
	<div class="row">
		<div class="col-md-8">
			<form action="/checklist/{{ $checklist->id }}" method="POST">
				<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" id="_method" value="PATCH">
				<div class="form-group">
					<label for="tecnologia">Tecnología, Herramienta, Lenguaje o Técnica</label>
					<select name="tecnologia_id" id="tecnologia_id" class="form-control">
						@foreach ($tecnologias as $tecnologia)
							<option 
								value="{{ $tecnologia->id }}"
								@if ($tecnologia->id == $checklist->tecnologia_id)
									selected
								@endif
							>
								{{ $tecnologia->nombre }}
							</option>
						@endforeach
					</select>
				</div>				
				<div class="form-group">
					<label for="nivel">Nivel</label><br>
					<label class="radio-inline"><input type="radio" name="nivel" value="1" @if ($checklist->nivel == 1) checked @endif>Bajo</label>
					<label class="radio-inline"><input type="radio" name="nivel" value="2" @if ($checklist->nivel == 2) checked @endif>Medio</label>
					<label class="radio-inline"><input type="radio" name="nivel" value="3" @if ($checklist->nivel == 3) checked @endif>Alto</label>
					<label class="radio-inline"><input type="radio" name="nivel" value="4" @if ($checklist->nivel == 4) checked @endif>Experto</label>
				</div>				
				<div class="form-group">
					<label for="usado_en">Proyecto en que se uso</label>
					<input type="text" name="usado_en" id="usado_en" class="form-control" value="{{ $checklist->usado_en }}">
				</div>
				<input type="submit" class="btn btn-primary" value="Grabar">		
			</form>			
		</div>
	</div>
@endsection