@extends('layouts.admin')

@section('conteudo')


<h1>
	 Excluir a Produto: {{$produtos->nome}} <br />
     
</h1>

 {!!Form::model($produtos, array('url'=> array('admin/produtos/destroy')))!!}



	{!! Form::hidden('id')!!}<br/>
	{!! Form::submit('Confirmar', array('name' => 'confirmaExclusao', 'class'=>'btn btn-primary'))!!}
	<a href="{{url('admin/produto')}}"  class="btn btn-default ">Cancelar</a>
	

	{!! Form::close() !!}

@stop