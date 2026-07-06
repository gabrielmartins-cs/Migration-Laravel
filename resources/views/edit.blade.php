<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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
            background-color: #4CAF50; /* Cor verde para edição */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover { background-color: #45a049; }
        .btn-voltar {
            display: inline-block;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-voltar:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Editar Produto</h2>
        
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf 
            @method('PUT') <input type="text" name="nome" placeholder="Nome do Produto" value="{{ $produto->nome }}" required>
            
            <textarea name="descricao" placeholder="Descrição (Opcional)" rows="3">{{ $produto->descricao }}</textarea>
            
            <button type="submit">Atualizar Registro</button>
        </form>

        <a href="{{ route('produtos.index') }}" class="btn-voltar">← Voltar para a lista</a>
    </div>

</body>
</html>