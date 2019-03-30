<?php

namespace paineladm\Http\Controllers;

use Request;
use paineladm\Empresa;
use paineladm\Funcionario;
use Storage;
use paineladm\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');

        //$this->middleware('nosso-middleware',['only' => ['adiciona', 'remove']]);
        //$this->middleware('auth', ['only' => ['adiciona', 'remove']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.listagem')->with('empresas',$empresas);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.form_new_empresa')->with('empresas', Empresa::all());
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
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return "Esse produto não existe";
        }

        return view('empresa.form_edit_empresa')->with('empresa',$empresa);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresaRequest $request)
    {
        $params = Request::all();

        if(isset($params['id'])) {
            $empresa = Empresa::find($params['id']);
            $empresa->nome = $params['nome'];
            $empresa->email = $params['email'];;
            $empresa->logo = $params['logo'];;
            $empresa->website = $params['website'];;
            $empresa->save();
        } else {

            Empresa::create($request->all());
        }

        return redirect()->action('EmpresaController@index');
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
        $empresa = Empresa::find($id);
        $empresa->delete();
        return redirect()->action('EmpresaController@index');
    }
}
