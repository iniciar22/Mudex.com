@extends('layouts.admin')

@section('conteudo')
<h2>Nova Marca</h2>

	{!! Form::open(array('url' => 'admin/marca/salvar')) !!}
	<p>
		{!! Form::label('nome', 'Nome da Marca') !!}<br/>
		{!! Form::text('nome') !!}<br/><br/>
		{!! Form::submit('Cadastrar',['class'=> 'btn btn-default']) !!}
		<a href="{{route('admin.marca')}}" class="btn btn-default">Cancelar</a>
	</p>
	{!! Form::close() !!}


@stop