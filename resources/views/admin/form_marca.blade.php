
@extends('layouts.admin')

@section('conteudo')





	<h1>Nova Marca</h1>
	{{Form::open(array('url'=>'admin/marca/adiciona', 'method'=>'POST'), array('role'=> 'form'))}}
	
		<div class="form-group">
			
			{{Form::label('nome','Nome da Marca')}}
			{{Form::text('nome', null, array('placeholder'=>'Digite aqui', 'class'=>'form-control'))}}<br>
			{{Form::Button('Cadastrar', array('type'=>'submit', 'class'=>'btn btn-primary '))}}
			<a href="{{url('admin/marca')}}" class="btn btn-default">Cancelar</a>
		</div>
	{{Form::close()}}





@stop




