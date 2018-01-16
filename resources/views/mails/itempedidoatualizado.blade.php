<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div>
        <h2>
            Identificação do Pedido: {{$itempedido->pedido->id}}
        </h2>
    </div>
    <div>
        Item do Pedido Atualizado<br>
        <table border="1">
            <tr>
                <td>Item: {!! $itempedido->descricao !!}</td>
            </tr>
            <tr>
                <td colspan="2">Observação: <br>{!! $itempedido->obs_admin !!}</td>
            </tr>
        </table>
    </div>
</body>
</html>