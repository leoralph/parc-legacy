<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="home.php" class="navbar-brand" title="Plataforma de atendimentos do Ralph cabuloso"><i class="bi bi-stack"></i> P.A.R.C.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navegacao">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse multi-collapse navbar-collapse" id="navegacao">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="abrirChamado.php" class="nav-link"><i class="bi bi-file-earmark"></i> Abrir chamado</a>
                </li>
                <li class="nav-item">
                    <a href="gerenciarChamados.php" class="nav-link active"><i class="bi bi-gear"></i> Gerenciar chamados</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-patch-plus"></i> Cadastro</a>
                    <ul class="dropdown-menu">
                        <li><a href="cadastro/tipoChamado.php" class="dropdown-item">Tipo Chamado</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="usuarios.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-people"></i> Usuários</a>
                    <ul class="dropdown-menu">
                        <li><a href="usuarios/cadastrarUsuario.php" class="dropdown-item">Cadastrar/Alterar Usuário</a></li>
                        <li><a href="usuarios/cadastrarGrupo.php" class="dropdown-item">Cadastrar/Alterar Grupo de Usuários</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="logoff.php" class="nav-link"><i class="bi bi-power"></i> Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>