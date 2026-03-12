<?php
// Endpoint untuk memproses pengiriman form kontak via AJAX
header('Content-Type: application/json');

// Pastikan request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Menangkap isi berformat JSON dari Fetch API di JavaScript
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $name = isset($data['name']) ? htmlspecialchars(strip_tags($data['name'])) : '';
    $email = isset($data['email']) ? htmlspecialchars(strip_tags($data['email'])) : '';
    $message = isset($data['message']) ? htmlspecialchars(strip_tags($data['message'])) : '';

    // Validasi sederhana
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Semua field harus diisi!"]);
        exit;
    }

    // Simulasi sukses
    echo json_encode([
        "status" => "success",
        "message" => "Terima kasih, $name! Pesan Anda telah berhasil dikirim."
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Metode request tidak diizinkan."]);
}
