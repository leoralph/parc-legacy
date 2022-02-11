<?php
    class ChamadoCRUD {
        private $conexao;
        private $chamado;
        private $tiposChamados;
        private $novoTipo;
        private $idTipo;
        private $chamados;
        private $respostasChamados;

        public function __set($attr,$value){
            $this->$attr = $value;
        }
        public function __get($attr){
            return $this->$attr;
        }
        public function __construct($conexao,$chamado){
            $this->conexao = $conexao->conectar();
            $this->chamado = $chamado;
        }
        public function createResposta(){
            $query = "INSERT INTO tb_respostas_chamados (id_chamado,id_usuario,nome_solicitante,email_solicitante,telefone_solicitante,descricao) VALUES (:id_chamado,:id_usuario,:nome_solicitante,:email_solicitante,:telefone_solicitante,:descricao)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_chamado',$this->chamado->id_chamado);
            $stmt->bindValue(':id_usuario',$this->chamado->id_usuario);
            $stmt->bindValue(':nome_solicitante',$this->chamado->nome_solicitante);
            $stmt->bindValue(':email_solicitante',$this->chamado->email_solicitante);
            $stmt->bindValue(':telefone_solicitante',$this->chamado->telefone_solicitante);
            $stmt->bindValue(':descricao',$this->chamado->descricao);
            $stmt->execute();
        }
        public function setValoresUpdate(){
            $this->chamado->id_chamado = $_POST['id_chamado_complemento'];
            $this->chamado->id_usuario = $_POST['id_usuario_complemento'];
            $this->chamado->id_situacao = $_POST['id_situacao'];
            $this->chamado->nome_solicitante = $_POST['nome_solicitante'];
            $this->chamado->email_solicitante = $_POST['email_solicitante'];
            $this->chamado->telefone_solicitante = $_POST['telefone_solicitante'];
            $this->chamado->descricao = $_POST['descricao'];
        }
        public function buscarChamado($id_chamado){
            $query = "SELECT c.assunto,c.id_tipo,t.tipo,c.nome_solicitante,c.email_solicitante,c.telefone_solicitante,s.id_situacao,s.situacao_chamado FROM tb_chamados c LEFT JOIN tb_tipos t ON(c.id_tipo = t.id_tipo) LEFT JOIN tb_situacoes_chamados s ON(c.id_situacao = s.id_situacao) WHERE c.id_chamado = :id_chamado";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_chamado', $id_chamado);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        public function buscaTipos(){
            $query = "SELECT id_tipo, tipo,ativo FROM tb_tipos";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $this->tiposChamados = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function buscaTiposAtivos(){
            $query = "SELECT id_tipo, tipo FROM tb_tipos WHERE ativo = TRUE";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $this->tiposChamados = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function buscaSituacoes(){
            $query = "SELECT id_situacao, situacao_chamado FROM tb_situacoes_chamados WHERE ativo = 1";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function createTipo(){
            $this->__set('novoTipo',$_POST['novoTipo']);
            $query = "INSERT INTO tb_tipos(tipo)VALUE(:novoTipo)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':novoTipo',$this->novoTipo);
            $stmt->execute();
        }

        public function createChamado(){
            $query = "INSERT INTO tb_chamados (id_usuario,assunto,id_tipo,descricao,nome_solicitante,email_solicitante,telefone_solicitante)
                      VALUES (:id_usuario,:assunto,:id_tipo,:descricao,:nome_solicitante,:email_solicitante,:telefone_solicitante)";

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':id_usuario', $this->chamado->id_usuario);
            $stmt->bindValue(':assunto', $this->chamado->assunto);
            $stmt->bindValue(':id_tipo', $this->chamado->id_tipo);
            $stmt->bindValue(':descricao', $this->chamado->descricao);
            $stmt->bindValue(':nome_solicitante', $this->chamado->nome_solicitante);
            $stmt->bindValue(':email_solicitante', $this->chamado->email_solicitante);
            $stmt->bindValue(':telefone_solicitante', $this->chamado->telefone_solicitante);

            $stmt->execute();
        }
        public function readTodos(){
            $query = "SELECT c.id_chamado,t.tipo,s.situacao_chamado,s.cor_situacao,c.id_usuario,c.assunto,c.nome_solicitante,c.email_solicitante,c.telefone_solicitante,c.descricao,c.data_abertura,c.hora_abertura
                    FROM tb_chamados c LEFT JOIN tb_situacoes_chamados s ON(c.id_situacao = s.id_situacao) LEFT JOIN tb_tipos t ON (c.id_tipo = t.id_tipo)";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $this->chamados = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function readUsuario($id_usuario){
            $query = "SELECT c.id_chamado,t.tipo,s.situacao_chamado,s.cor_situacao,c.id_usuario,c.assunto,c.nome_solicitante,c.email_solicitante,c.telefone_solicitante,c.descricao,c.data_abertura,c.hora_abertura
                    FROM tb_chamados c LEFT JOIN tb_situacoes_chamados s ON(c.id_situacao = s.id_situacao) LEFT JOIN tb_tipos t ON (c.id_tipo = t.id_tipo) WHERE id_usuario = :id_usuario";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();
            $this->chamados = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function readRespostas(){
            $query = "SELECT r.id_chamado,r.`id_resposta`,u.`nome`,r.`descricao`,r.`nome_solicitante`,r.`email_solicitante`,r.`telefone_solicitante`,r.`data_resposta`,r.`hora_resposta` FROM tb_respostas_chamados r LEFT JOIN tb_usuarios u ON (r.`id_usuario` = u.`id_usuario`)";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $this->respostasChamados = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function updateSituacao(){
            $query = "UPDATE tb_chamados SET id_situacao = :id_situacao WHERE id_chamado = :id_chamado";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_situacao',$this->chamado->id_situacao);
            $stmt->bindValue(':id_chamado',$this->chamado->id_chamado);
            $stmt->execute();
        }
        public function inativarTipo(){
            $this->__set('idTipo',$_POST['idTipoInativar']);
            $query = "UPDATE tb_tipos SET ativo = 0 WHERE id_tipo = :idTipo";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':idTipo',$this->idTipo);
            $stmt->execute();
        }
        public function ativarTipo(){
            $this->__set('idTipo',$_POST['idTipoAtivar']);
            $query = "UPDATE tb_tipos SET ativo = 1 WHERE id_tipo = :idTipo";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':idTipo',$this->idTipo);
            $stmt->execute();
        }
        public function rodarNovaResposta(){
            $this->setValoresUpdate();
            $this->updateSituacao();
            $this->createResposta();
        }
    }

?>