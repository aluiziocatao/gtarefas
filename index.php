<?php
require __DIR__ . '/includes/app.php';

use \App\Http\Router;

//INICIA O ROUTER
$obRouter = new Router(URL);

//INCLUI AS ROTAS DE PÁGINA
include __DIR__ . '/routes/pages.php';

//INCLUI AS ROTAS DE PÁGINA ADMIN
include __DIR__ . '/routes/admin.php';

//IMPRIME O RESPONSE DA ROTA
$obRouter->run()->sendResponse();
