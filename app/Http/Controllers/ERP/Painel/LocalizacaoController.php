<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\LocalizacaoRequest;
use App\Models\ERP\Painel\Localizacao;

class LocalizacaoController extends Controller
{
    private $localizacao;

    public function __construct(Localizacao $localizacao)
    {
        $this->localizacao = $localizacao;
    }

    /**
     * Index
     */
    public function index()
    {
        $localizacaos = $this->localizacao->latest()->paginate(100000000);
        return view('erp.painel.pages.localizacao.index', compact('localizacaos'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('erp.painel.pages.localizacao.create');
    }

    /**
     * store
     */
    public function store(LocalizacaoRequest $request)
    {
        if ($this->localizacao->create($request->except('_token'))) {
            return redirect()->route('localizacao.index')->with('success', 'Localização do produto cadastrada com sucesso');
        } else {
            return redirect()->route('localizacao.index')->with('error', 'Falha ao cadastrar a localização do produto');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$localizacao = $this->localizacao->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.localizacao.show', compact('localizacao'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$localizacao = $this->localizacao->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.localizacao.edit', compact('localizacao'));
    }

    /**
     * update
     */
    public function update(LocalizacaoRequest $request, $url)
    {
        if (!$localizacao = $this->localizacao->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($localizacao->update($request->except('_token', '_method'))) {
            return redirect()->route('localizacao.index')->with('success', 'Localização do produto editada com sucesso');
        } else {
            return redirect()->route('localizacao.index')->with('error', 'Falha ao editar a localização do produto');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$localizacao = $this->localizacao->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($localizacao->delete()) {
            return redirect()->route('localizacao.index')->with('danger', 'Localização do produto excluída com sucesso!');
        } else {
            return redirect()->route('localizacao.index')->with('error', 'Falha ao excluir a localização do produto');
        }
    }
}
