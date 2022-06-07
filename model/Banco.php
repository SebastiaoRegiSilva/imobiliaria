<?php
    /**
    * Classe reponsável pela persistência de dados dentro da aplicação.
    */ 
    abstract class Banco
    {
        /**
        * Salva os dados cadastrados na base de dados.
        */ 
        abstract public function save();
        
        /**
        * Remove os dados cadastrados na base de dados com base no código de identificação.
        * @param mixed $id Código de identificação.
        */ 
        abstract public function remove($id);
        
        /**
        * Busca dados cadastrados na base de dados com base no códido de identificação.
        * @param mixed $id Código de identificação.
        */ 
        abstract public function find($id);
        
        /**
        * Quantifica todos os dados cadastrados na base de dados.
        */ 
        abstract public function count();
        
        /**
        * Lista todos os dados cadastrados na base de dados.
        */ 
        abstract public function listAll();
    }   
?>