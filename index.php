<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RCRC</title>
    <!-- Bootstrap CSS e JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/style.css">
    <script>
        
    </script>
</head>
<body>
    <form action="script/login.php" method="post" class="container">
        <div class="row justify-content-center mb-2 mt-5">
            <h2 class="col-auto">LOGIN</h2>
        </div>
        <div class="row mb-2  justify-content-center">
            <div class="col col-sm-8 col-md-4 ">
                <label for="usuario" class="form-label">Usuário:</label>
                <input type="text" name="usuario" id="usuario" class="form-control">
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col col-sm-8 col-md-4">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>
        </div>
        <?php if(isset($_GET['erro']) AND $_GET['erro']) {?>
            <div class="row justify-content-center text-danger">
                <div class="col-auto">
                    <p>Usuário ou senha inválidos</p>
                </div>
            </div>
        <?php } ?>
        <div class="row row-cols-1 row-cols-sm-auto justify-content-center g-2">
            <div class="col col-md-2 justify-content-end">
                <button type="submit" class="col-12 btn btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</body>
</html>