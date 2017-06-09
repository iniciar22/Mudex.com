<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marcas';
   

    protected $fillable= array('nome');

    public function produtos() {
        return $this->hasMany(Produto::class);
    }

     protected static function boot(){
    	parent::boot();

    	static::deleting(function($marca){

    		if($marca->produtos()->count()>0){
    			return abort(402);
    			
    		}

    	});
    }
}
