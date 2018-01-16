
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
            Identificação do Pedido Enviado: {{$pedido->id}}
        </h2>
    </div>
    <div>
        Dados do cliente<br>
        <table border="1">
            <tr>
                <td colspan="2">Nome: {!! $user->name !!}</td>
            </tr>
            <tr>
                <td width="50%">CPF: {!! $user->cpf !!}</td>
                <td>RG: {!! $user->rg !!}</td>
            </tr>
            <tr>
                <td>Email: {!! $user->email !!}</td>
                <td>Contato: {!! $user->contato !!}</td>
            </tr>
        </table>
    </div>
</body>
</html>