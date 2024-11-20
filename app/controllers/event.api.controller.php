<?php
include_once 'app/models/eventmodel.php';
include_once 'app/views/jsonview.php';

class EventApiController {

    private $model;
    private $view;

    public function __construct(){
      $this->model = new EventModel();
      $this->view = new JSONView();
  }    

// -----MUESTRA LOS EVENTOS
    public function getAll($req, $res){
      //  if(!$res->user) {
      //      return $this->view->response("No autorizado", 401);
      // }
        
        $orderBy = false;
        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;

        $events = $this->model->getAll($orderBy);
        
        // mando las tareas a la vista
        return $this->view->response($events);              
    }
// /---------------- api/eventos/:id
    public function get($req, $res) {
        // obtengo el id del evento desde la ruta
        $id = $req->params->id;

        // obtengo el evento de la DB
        $event = $this->model->get($id);

        if(!$event) {
            return $this->view->response("El evento con el id=$id no existe", 404);
        }

        // mando el evento a la vista
        return $this->view->response($event);
    }


// /-----------------api/eventos/:id  (DELETE)
function delete($req, $res){
    $id = $req->params->id;
    if (!$id) {
        return $this->view->response("El Evento con el id=$id no existe", 404);
    }
    $this->model->remove($id);
    $this->view->response("El Evento con el id=$id se eliminó con éxito");
    }
    

// ------------  api/eventos (POST)
  public function create($req, $res) {
    // valido los datos 
    if (empty($nombre) || empty($descripcion) || empty($fecha) || empty($tipo)) {
        return $this->view->response('Faltan completar datos', 400);
    }
     // obtengo los datos
     $nombre = $req->body->nombre;       
     $descripcion = $req->body->descripcion;       
     $fecha = $req->body->fecha;
     $tipo = $req->body->tipo;  

  
    // inserto los datos
    $id = $this->model->insert($nombre, $descripcion, $fecha, $tipo);

    if (!$id) {
        return $this->view->response("Error al insertar tarea", 500);
    }

    
    $evento = $this->model->get($id);
    return $this->view->response($evento, 201);
}


   public function update($req, $res) {
    $id = $req->params->id;

    // verifico que exista
    $evento = $this->model->get($id);
    if (!$evento) {
        return $this->view->response("La tarea con el id=$id no existe", 404);
    }

     // valido los datos
     if (empty($req->body->nombre) || empty($req->body->descripcion)  || empty($req->body->tipo)) {
        return $this->view->response('Faltan completar datos', 400);
    }

    // obtengo los datos
    $nombre = $req->body->nombre;       
    $descripcion = $req->body->descripcion;       
    $fecha = $req->body->fecha;
    $tipo = $req->body->tipo;  

    // actualiza el evento
    $this->model->updateEvent($id, $nombre, $descripcion, $fecha, $tipo);

    // obtengo el evento modificado y lo devuelvo en la respuesta
    $evento = $this->model->get($id);
    $this->view->response($evento, 200);
}


}
