@extends('layouts.admin')

@section('conteudo')
<h2>Marcas Cadastradas</h2>

	{!! Form::open(array('url' => 'admin/marca/excluir')) !!}
	<p>
	{!! Form::label('nome', 'Nome da Marca') !!}<br/>
	{!! Form::textarea('nome') !!}<br/>
	{!! Form::submit('Cadastrar') !!}
	</p>
	{!! Form::close() !!}

@stop