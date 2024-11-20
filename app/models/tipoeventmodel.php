<?php

Class TipoEventModel {

    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=g27_db_webspectaculos;charset=utf8', 'root', '');
   }

    public function getAll($orderBy = false){
        $sql = 'SELECT * FROM tipoevento';
        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre';
                    break;
            }
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        $tipoevents = $query->fetchAll(PDO::FETCH_OBJ);  
        return $tipoevents;
    }    

    function get($id){
        $query = $this->db->prepare('SELECT * FROM tipoevento WHERE id = ?');
        $query->execute([$id]);
        $event = $query->fetch(PDO::FETCH_OBJ);
        return $event; 
    }

    function insert($nombre){
             $query = $this->db->prepare('INSERT INTO tipoevento (nombre) VALUES(?)');
             $query->execute([$nombre]);
             return $this->db->lastInsertID();
         }    

    function insertupdate($id, $nombre){
            $query = $this->db->prepare('UPDATE tipoevento SET nombre=? WHERE id = ?');
            $query->execute([$nombre, $id]);
            return $id;
       }

    function remove($id){
        $query = $this->db->prepare ('DELETE FROM tipoevento WHERE id = ?');
        $query->execute([$id]);
    }       
}