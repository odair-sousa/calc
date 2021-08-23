<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dbe2984bbb.js"></script>
    <link rel="stylesheet" type="text/css" href="../view/templates/estilos.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../view/templates/script.js"></script>
    <title>Calculadora</title>
</head>
<body>
    <h4>
        <ul class="local-historico">
        {foreach $historico as $his}
            <li title="{$his.1}"><button class="historico"><numero>{$his.0}</numero> = {$his.2}</button></li>
        {/foreach}
        </ul>
    </h4>
    <div class="geral">

        <form id="calcula" name="calcula" class="calc">
            <input class="visor" id="tela" type="text"/>
        </form> 

        <form method="POST">
        <table class="corpo">
                
            <tr id="teste" action="" method="post">
                <td><input id="borracha" class="btn" type="button" value="C" onclick="deleteAll()"></td>
                <td><button type="button" id="limpar" class="fas fa-backspace btn"></button></td>
                <td><input id="porcento" class="btn" type="button" value="%" onclick="nume('%')"></td>
                <td><input  id="dividir" class="btn" type="button" value="/" onclick="nume('/')"></td>
            </tr>
            <tr id="form1">
                <td><input id="sete" class="num" type="button" value="7" onclick="nume(7)"/></td>
                <td><input id="oito" class="num" type="button" value="8" onclick="nume(8)"></td>
                <td><input id="nove" class="num" type="button" value="9" onclick="nume(9)"></td>
                <td><input id="vezes"  class="btn" type="button" value="*" onclick="nume('*')"></td>
            </tr>
            <tr>
                <td><input id="quatro" class="num" type="button" value="4" onclick="nume(4)"></td>
                <td><input id="cinco" class="num" type="button" value="5" onclick="nume(5)"></td>
                <td><input id="seis" class="num" type="button" value="6" onclick="nume(6)"></td>
                <td><input id="menos"  class="btn" type="button" value="-" onclick="nume('-')"></td>          
            </tr>
            <tr>
                <td><input id="um" class="num" type="button" value="1" onclick="nume(1)"></td>
                <td><input id="dois" class="num" type="button" value="2" onclick="nume(2)"></td>
                <td><input id="tres" class="num" type="button" value="3" onclick="nume(3)"></td>
                <td><input id="mais" class="btn" type="button" value="+" onclick="nume('+')"></td>
            </tr>
            <tr>
                <td colspan="2"><input id="zero" class="zero" type="button" value="0" onclick="nume(0)"></td>
                <td><input id="virgula" class="num" type="button" value="," onclick="nume(',')"></td>
                <td><input id="result"  class="btn" type="button" value="=" onclick=""></td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>