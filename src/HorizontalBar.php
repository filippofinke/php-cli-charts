<?php
/**
 * Filippo Finke
 */
namespace Charts;

class HorizontalBar extends Chart {

    public function __construct($title, $values, $labels, $colors) {
        parent::__construct($title, $values, $labels, $colors);
        $this->size = $size;
    }

    public function draw() {
        $labels = $this->getLabels();
        $colors = $this->getColors();
        $values = $this->getValues();

        $lengths = array_map('strlen', $labels);
        $max_length = max($lengths) + 1;
        $max_value = max($values);
        foreach($labels as $index => $label) {
            $value = $values[$index];
            $string = str_pad($label, $max_length, " ");
            if($colors != null) echo "\033[".$colors[$index]."m";
            echo $string;
            for($i = 0; $i < $value; $i++) {
                echo "#";
            }
            echo " ".str_pad($value, $max_value - $value + strlen($max_value), " ", STR_PAD_LEFT).PHP_EOL;
            if($colors != null) echo "\033[0m";
        }

    }

}
