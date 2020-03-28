<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Jogo História</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS and Style User -->
	<link rel="stylesheet" type="text/css" href="source/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/bootstrap/css/style.css">
</head>
<body>
	<form method="post" action="source/config/processa.php">
		<div class="form-group">
			<label for="nome-equipe">Nome da Equipe</label>
			<input type="text" class="form-control" name="nome-equipe" placeholder="Ex.: Os Bárbaros" required>
		</div>

		<div class="form-group">
			<label for="participantes">Participantes da Equipe</label>
			<input type="text" class="form-control" name="participantes" placeholder="Ex.: Gilmar, Renan, Ester, Emily" required>
			<br>
		</div>

		<button type="submit" class="btn btn-success btn-lg btn-block">Jogar</button>
	</form>
</body>
</html>