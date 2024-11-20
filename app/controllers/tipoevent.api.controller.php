<?php
include_once 'app/models/tipoeventmodel.php';
include_once 'app/views/jsonview.php';

class TipoEventApiController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new TipoEventModel();
        $this->view = new JSONView();
    }
// -----MUESTRA LOS TIPOS DE EVENTOS
    function getAll($req, $res){
      $orderBy = false;
      if(isset($req->query->orderBy))
          $orderBy = $req->query->orderBy;

      $tipoevents = $this->model->getAll($orderBy);
      
      // mando las tareas a la vista
      return $this->view->response($tipoevents);                
    }

    public function get($req, $res) {
      // obtengo el id del evento desde la ruta
      $id = $req->params->id;

      // obtengo el evento de la DB
      $tipoevent = $this->model->get($id);

      if(!$tipoevent) {
          return $this->view->response("El evento con el id=$id no existe", 404);
      }

      // mando el evento a la vista
      return $this->view->response($tipoevent);
  }

  // /-----------------api/tipoeventos/:id  (DELETE)
  function delete($req, $res){
    $id = $req->params->id;
    if (!$id) {
        return $this->view->response("El Evento con el id=$id no existe", 404);
    }
    $this->model->remove($id);
    $this->view->response("El Evento con el id=$id se eliminó con éxito");
    }


// ------------  api/tipoeventos (POST)
  public function create($req, $res) {
    // valido los datos 
    if (empty($nombre)) {
        return $this->view->response('Faltan completar datos', 400);
    }
     // obtengo los datos
     $nombre = $req->body->nombre;        

    // inserto los datos
    $id = $this->model->insert($nombre);

    if (!$id) {
        return $this->view->response("Error al insertar tarea", 500);
    }
    
    $tipoevento = $this->model->get($id);
    return $this->view->response($tipoevento, 201);
}

public function update($req, $res) {
  $id = $req->params->id;

  // verifico que exista
  $tipoevento = $this->model->get($id);
  if (!$tipoevento) {
      return $this->view->response("La tarea con el id=$id no existe", 404);
  }

   // valido los datos
   if (empty($req->body->nombre)) {
      return $this->view->response('Faltan completar datos', 400);
  }

  // obtengo los datos
  $nombre = $req->body->nombre;       

  // actualiza el evento
  $this->model->updateTipoEvent($id, $nombre);

  // obtengo el evento modificado y lo devuelvo en la respuesta
  $tipoevento = $this->model->get($id);
  $this->view->response($tipoevento, 200);
}


}



