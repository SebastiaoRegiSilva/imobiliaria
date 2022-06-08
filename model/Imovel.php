<?php
    require_once 'Banco.php';
    require_once './Conexao.php';

    /**
    * Objeto de valor que representa um imóvel.
    */ 
    class Imovel extends Banco
    {
        private $id;
        private $descricao;
        private $foto;
        private $valor;
        private $tipo;
        private $fotoTipo;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        public function getFoto()
        {
            return $this->foto;
        }

        public function setFoto($foto)
        {
            $this->foto = $foto;
        }

        public function getValor()
        {
            return $this->valor;
        }

        public function setValor($valor)
        {
            $this->valor = $valor;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

        public function getTipo()
        {
            return $this->fotoTipo;
        }

        public function setTipo($fotoTipo)
        {
            $this->fotoTipo = $fotoTipo;
        }
        
        /**
        * Cadastra um imóvel na base de dados, caso não exista e edita se existir.
        */ 
        public function save()
        {
            $result = false;

            // Conexão com o banco de dados.
            $conexao = new Conexao();
           // Cria a conexão com o banco de dados.
            if($conn = $conexao->getConection())
            {
                if($this->id > 0)
                {
                    $query = "UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo, fotoTipo = :fotoTipo WHERE id = :id";
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':fotoTipo' => $this->fotoTipo, ':id' => $this->id)))
                        $result = $stmt->rowCount();
                    
                }
                else
                {
                    $query = "INSERT INTO imovel (id, descricao, foto, valor, tipo, fotoTipo) values (null,:descricao,:foto,:valor, :tipo, :fotoTipo)";
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(":descricao" => $this->descricao, ":foto" => $this->foto, ":valor" => $this->valor, ":tipo" => $this->tipo, ':fotoTipo' => $this->fotoTipo)))
                        $result = $stmt->rowCount();
                }
            }
            return $result;
        }

        /**
        * Remove um imóvel na base de dados baseado no Id.
        * @id  Código de identificação do imóvel.
        */ 
        public function remove($id)
        {
            // Objeto responsável pela conexão.
            $conexao = new Conexao();
            // Cria a conexão com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de busca com base no código de identificação.. 
            $query = "SELECT * FROM imovel WHERE id = :id";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Executa a query.
            if($stmt->execute(array(':id'=>$id)))
            {
                // Verifica se houve algum registro encontrado.
                if($stmt->rowCount() > 0)
                    // O resultado da busca será retornado como um objeto da classe.
                    $result = $stmt->fetchObject(Imovel::class);
                else
                    $result = false;
                
            }
            return $result;
        }

        /**
        * Busca um imóvel na base de dados baseado no Id.
        * @id  Código de identificação do imóvel.
        */ 
        public function find($id)
        {
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM imovel";
            $stmt = $conn->prepare($query);
            $result = array();
            if($stmt->execute())
            {
                while($rs = $stmt->fetchObject(Imovel::class))
                    $result[] = $rs;
            }
            else
                $result = false;
            
            return $result;
        }

        /**
        * Quantifica os imóveis cadastrados na base de dados.
        */ 
        public function count()
        {
            // Falta implementar.
        }

        /**
        * Lista todos os imóveis cadastrados na base de dados.
        */ 
        public function listAll()
        {
            // Cria um objeto do tipo conexão.
            $conexao = new Conexao();
            // Cria a conexão com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de seleção.
            $query = "SELECT * FROM imovel";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Cria um array para receber o resultado da seleção.
            $result = array();
            // Executa a query.
            if ($stmt->execute()) {
                // O resultado da busca será retornado como um objeto da classe
                while ($rs = $stmt->fetchObject(Imovel::class))
                    // Armazena esse objeto em uma posição do vetor.
                    $result[] = $rs;
            }
            else
                $result = false;
            
            return $result;
        }
    }
?>