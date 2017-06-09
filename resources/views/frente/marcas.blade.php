@extends('layouts.frente-loja')

@section('conteudo')


   
    <table class="table table-striped table-bordered table-hover ">
    <h2>Listagem de Marcas</h2><br>

    <tr>
        
        <td class="success">NOME</td>
        
    </tr>
    <div class="col-sm-6 col-md-4">

    <ul>
         @foreach ($marcas as $marc)
       
           <tr>
               <td> <a href="{{route('marca.listar', $marc->id)}}">                     {{$marc->nome}}</a></td>
           </tr>
           
           
       
        @endforeach
    </ul>
</div>
@stop

