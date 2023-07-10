<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\UnidadeRequest;
use App\Models\ERP\Painel\Unidade;

class UnidadeController extends Controller
{
    private $unidade;

    public function __construct(Unidade $unidade)
    {
        $this->unidade = $unidade;
    }

    /**
     * Index
     */
    public function index()
    {
        $unidades = $this->unidade->latest()->paginate(100000000);
        return view('erp.painel.pages.unidade.index', compact('unidades'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('erp.painel.pages.unidade.create');
    }

    /**
     * store
     */
    public function store(UnidadeRequest $request)
    {
        if ($this->unidade->create($request->except('_token'))) {
            return redirect()->route('unidade.index')->with('success', 'Unidade cadastrada com sucesso');
        } else {
            return redirect()->route('unidade.index')->with('error', 'Falha ao cadastrar a unidade');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$unidade = $this->unidade->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.unidade.show', compact('unidade'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$unidade = $this->unidade->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.unidade.edit', compact('unidade'));
    }

    /**
     * update
     */
    public function update(UnidadeRequest $request, $url)
    {
        if (!$unidade = $this->unidade->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($unidade->update($request->except('_token', '_method'))) {
            return redirect()->route('unidade.index')->with('success', 'Unidade editada com sucesso');
        } else {
            return redirect()->route('unidade.index')->with('error', 'Falha ao editar a unidade');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {
        if (!$unidade = $this->unidade->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($unidade->delete()) {
            return redirect()->route('unidade.index')->with('danger', 'Unidade excluída com sucesso!');
        } else {
            return redirect()->route('unidade.index')->with('error', 'Falha ao excluir a unidade');
        }
    }
}
