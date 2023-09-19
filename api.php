<?php

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['actions'])) {
    $actions = $data['actions'];

    $message = processActions($actions);

    header('Content-Type: application/json');
    echo json_encode(['message' => $message]);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Aucune action fournie']);
}

function processActions($actions) {
    switch ($actions) {
        case '*123#':
            return 'Demande crédit';
        case '456':
            return 'Actions en cours';
        case '789':
            return 'Actions terminées';
        default:
            return 'Actions non reconnues';
    }
}