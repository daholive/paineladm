<?php

namespace paineladm;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    public $timestamps = false;
    protected $fillable = array('nome', 'email', 'telefone', 'cpf','empresa_id');

    protected $guarded = ['id'];

    public function empresas(){
        return $this->belongsTo('paineladm\Empresa');
    }
}
