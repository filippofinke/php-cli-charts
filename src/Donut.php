<?php
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



    public function __construct($title, $values, $labels, $characters, $radius = 10, $size = 2)
    {
        parent::__construct($title, $values, $labels);
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
            $p = round($value / $total * 100 );
            $perc = $start + $p;
            $percents[] = array(
                $start,
                $perc,
                str_repeat($characters[$index], $this->getSize()),
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
            echo $labels[$index]." ".$perc[3]."%".PHP_EOL;
        }
    }
}
