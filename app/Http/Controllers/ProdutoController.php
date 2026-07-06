<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // 1. LISTAR PRODUTOS (Garante que a página não fique vazia)
    public function index()
    {
      $produtos = Produto::all();
        return view('produtos', compact('produtos')); // Abre a tela HTML passando os produtos
    }

    // 2. SALVAR NOVO PRODUTO
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Produto::create($request->all()); // Salva no banco de dados

        return redirect()->route('produtos.index');
    }

    // 3. EXIBIR TELA DE EDIÇÃO
    public function edit($id)
    {
       $produto = Produto::findOrFail($id);
        return view('edit', compact('produto'));
    }

    // 4. ATUALIZAR NO BANCO
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }

    // 5. REMOVER DO BANCO
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete(); // Deleta o registro

        return redirect()->route('produtos.index');
    }
}