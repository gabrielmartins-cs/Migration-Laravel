<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            font-size: 14px;
            background-color: #ff2d20; /* Cor padrão do Laravel */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover { background-color: #e0261d; }
        
        /* Botões de Ação */
        .btn-edit { background-color: #4CAF50; }
        .btn-edit:hover { background-color: #45a049; }
        .btn-delete { background-color: #333; }
        .btn-delete:hover { background-color: #111; }
        
        .produto-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        .produto-item:last-child { border-bottom: none; }
        .acoes { display: flex; gap: 10px; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Adicionar Novo Produto</h2>
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf 
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <textarea name="descricao" placeholder="Descrição (Opcional)" rows="3"></textarea>
            <button type="submit">Salvar Registro</button>
        </form>
    </div>

    <div class="container">
        <h2>Lista de Produtos</h2>
        
        @if(isset($produtos) && $produtos->isEmpty())
            <p>Nenhum produto cadastrado ainda.</p>
        @elseif(isset($produtos))
            @foreach($produtos as $produto)
                <div class="produto-item">
                    <div>
                        <strong>{{ $produto->nome }}</strong>
                        <p style="margin: 5px 0; font-size: 14px; color: #666;">{{ $produto->descricao }}</p>
                    </div>
                    
                    <div class="acoes">
                        <a href="{{ route('produtos.edit', $produto->id) }}">
                            <button class="btn-edit">Editar</button>
                        </a>
                        
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar?');">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn-delete">Remover</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Os produtos ainda não foram carregados do banco de dados.</p>
        @endif
    </div>

</body>
</html>