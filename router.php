<?php
    require_once 'config.php';
    require_once 'libs/router.php';
    require_once 'app/controllers/event.api.controller.php';
    require_once 'app/controllers/tipoevent.api.controller.php';
    require_once 'app/controllers/user.api.controller.php';
    require_once 'app/middlewares/jwt.auth.middleware.php';
    $router = new Router();

    $router->addMiddleware(new JWTAuthMiddleware());

    #                 endpoint        verbo      controller              metodo
    $router->addRoute('eventos'      ,            'GET',     'EventApiController',   'getAll');
    $router->addRoute('eventos/:id'  ,            'GET',     'EventApiController',   'get'   );
    $router->addRoute('eventos/:id'  ,            'DELETE',  'EventApiController',   'delete');
    $router->addRoute('eventos'  ,                'POST',    'EventApiController',   'create');
    $router->addRoute('eventos/:id'  ,            'PUT',     'EventApiController',   'update');

    $router->addRoute('tipoeventos'      ,            'GET',     'TipoEventApiController',   'getAll');
    $router->addRoute('tipoeventos/:id'  ,            'GET',     'TipoEventApiController',   'get'   );
    $router->addRoute('tipoeventos/:id'  ,            'DELETE',  'TipoEventApiController',   'delete');
    $router->addRoute('tipoeventos'  ,                'POST',    'TipoEventApiController',   'create');
    $router->addRoute('tipoeventos/:id'  ,            'PUT',     'TipoEventApiController',   'update');
    
    $router->addRoute('usuarios/token'    ,            'GET',     'UserApiController',   'getToken');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
