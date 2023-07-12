<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\ProdutoLocalizacaoRequest;
use App\Models\ERP\Painel\{
    Localizacao,
    Produto,
    ProdutoLocalizacao,
};

class ProdutoLocalizacaoController extends Controller
{
    private $produtoLocalizacao, $produto, $localizacao;

    public function __construct(ProdutoLocalizacao  $produtoLocalizacao, Produto $produto, Localizacao $localizacao)
    {
        $this->produtoLocalizacao = $produtoLocalizacao;
        $this->produto = $produto;
        $this->localizacao = $localizacao;
    }

    /**
     * Index
     */
    public function index()
    {
        $produtoLocalizacaos = $this->produtoLocalizacao->lista();
        $produtos = $this->produto->all('id', 'produto');
        $localizacaos = $this->localizacao->all('id', 'localizacao');
        return view('erp.painel.pages.produto_localizacao.index', compact('produtoLocalizacaos', 'localizacaos', 'produtos'));
    }

    /**
     * create
     */
    public function create()
    {
        $produtos = $this->produto->all('id', 'produto');
        $localizacaos = $this->localizacao->all('id', 'localizacao');
        return view('erp.painel.pages.produto_localizacao.create', compact('localizacaos', 'produtos'));
    }

    /**
     * store
     */
    public function store(ProdutoLocalizacaoRequest $request)
    {
        $data = $request->except('_token');
        $valid = ProdutoLocalizacao::where('produto_id', $data['produto_id'])->where('localizacao_id', $data['localizacao_id'])->first();

        if (!$valid) {
            $this->produtoLocalizacao->create($data);
            return redirect()->route('produtolocalizacao.index')->with('success', 'Localização do produto cadastrada com sucesso');
        } else {
            return redirect()->route('produtolocalizacao.create')->with('error', 'Localização ocupada');
        }
    }

    /**
     * show
     */
    public function show($id)
    {
        if (!$produtoLocalizacao = $this->produtoLocalizacao->where('id', $id)->first()) {
            return redirect()->back();
        }
        $produtos = $this->produto->all('id', 'produto');
        $localizacaos = $this->localizacao->all('id', 'localizacao');
        return view('erp.painel.pages.produto_localizacao.show', compact('produtoLocalizacao', 'produtos', 'localizacaos'));
    }

    /**
     * edit
     */
    public function edit($id)
    {
        if (!$produtoLocalizacao = $this->produtoLocalizacao->where('id', $id)->first()) {
            return redirect()->back();
        }
        $produtos = $this->produto->all('id', 'produto');
        $localizacaos = $this->localizacao->all('id', 'localizacao');
        return view('erp.painel.pages.produto_localizacao.edit', compact('produtoLocalizacao', 'localizacaos', 'produtos'));
    }

    /**
     * update
     */
    public function update(ProdutoLocalizacaoRequest $request, $id)
    {
        if (!$produtoLocalizacao = $this->produtoLocalizacao->where('id', $id)->first()) {
            return redirect()->back();
        }

        if ($produtoLocalizacao->update($request->except('_token', '_method'))) {
            return redirect()->route('produtolocalizacao.index')->with('success', 'Localização do produto editada com sucesso');
        } else {
            return redirect()->route('produtolocalizacao.index')->with('error', 'Falha ao editar a localização do produto');
        }
    }

    /**
     * excluir
     */
    public function destroy(string $id)
    {
        if (!$produtoLocalizacao = $this->produtoLocalizacao->where('id', $id)->first()) {
            return redirect()->back();
        }

        if ($produtoLocalizacao->delete()) {
            return redirect()->route('produtolocalizacao.index')->with('danger', 'Localização do produto excluída com sucesso!');
        } else {
            return redirect()->route('produtolocalizacao.index')->with('error', 'Falha ao excluir a localização do produto');
        }
    }
}
