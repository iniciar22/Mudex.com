<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {


	protected $table='categorias';
    protected $fillable= array('nome','categoria_id');

    public function produtos() {
        return $this->hasMany(Produto::class);
    }

    protected static function boot(){
    	parent::boot();

    	static::deleting(function($cat){

    		if($cat->produtos()->count()>0){
    			return abort(401);
    			
    		}

    	});
    }

    

}
