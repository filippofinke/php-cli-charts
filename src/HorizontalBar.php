<?php
/**
 * Filippo Finke
 */
namespace Charts;

class HorizontalBar extends Chart {

    public function __construct($title, $values, $labels, $colors) {
        parent::__construct($title, $values, $labels, $colors);
    }

    public function draw() {
        $labels = $this->getLabels();
        $colors = $this->getColors();
        $values = $this->getValues();
        $title = $this->getTitle();

        $lengths = array_map('strlen', $labels);
        $max_length = max($lengths) + 1;
        $max_value = max($values);
        $min_value = min($values);
        echo $title.PHP_EOL;

        foreach($labels as $index => $label) {
            $value = $values[$index];
            $string = str_pad($label, $max_length, " ");
            if($colors != null) echo "\033[".$colors[$index]."m";
            echo $string;
            for($i = $min_value; $i <= $max_value; $i++) {
                if($value >= 0 && $i >= 0 && $value > $i) {
                    echo "#";
                } else if ($value < 0 && $i < 0 && $value <= $i){
                    echo "#";
                } else {
                    echo " ";
                }
            }
            echo "\t".$value.PHP_EOL;
            if($colors != null) echo "\033[0m";
        }

    }

}
