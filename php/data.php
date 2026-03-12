<?php
// Endpoint untuk mengembalikan data JSON untuk AJAX.
header('Content-Type: application/json');

$portfolio_data = [
    [
        "id" => 1,
        "title" => "MY HOME: MY SELF",
        "description" => "Eksplorasi hubungan antara ruang pribadi dan dampaknya terhadap kesehatan mental.",
        "image" => "img/foto-aji2.jpeg"
    ],
    [
        "id" => 2,
        "title" => "Jurnal Arsitektur Batin",
        "description" => "Kumpulan esai pendek tentang menata pikiran melalui seni merapikan rumah.",
        "image" => "img/foto-aji1.jpeg"
    ]
];

echo json_encode($portfolio_data);
