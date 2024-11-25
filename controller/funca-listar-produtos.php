<?php
    function funcaoProdutos(){
        include("../model/connect.php");
        $query = mysqli_query($conexao,"SELECT * FROM produtos ORDER BY cod_produtos DESC");
        while($exibe = mysqli_fetch_array($query)){
            echo "
        <div class='cardItens'>    
            <form method='POST' action='' class='organizacaoForms'>
                <img src='./img/$exibe[3]' class='imgCards'>
                <h4>$exibe[1]</h4>
                <h3>R$$exibe[2],00</h3>
                <input type='hidden' name='cod_produtos' value='$exibe[0]'/>
                <button type='submit' name='produto_id' value='$exibe[1]' class='botaoadicionarcarrinho'>Adicionar ao Carrinho</button>
            </form>
        </div>";
        }
    };
?>