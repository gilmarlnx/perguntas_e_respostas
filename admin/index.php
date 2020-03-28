<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Área Restrita</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS and Style User -->
	<link rel="stylesheet" type="text/css" href="../source/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../source/bootstrap/css/style.css">
</head>
<body>
<div align="center" id="header">
    <h3>ÁREA RESTRITA</h3>
</div>
<div class="login">
    <form method="post" action="processa.php">
        <div class="form-group">
            <label for="email">Seu email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Seu email" required>
        </div>
        <div class="form-group">
            <label for="senha">Sua senha</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="Sua senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

</body>
</html>