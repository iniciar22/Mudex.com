@extends('layouts.admin')

@section('conteudo')


<h1>
	 Excluir a Marca: {{$marcas->nome}} <br />
     
</h1>

 {!!Form::model($marcas, array('url'=> array('admin/marcas/destroy')))!!}



	{!! Form::hidden('id')!!}<br/>
	{!! Form::submit('Confirmar', array('name' => 'confirmaExclusao', 'class'=>'btn btn-primary'))!!}
	<a href="{{url('admin/marca')}}" class="btn btn-default">Cancelar</a>
	

	{!! Form::close() !!}

@stop