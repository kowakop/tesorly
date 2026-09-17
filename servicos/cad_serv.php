

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Cadastro de Serviços</title>
</head>
<body>

    <p>Equipe Sarolau</p>
    
    <button><a href="index.html">◀️</a></button>

    <img src="logo_tesorly.png" alt="Logo Tesorly">

    <img src="foto.png" alt="foto produtos">

    <form action="save_servicos.php" method="POST" enctype="multipart/form-data">

        <div class="form-content">
            <label for="servico">Serviço oferecido:</label>
            <input type="text" id="servico" name="servico">
        </div>

        <div class="form-content">
            <label for="valor">Valor:</label>
            <input type="number" id="valor" name="valor">
        </div>

        <div class="form-content">
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao">
        </div>

        <div class="form-content">
            <label for="tempo">Tempo de Serviço:</label>
            <input type="time" id="tempo" name="tempo">
        </div>

         <>
        <label>Foto do Produto: </label><br>
        <input type="file" name="fotos" accept="image/*" required>
         </p>

        <input type="submit" value="Adicionar Produto" id="add_prod"><a href="cad_prod.html">Adicionar Produto</a>
        <input type="submit" name="enviar" value="Finalizar Cadastro" id="cadastro">
    </form>
</body>
</html>