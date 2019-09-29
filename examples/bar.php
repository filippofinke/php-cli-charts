<?php
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [14, 10, 7];
$labels = ["January", "February", "March"];
$size = 2;
$colors = ["0;33", "0;32", "0;31"];

$bar = new Charts\Bar($title, $values, $labels, $colors, $size);
$bar->draw();
