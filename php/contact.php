<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $name = isset($data['name']) ? htmlspecialchars(strip_tags($data['name'])) : '';
    $email = isset($data['email']) ? htmlspecialchars(strip_tags($data['email'])) : '';
    $message = isset($data['message']) ? htmlspecialchars(strip_tags($data['message'])) : '';

    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Semua field harus diisi!"]);
        exit;
    }

    echo json_encode([
        "status" => "success",
        "message" => "Terima kasih, $name! Pesan Anda telah meluncur dengan sukses."
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Metode request tidak diizinkan."]);
}
