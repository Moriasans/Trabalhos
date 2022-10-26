<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
    <link rel ="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" >
</head>
<body>
    <h1>Listar Usuários</h1>
    <table id="listar-usuario" class="display" style="width:100%">
    <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
    $('#listar-usuario ').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_usuarios.php"
    });
});
    </script>
</body>
</html>