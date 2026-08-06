<?php
    require_once "/func/funcoes.php";

    if(isset($_POST['enviar'])){
        $resultado = uploadImg($_FILES['Imagem']);

        if($resultado){
            echo "Upload realizado com sucesso.";
        } else{
            echo "Erro no upload.";
        }
    }
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="img">
    <button type="submit" name="enviar">Enviar Imagem</button>
</form>
