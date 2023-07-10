<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\CategoriaRequest;
use App\Models\ERP\Painel\Categoria;

class CategoriaController extends Controller
{
    private $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Index
     */
    public function index()
    {
        $categorias = $this->categoria->latest()->paginate(100000000);
        return view('erp.painel.pages.categoria.index', compact('categorias'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('erp.painel.pages.categoria.create');
    }

    /**
     * store
     */
    public function store(CategoriaRequest $request)
    {
        if ($this->categoria->create($request->except('_token'))) {
            return redirect()->route('categoria.index')->with('success', 'Categoria cadastrada com sucesso');
        } else {
            return redirect()->route('categoria.index')->with('error', 'Falha ao cadastrar a categoria');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.categoria.show', compact('categoria'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.categoria.edit', compact('categoria'));
    }

    /**
     * update
     */
    public function update(CategoriaRequest $request, $url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($categoria->update($request->except('_token', '_method'))) {
            return redirect()->route('categoria.index')->with('success', 'Categoria editada com sucesso');
        } else {
            return redirect()->route('categoria.index')->with('error', 'Falha ao editar a categoria');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {
        if (!$categoria = $this->categoria->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($categoria->delete()) {
            return redirect()->route('categoria.index')->with('danger', 'Categoria excluída com sucesso!');
        } else {
            return redirect()->route('categoria.index')->with('error', 'Falha ao excluir a categoria');
        }
    }
}
