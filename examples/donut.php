<?php
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [100, 10, 7];
$characters = ["A", "B", "C"];
$labels = ["January", "February", "March"];
$radius = 6;
$size = 2;
$pie = new Charts\Donut($title, $values, $labels, $characters, $radius, $size);
$pie->draw();
