<?php
namespace Charts;

class Bar extends Chart
{
    private $size;

    public function getSize()
    {
        return $this->size;
    }

    public function __construct($title, $values, $labels, $size = 1)
    {
        parent::__construct($title, $values, $labels);
        $this->size = $size;
    }

    public function draw()
    {
        $title = $this->getTitle();
        $values = $this->getValues();
        $labels = $this->getLabels();
        $size = $this->getSize();

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
                    echo str_pad(str_repeat("*", $size), $label_length, " ", STR_PAD_BOTH);
                } else {
                    echo str_repeat(" ", $label_length);
                }
            }
            echo PHP_EOL;
        }
        echo str_repeat(" ", strlen($max) + 1);
        echo implode($labels, " ").PHP_EOL;
    }
}
