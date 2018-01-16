
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
            Identificação do Pedido Atualizado: {{$pedido->id}}
        </h2>
    </div>
    <div>
        Dados do Pedido<br>
        <table border="1">
            <tr>
                <td width="50%">Status: {!! $pedido->getStatus($pedido->status) !!}</td>
                <td>Rastreio: {!! $pedido->rastreio !!}</td>
            </tr>
            <tr>
                <td colspan="2">Observação: <br>{!! $pedido->obs_admin !!}</td>
            </tr>
        </table>
    </div>
</body>
</html>