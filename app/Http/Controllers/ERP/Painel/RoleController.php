<?php

namespace App\Http\Controllers\ERP\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ERP\Painel\RoleRequest;
use App\Models\ERP\Painel\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Index
     */
    public function index()
    {
        $roles = $this->role->latest()->paginate(100000000);
        return view('erp.painel.pages.role.index', compact('roles'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('erp.painel.pages.role.create');
    }

    /**
     * store
     */
    public function store(RoleRequest $request)
    {
        if ($this->role->create($request->except('_token'))) {
            return redirect()->route('role.index')->with('success', 'Perfil cadastrado com sucesso');
        } else {
            return redirect()->route('role.index')->with('error', 'Falha ao cadastrar o perfil');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$role = $this->role->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.role.show', compact('role'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$role = $this->role->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('erp.painel.pages.role.edit', compact('role'));
    }

    /**
     * update
     */
    public function update(RoleRequest $request, $url)
    {
        if (!$role = $this->role->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($role->update($request->except('_token', '_method'))) {
            return redirect()->route('role.index')->with('success', 'Perfil editado com sucesso');
        } else {
            return redirect()->route('role.index')->with('error', 'Falha ao editar o perfil');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$role = $this->role->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($role->id <= '7') {
            return redirect()->back()->with('error', 'Você não pode deletar perfil padrão do sistema');
        }

        if ($role->delete()) {
            return redirect()->route('role.index')->with('danger', 'Perfil excluído com sucesso!');
        } else {
            return redirect()->route('role.index')->with('error', 'Falha ao excluir o perfil');
        }
    }
}
