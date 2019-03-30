<?php

namespace paineladm;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    public $timestamps = false;
    protected $fillable = array('nome', 'email', 'logo', 'website');

    protected $guarded = ['id'];

    public function funcionarios(){
        return $this->hasMany('paineladm\Funcionario');
    }
}
