<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$dataFile = __DIR__ . '/events.json';

// Charger les événements
function loadEvents($file) {
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }
    $content = file_get_contents($file);
    return json_decode($content, true) ?? [];
}

// Sauvegarder les événements
function saveEvents($file, $events) {
    file_put_contents($file, json_encode(array_values($events), JSON_PRETTY_PRINT));
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    // GET /api.php — récupérer tous les événements
    case 'GET':
        $events = loadEvents($dataFile);
        echo json_encode(['success' => true, 'events' => $events]);
        break;

    // POST /api.php — ajouter un événement
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);

        if (empty($body['title']) || empty($body['date'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Titre et date obligatoires']);
            exit;
        }

        $events = loadEvents($dataFile);

        $newEvent = [
            'id'    => uniqid('evt_', true),
            'title' => htmlspecialchars(trim($body['title'])),
            'date'  => $body['date'],
            'color' => $body['color'] ?? '#6366f1',
            'note'  => htmlspecialchars(trim($body['note'] ?? '')),
        ];

        $events[] = $newEvent;
        saveEvents($dataFile, $events);

        echo json_encode(['success' => true, 'event' => $newEvent]);
        break;

    // DELETE /api.php?id=xxx — supprimer un événement
    case 'DELETE':
        $id = $_GET['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'ID manquant']);
            exit;
        }

        $events = loadEvents($dataFile);
        $events = array_filter($events, fn($e) => $e['id'] !== $id);
        saveEvents($dataFile, $events);

        echo json_encode(['success' => true]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['success' => false, 'error' => 'Méthode non autorisée']);
}
