<?php
/**
 * Filippo Finke
 */
namespace Charts;

class Bar extends Chart
{
    private $size;

    public function getSize()
    {
        return $this->size;
    }

    public function __construct($title, $values, $labels, $colors, $size = 1)
    {
        parent::__construct($title, $values, $labels, $colors);
        $this->size = $size;
    }

    public function draw()
    {
        $title = $this->getTitle();
        $values = $this->getValues();
        $labels = $this->getLabels();
        $size = $this->getSize();
        $colors = $this->getColors();

        $max = max($values);
        $min = (min($values) < 0)?min($values):0;

        $max_length = (strlen($max) > strlen($min))?strlen($max):strlen($min);

        $length = count($labels) - 1;
        foreach ($labels as $label) {
            $length += strlen($label);
        }
        echo str_repeat(" ", $max_length + 1).str_pad($title, $length, " ", STR_PAD_BOTH).PHP_EOL;
        for ($i = $max; $i >= $min; $i--) {
            echo str_pad($i, $max_length)."|";
            foreach ($values as $index => $value) {
                $label_length = strlen($labels[$index]) + 1;
                if($colors != null) echo "\033[".$colors[$index]."m";
                if ($value >= $i && $value >= 0 && $i >= 0) {
                    echo str_pad(str_repeat("*", $size), $label_length, " ", STR_PAD_BOTH);
                } else if($value < 0 && $i < 0 && $value <= $i) {
                    echo str_pad(str_repeat("*", $size), $label_length, " ", STR_PAD_BOTH);
                } else {
                    echo str_repeat(" ", $label_length);
                }
                if($colors != null) echo "\033[0m";
            }
            echo PHP_EOL;
        }
        echo str_repeat(" ", strlen($max) + 1);
        foreach($labels as $index => $label) {
            if($colors != null) echo "\033[".$colors[$index]."m";
            echo $label." ";
            if($colors != null) echo "\033[0m";
        }
        echo PHP_EOL;
    }
}
