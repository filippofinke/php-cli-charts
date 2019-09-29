<?php
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [14, 10, 7];
$labels = ["January", "February", "March"];
$size = 2;

$bar = new Charts\Bar($title, $values, $labels, $size);
$bar->draw();
