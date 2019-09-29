<?php
/**
 * Filippo Finke
 */
require __DIR__ . '/../vendor/autoload.php';

$title = "Orders";
$values = [-10, 10, 5];
$labels = ["January", "February", "March"];
$colors = ["0;33", "0;32", "0;31"];

$hbar = new Charts\HorizontalBar($title, $values, $labels, $colors);
$hbar->draw();
