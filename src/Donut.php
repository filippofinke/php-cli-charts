<?php
/**
 * Filippo Finke
 */
namespace Charts;

class Donut extends Chart
{
    private $radius;

    private $size;

    private $characters;

    public function getRadius()
    {
        return $this->radius;
    }

    public function getCharacters()
    {
        return $this->characters;
    }

    public function getSize()
    {
        return $this->size;
    }



    public function __construct($title, $values, $labels, $colors, $characters, $radius = 10, $size = 2)
    {
        parent::__construct($title, $values, $labels, $colors);
        $this->characters = $characters;
        $this->radius = $radius;
        $this->size = $size;
    }

    public function draw()
    {
        $title = $this->getTitle();
        $values = $this->getValues();
        $labels = $this->getLabels();
        $radius = $this->getRadius();
        $characters = $this->getCharacters();
        $colors = $this->getColors();
        $diameter = $radius * 2;
        $twopi = M_PI * 2;
        $circle = [];
        echo str_pad($title, $diameter * $this->getSize(), " ", STR_PAD_BOTH).PHP_EOL;
        for ($i = -$radius; $i <= $radius; $i++) {
            $array = [];
            for ($x = -$radius; $x <= $radius;$x++) {
                $array[$x] = str_repeat(" ", $this->getSize());
            }
            $circle[$i] = $array;
        }
        ksort($values);
        $total = array_sum($values);
        $start = 0;
        $percents = [];
        foreach($values as $index => $value) {
            $string = str_repeat($characters[$index], $this->getSize());
            if($colors != null) {
                $string = "\033[".$colors[$index]."m".$string."\033[0m";
            }
            $p = round($value / $total * 100 );
            $perc = $start + $p;
            $percents[] = array(
                $start,
                $perc,
                $string,
                $p
            );
            $start = $perc;
        }
        foreach ($percents as $perc) {
            $min_percent = $perc[0];
            $max_percent = $perc[1];
            for ($i = $min_percent / 100; $i <= $max_percent / 100; $i += 1/3600 * $twopi) {
                $x = cos($i * $twopi) * $radius;
                $y = sin($i * $twopi) * $radius;
                $circle[round($y)][round($x)] = $perc[2];
            }
        }
        for($y = -$radius; $y <= $radius; $y++) {
            for($x = -$radius; $x <= $radius; $x++) {
                echo $circle[$y][$x];
            }
            echo PHP_EOL;
        }
        foreach($percents as $index => $perc) {
            $string = $labels[$index]." ".$perc[3]."%";
            if($colors != null) {
                $string = "\033[".$colors[$index]."m".$string."\033[0m";
            }
            echo $string.PHP_EOL;
        }
    }
}
