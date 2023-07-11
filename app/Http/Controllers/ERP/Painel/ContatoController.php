<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\ContatoRequest;
use App\Models\ERP\Painel\Contato;

class ContatoController extends Controller
{
    private $contato;

    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Index
     */
    public function index()
    {
        $contatos = $this->contato->latest()->paginate(100000000);
        return view('erp.painel.pages.contato.index', compact('contatos'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('erp.painel.pages.contato.create');
    }

    /**
     * store
     */
    public function store(ContatoRequest $request)
    {
        if ($this->contato->create($request->except('_token'))) {
            return redirect()->route('contato.index')->with('success', 'Contato cadastrado com sucesso');
        } else {
            return redirect()->route('contato.index')->with('error', 'Falha ao cadastrar o contato');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$contato = $this->contato->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.contato.show', compact('contato'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$contato = $this->contato->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.contato.edit', compact('contato'));
    }

    /**
     * update
     */
    public function update(ContatoRequest $request, $url)
    {
        if (!$contato = $this->contato->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($contato->update($request->except('_token', '_method'))) {
            return redirect()->route('contato.index')->with('success', 'Contato editado com sucesso');
        } else {
            return redirect()->route('contato.index')->with('error', 'Falha ao editar o contato');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$contato = $this->contato->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($contato->delete()) {
            return redirect()->route('contato.index')->with('danger', 'Contato excluído com sucesso!');
        } else {
            return redirect()->route('contato.index')->with('error', 'Falha ao excluir o contato');
        }
    }
}
