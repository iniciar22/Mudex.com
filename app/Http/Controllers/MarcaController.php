<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Marca;

class MarcaController extends Controller {

    public function getMarca($id = null) {
        if ($id == null) {
            $models['marcas'] = Marca::all();
            return view('frente.marcas', $models);
        }
        
        // se um id foi passado
        $models['marca'] = \Shoppvel\Models\Marca::find($id);
        return view('frente.produtos-marca', $models);
    }
	public function listar(){
		$marcas= Marca::all();

		return view('admin.marca')->with('marcas',$marcas);
	
	}


	public function novo(){
		return view('admin.form_marca');
	}


	public function adiciona(Request $r) {

        $this->validate($r, [
            'nome' => 'required|min:2|unique:marcas',
        ]);

        Marca::create($r->input());
        return redirect('admin/marca')->with('mensagem-sucesso', 'Marca incluída com sucesso');
    }

    public function alterar(Marca $marca,$id){
    	//pesquisa a marca pelo id

    	$marca=$marca->find($id);

    	if($marca !=null){
    		$data['marcas']=$marca;
    		return view('/admin.editarmarca', $data);
    	}
    	else{
    		return redirect('admin/marca');
    	}
    }

    public function salvar(Request $request, Marca $marca){
    	//verifica se existe o id para a alteracao

    	if($request->has('id')){
    		$marcas= $marca->find($request->get('id'));

    		if($marcas !=null){
                $this->validate($request, [
                     'nome' => 'required|min:3|alpha|unique:marcas',]);
                $marcas->update($request->all());
                
    			return redirect('admin/marca')->with('mensagem-sucesso','Marca ' . ' Alterada com Sucesso');
    		}
                       

    	}

    	$marcas->create($request->all());
    	return redirect('admin/marca');
    }
    public function excluir(Marca $marca,$id){

        $marca=$marca->find($id);

        if($marca !=null){
            $data['marcas']=$marca;
            return view('admin.excluir_marca', $data);
        }

        else{
            return redirect('admin/marca');
        }
      
    }

    public function destroy(Request $request, Marca $marca){
        if($request->has('id')){
            $marcas= $marca->find($request->get('id'));

            if($marcas !=null){
               
                $marcas->delete($request->all());
                
                return redirect('admin/marca')->with('mensagem-sucesso','Marca ' . ' Excluida com Sucesso');
            }

  

        }
         return redirect('admin/marca');

    }
 

}