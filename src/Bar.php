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
        $length = count($labels) - 1;
        foreach ($labels as $label) {
            $length += strlen($label);
        }
        echo str_repeat(" ", strlen($max) + 1).str_pad($title, $length, " ", STR_PAD_BOTH).PHP_EOL;
        for ($i = $max; $i > 0; $i--) {
            echo str_pad($i, strlen($max))."|";
            foreach ($values as $index => $value) {
                $label_length = strlen($labels[$index]) + 1;
                if ($value >= $i) {
                    if($colors != null) echo "\033[".$colors[$index]."m";
                    echo str_pad(str_repeat("*", $size), $label_length, " ", STR_PAD_BOTH);
                    if($colors != null) echo "\033[0m";
                } else {
                    echo str_repeat(" ", $label_length);
                }
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
