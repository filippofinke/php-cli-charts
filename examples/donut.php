<?php
/**
 * Filippo Finke
 */
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [100, 10, 7];
$characters = ["A", "B", "C"];
$labels = ["January", "February", "March"];
$radius = 6;
$size = 2;
$colors = ["0;33", "0;32", "0;31"];
$pie = new Charts\Donut($title, $values, $labels, $colors, $characters, $radius, $size);
$pie->draw();
