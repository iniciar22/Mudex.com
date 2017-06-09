@extends('layouts.admin')

@section('conteudo')


<h1>
	 Excluir a Categoria: {{$categorias->nome}} <br />
     
</h1>

 {!!Form::model($categorias, array('url'=> array('admin/categorias/destroy')))!!}



	{!! Form::hidden('id')!!}<br/>
	{!! Form::submit('Confirmar', array('name' => 'confirmaExclusao', 'class'=>'btn btn-primary'))!!}
	<a href="{{url('admin/categoria')}}"  class="btn btn-default">Cancelar</a>
	

	{!! Form::close() !!}

@stop