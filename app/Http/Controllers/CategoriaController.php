<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Categoria;

class CategoriaController extends Controller {

    public function getCategoria($id = null) {
        if ($id == null) {
            $models['categorias'] = Categoria::all();
            return view('frente.categorias', $models);
        }
        
        // se um id foi passado
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id);
        return view('frente.produtos-categoria', $models);
    }

    public function listar(){

        $categorias= Categoria::all();

		return view('admin.categoria')->with('categorias',$categorias);

    }

    public function nova(){
    	return view('admin.form_categoria');
    }

    public function adiciona(Request $r){
    	 $this->validate($r, [
            'nome' => 'required|min:2|unique:categorias',
        ]);

        Categoria::create($r->input());
        return redirect('admin/categoria')->with('mensagem-sucesso', 'Categoria incluída com sucesso!');
    }


    public function alterar(Categoria $categoria,$id){
        //pesquisa a categoria pelo id

        $categoria=$categoria->find($id);

        if($categoria !=null){
            $data['categorias']=$categoria;
            return view('admin.editarcategoria', $data);
        }
        else{
            return redirect('admin/categoria');
        }
    }

    public function salvar(Request $request, Categoria $categoria){
        //verifica se existe o id para a alteracao

        if($request->has('id')){
            $categorias= $categoria->find($request->get('id'));

            if($categorias !=null){
               
                $categorias->update($request->all());
                
                return redirect('admin/categoria')->with('mensagem-sucesso','Categoria ' . ' Alterada com Sucesso !!');
            }

  

        }

        $categorias->create($request->all());
        return redirect('admin/categoria');
    }

    public function excluir(Categoria $categoria,$id){

        $categoria=$categoria->find($id);

        if($categoria !=null){
            $data['categorias']=$categoria;
            return view('admin.excluir_categoria', $data);
        }

        else{
            return redirect('admin/categoria');
        }
      
    }

    public function destroy(Request $request, Categoria $categoria){
        if($request->has('id')){
            $categorias= $categoria->find($request->get('id'));

            if($categorias !=null){
               
                $categorias->delete($request->all());
                
                return redirect('admin/categoria')->with('mensagem-sucesso','Categoria ' . ' Excluida com Sucesso !!');
            }

  

        }
         return redirect('admin/categoria');

    }

}
