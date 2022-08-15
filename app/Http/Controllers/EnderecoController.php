<?php

namespace App\Http\Controllers;

use App\Models\Cep;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Canducci\ZipCode\Facades\ZipCode;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;



class EnderecoController extends Controller
{
    /**
     * Instância dos usuários
    */
    protected $enderecos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Endereco $enderecos)
    {
        $this->enderecos = $enderecos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endereco = $this->enderecos->all();
        $model = [];
        $options = [
            'viewName' => '_grid',
        ];

        return view('endereco.index', compact('model', 'options'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Endereco();
        $options = [
            'viewName' => '_form',
            'method' => 'POST',
            'route'  => route('endereco.store')
        ];

        return view('endereco.index', compact('model', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {

            $model = new Endereco();

            $model->cod_cep =  $request->cod_cep;
            $model->fill($request->all());

            $model->save();

            return redirect(route('endereco.index'))->with('success', trans('messages.saved'));

        } catch (Exception $ex)
        {
             return back()->with(trans('messages.create_failed'));
           
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->enderecos->findOrFail($id);

        $options = [
            'viewName' => '_show',
            'method' => 'SHOW',
        ];

        return view('endereco.index', compact('model', 'options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->enderecos->findOrFail($id);
        $options = [
            'viewName' => '_form',
            'method' => 'PATCH',
            'route'  => route('endereco.update', $model->cod_id),
        ];

        return view('endereco.index', compact('model', 'options'));
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
        try
        {
            $model = $this->enderecos->findOrFail($id);

            $data = $request->all();

            $model->fill($data)->update();
            return redirect(route('endereco.index'))->with('success', trans('messages.edited'));

        } catch (Exception $ex)
        {

            return response(['message' => trans('messages.update_failed')]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $model = $this->enderecos->findOrFail($id);

            $model->delete();

            return response(['message' => trans('messages.deleted'), 'response' => 'ok']);

        } catch (Exception $ex) {
            return response(['message' => trans('messages.delete_failed')]);
        }
    }

    public function ajaxDataTable()
    {
        $endereco = $this->enderecos->select();
        $dataTable = DataTables::of($endereco);

        $dataTable
        ->addColumn('actions', function ($endereco) {
            $actionColumns = '<a href="'. route('endereco.show', $endereco->cod_id) .'" class="m-r-5 button-view"  title='. ' data-toggle="tooltip" data-placement="top">
                            <i class="anticon anticon-eye"></i>
                        </a>';

            $actionColumns .= '<a href="'. route('endereco.edit', $endereco->cod_id) .'" class="m-r-5 button-edit" title='. ' data-toggle="tooltip" data-placement="top">
                        <i class="anticon anticon-edit"></i>
                    </a>';

            $actionColumns .= '<a class="delete-button button-delete" data-name="" data-id="' . $endereco->cod_id . '" data-method="DELETE" data-item="' .  '"
                        title="' . trans('labels.delete') . '" data-toggle="tooltip" data-placement="top" onclick="deleteRegister(this)"
                        href="#"
                        data-href="' . route('endereco.destroy', $endereco->cod_id) . '">
                            <i class="anticon anticon-delete"></i>
                </a>';


                return $actionColumns;
            });

        return $dataTable->rawColumns(['actions'])->make(true);

    }
}
