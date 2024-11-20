<?php

Class EventModel {

    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=g27_db_webspectaculos;charset=utf8', 'root', '');
   }

    public function getAll($orderBy = false){
        $sql = 'SELECT * FROM evento';
        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre';
                    break;
            }
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        $events = $query->fetchAll(PDO::FETCH_OBJ);  
        return $events;
    }

    public function getAllTipo(){
        $sql = 'SELECT * FROM tipoevento';
        $query = $this->db->prepare($sql);
        $query->execute();
        $tipoevents = $query->fetchAll(PDO::FETCH_OBJ);  //arreglo de tareas
        return $tipoevents;
    }       

    function get($id){
        $sql = 'SELECT * FROM evento WHERE id = ?';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $event = $query->fetch(PDO::FETCH_OBJ);
        return $event; 
    }

    function insert($nombre, $descripcion, $fecha, $tipo){
             $sql = 'INSERT INTO evento (nombre, descripcion, fecha, tipo) VALUES(?,?,?,?)';
             $query = $this->db->prepare($sql);
             $query->execute([$nombre, $descripcion, $fecha, $tipo]);
             return $this->db->lastInsertID();
         }    

    function updateEvent($id, $nombre, $descripcion, $fecha, $tipo){
            $query = $this->db->prepare('UPDATE evento SET nombre=?, descripcion=?, fecha=?, tipo=? WHERE id = ?');
            $query->execute([$nombre, $descripcion, $fecha, $tipo, $id]);
       }

    function remove($id){
        $query = $this->db->prepare ('DELETE FROM evento WHERE id = ?');
        $query->execute([$id]);
    }       
}