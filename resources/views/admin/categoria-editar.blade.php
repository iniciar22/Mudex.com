@extends('layouts.admin')
@extends('layouts.master')

@section('conteudo')
<h2>Editar Categoria {{ $categoria->id }} </h2>

    {!! Form::model($categoria, array('url' => array('admin/categoria/salvar'))) !!}
    <p>
        {!! Form::label('categoria_id', 'Categoria Pai') !!}<br><br>

        {{ Form::select('categoria_id',$categorias, null, ['placeholder' => 'Selecione', 'class' => 'form-control'], $categoria->lists('nome', 'id'))}}<br><br>

        {!! Form::hidden('nome_pai','null',['id' => 'nome_pai']) !!}

        {!! Form::label('nome', 'Nome da Categoria') !!}<br/><br>
        {!! Form::text('nome',null, ['class' => 'form-control']) !!}<br>

        
        {!! Form::hidden('id') !!}<br>
        {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
    </p>
    {!! Form::close() !!}

    <script type="text/javascript">
        $("#nome_pai").val("-");
        $(document).ready(function(){
            $("body").on("change", function(){
                var valor = $("#select_pai option:selected").text();
                if(valor == "Selecione"){
                    $("#nome_pai").val(".");
                }else{
                    $("#nome_pai").val(valor);
                }
            });
        });
    </script>
@stop