<?php
// Endpoint ini hanya bertugas mengembalikan data JSON untuk AJAX.
header('Content-Type: application/json');

$portfolio_data = [
    [
        "id" => 1,
        "title" => "MY HOME: MY SELF",
        "description" => "Buku yang mengeksplorasi secara mendalam hubungan antara ruang pribadi dan dampaknya terhadap kesehatan mental kita sehari-hari.",
        "image" => "img/foto-aji2.jpeg" // Anda bisa mengganti ini nanti dengan file foto cover buku yang sebenarnya jika ada
    ]
];

// Ubah array PHP ke format JSON
echo json_encode($portfolio_data);
