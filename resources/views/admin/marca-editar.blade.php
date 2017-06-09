@extends('layouts.admin')

@section('conteudo')
<h2>Editar Marca {{$marca->id}}</h2>

	{!! Form::model($marca, array('url' => array('admin/marca/salvar'))) !!}
	<p>
		{!! Form::label('nome', 'Nome da Marca') !!}<br/>
		{!! Form::text('nome') !!}
		{!! Form::hidden('id') !!}<br>
		{!! Form::submit('Salvar') !!}
	</p>
	{!! Form::close() !!}


@stop