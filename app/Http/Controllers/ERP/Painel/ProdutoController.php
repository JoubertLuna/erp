<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\ProdutoRequest;

use App\Models\ERP\Painel\{
    Categoria,
    Produto,
    Unidade
};
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    private $produto, $categoria, $unidade;

    public function __construct(Produto $produto, Categoria $categoria, Unidade $unidade)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
        $this->unidade = $unidade;
    }

    /**
     * Index
     */
    public function index()
    {
        $produtos = $this->produto->with('categoria', 'unidade')->latest()->paginate(100000000);

        $categorias = $this->categoria->all('id', 'categoria');
        $unidades = $this->unidade->all('id', 'unidade');
        return view('erp.painel.pages.produto.index', compact('categorias', 'unidades', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = $this->categoria->all('id', 'categoria');
        $unidades = $this->unidade->all('id', 'unidade');
        return view('erp.painel.pages.produto.create', compact('categorias', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nome_imagem = $request->image->getClientOriginalName();
            $request->image->storeAs('Produto', $nome_imagem);
        } else {
            $nome_imagem = 'default.png';
        }

        $data = $request->except('_token');
        $data['image'] = $nome_imagem;

        if ($this->produto->create($data)) {
            return redirect()->route('produto.index')->with('success', 'Produto cadastrado com sucesso');
        } else {
            return redirect()->route('produto.index')->with('error', 'Falha ao cadastrar o produto');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$produto = $this->produto->with('categoria', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $categorias = $this->categoria->all('id', 'categoria');
        $unidades = $this->unidade->all('id', 'unidade');
        return view('erp.painel.pages.produto.show', compact('categorias', 'unidades', 'produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $url)
    {
        if (!$produto = $this->produto->with('categoria', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        $categorias = $this->categoria->all('id', 'categoria');
        $unidades = $this->unidade->all('id', 'unidade');
        return view('erp.painel.pages.produto.edit', compact('categorias', 'unidades', 'produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $url)
    {
        if (!$produto = $this->produto->with('categoria', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        //Update de Imagem
        if ($request->image) {
            if (Storage::exists($produto->image)) {
                Storage::delete($produto->image);
            }

            $nome_imagem_edit = $request->image->getClientOriginalName();
            $request->image->storeAs('Produto', $nome_imagem_edit);
        } elseif ($request->image === null) {
            $nome_imagem_edit = $produto['image'];
        } else {
            $nome_imagem_edit = 'default.png';
        }
        //Update de Imagem

        $data = $request->except('_token', '_method');
        $data['image'] = $nome_imagem_edit;

        if ($produto->update($data)) {
            return redirect()->route('produto.index')->with('success', 'Produto editado com sucesso');
        } else {
            return redirect()->route('produto.index')->with('error', 'Falha ao editar o produto');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$produto = $this->produto->with('categoria', 'unidade')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($produto->delete()) {
            return redirect()->route('produto.index')->with('danger', 'Produto excluído com sucesso!');
        } else {
            return redirect()->route('produto.index')->with('error', 'Falha ao excluir o produto');
        }
    }
}
