<?php
/**
 * Filippo Finke
 */
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [3, 10, 5];
$labels = ["January", "February", "March"];
$size = 2;
$colors = ["0;33", "0;32", "0;31"];

$hbar = new Charts\HorizontalBar($title, $values, $labels, $colors, $size);
$hbar->draw();
