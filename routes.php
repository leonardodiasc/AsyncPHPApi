<?php

require_once "controllers/EducadorController.php";

$educatorController = new EducadorController();

return [
    'GET /educadores' => function () use ($educatorController) {
        return $educatorController->getAll();
    },
    'POST /educadores' => function ($request) use ($educatorController) {
        $educatorController->create($request->post);
    },
];
