@extends('layouts.frente-loja')

@section('conteudo')


   
    <table class="table table-striped table-bordered table-hover ">
    <h2>Listagem de Categorias</h2><br>

    <tr>
        
        <td class="success">NOME</td>
        
    </tr>
    <div class="col-sm-6 col-md-4">

    <ul>
         @foreach ($categorias as $cat)
       
           <tr>
               <td> <a href="{{route('categoria.listar', $cat->id)}}">                              {{$cat->nome}}</a></td>
           </tr>
           
           
       
        @endforeach
    </ul>
</div>
@stop

