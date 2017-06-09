@extends('layouts.admin')
@extends('layouts.master')

@section('conteudo')
<h2>Nova Categoria</h2>

	{!! Form::open(array('url' => 'admin/categoria/salvar')) !!}
	<p>
		{!! Form::label('select_pai', 'Categoria Pai') !!}<br>
		{{ Form::select('select_pai',$categoria, null,['placeholder' => 'Selecione', 'class' => 'form-control'], array(['nome'])) }}<br><br>
		{!! Form::hidden('nome_pai', 'null', ['id' => 'nome_pai']) !!}<br/>
		{!! Form::label('nome', 'Nome da Categoria') !!}<br/>
		{!! Form::text('nome',null, ['class' => 'form-control']) !!}<br>
		{!! Form::submit('Cadastrar',['class'=> 'btn btn-default'])!!}
		<a href="{{route('admin.categoria')}}" class="btn btn-default">Cancelar</a>
	</p>
	{!! Form::close() !!}
	<script type="text/javascript">
		$("#nome_pai").val(".");
		$(document).ready(function() {
			$("body").on("change", function(){
				var valor = $("#select_pai option:selected").text();
				if (valor == "Selecione") {
					$("#nome_pai").val(".");
				}else{
					$("#nome_pai").val(valor);
				}
			});
		});
	</script>
@stop