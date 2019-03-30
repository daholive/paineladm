<?php

namespace paineladm\Http\Controllers;

use Request;
use paineladm\Empresa;
use paineladm\Funcionario;
use Storage;
use paineladm\Http\Requests\FuncionarioRequest;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    private $totalPage = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$funcionarios = Funcionario::all();
        $funcionarios = DB::select('SELECT e.nome as empresa, e.id as empresa_id, f.* FROM empresas e INNER JOIN funcionarios f ON e.id = f.empresa_id');
        return view('funcionario.listagem',['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.form_new_funcionario')->with('empresas', Empresa::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        $empresas = DB::select('select id, nome from empresas');
        if(empty($funcionario)){
            return "Esse produto não existe";
        }

        return view('funcionario.form_edit_funcionario',['funcionario' => $funcionario, 'empresas' => $empresas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FuncionarioRequest $request)
    {
        $params = Request::all();

        if(isset($params['id'])) {
            $funcionario = Funcionario::find($params['id']);
            $funcionario->nome = $params['nome'];
            $funcionario->email = $params['email'];;
            $funcionario->telefone = $params['telefone'];;
            $funcionario->cpf = $params['cpf'];;
            $funcionario->empresa_id = $params['empresa_id'];
            $funcionario->save();

        } else {

            Funcionario::create($request->all());
        }

        return redirect()->action('FuncionarioController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$id = Request::route('id');
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        return redirect()->action('FuncionarioController@index');
    }
}
