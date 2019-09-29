<?php
/**
 * Filippo Finke
 */
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [-5, 10, 7, -10];
$labels = ["January", "February", "March", "Test"];
$size = 2;
$colors = ["0;33", "0;32", "0;31", "0;31"];

$bar = new Charts\Bar($title, $values, $labels, $colors, $size);
$bar->draw();
