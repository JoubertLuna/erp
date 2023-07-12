<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\TipoMovimentoRequest;
use App\Models\ERP\Painel\TipoMovimento;

class TipoMovimentoController extends Controller
{
    private $tipomovimento;

    public function __construct(TipoMovimento  $tipomovimento)
    {
        $this->tipomovimento = $tipomovimento;
    }

    /**
     * Index
     */
    public function index()
    {
        $tipomovimentos = $this->tipomovimento->latest()->paginate(100000000);
        return view('erp.painel.pages.tipo_movimento.index', compact('tipomovimentos'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('erp.painel.pages.tipo_movimento.create');
    }

    /**
     * store
     */
    public function store(TipoMovimentoRequest $request)
    {
        if ($this->tipomovimento->create($request->except('_token'))) {
            return redirect()->route('tipomovimento.index')->with('success', 'Tipo do movimento cadastrado com sucesso');
        } else {
            return redirect()->route('tipomovimento.index')->with('error', 'Falha ao cadastrar o tipo do movimento');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$tipomovimento = $this->tipomovimento->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.tipo_movimento.show', compact('tipomovimento'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$tipomovimento = $this->tipomovimento->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.tipo_movimento.edit', compact('tipomovimento'));
    }

    /**
     * update
     */
    public function update(TipoMovimentoRequest $request, $url)
    {
        if (!$tipomovimento = $this->tipomovimento->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($tipomovimento->update($request->except('_token', '_method'))) {
            return redirect()->route('tipomovimento.index')->with('success', 'Tipo do movimento editado com sucesso');
        } else {
            return redirect()->route('tipomovimento.index')->with('error', 'Falha ao editar o tipo do movimento');
        }
    }

    /**
     * excluir
     */
    public function destroy(string $url)
    {
        if (!$tipomovimento = $this->tipomovimento->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($tipomovimento->id <= '10') {
            return redirect()->back()->with('error', 'Você não pode deletar um tipo de movimento padrão do sistema');
        }

        if ($tipomovimento->delete()) {
            return redirect()->route('tipomovimento.index')->with('danger', 'Tipo do movimento excluído com sucesso!');
        } else {
            return redirect()->route('tipomovimento.index')->with('error', 'Falha ao excluir o tipo do movimento');
        }
    }
}
