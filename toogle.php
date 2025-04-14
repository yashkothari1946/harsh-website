<?php
header('Content-Type: application/json');

session_start();
$file = 'toggle_state.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = file_get_contents($file);
    echo $data;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $status = $input['status'] === 'ON' ? 'ON' : 'OFF';

    file_put_contents($file, json_encode(['status' => $status]));
    echo json_encode(['status' => $status]);
    exit;
}
?>
