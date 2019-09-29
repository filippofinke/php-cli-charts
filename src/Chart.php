<?php
/**
 * Filippo Finke
 */
namespace Charts;

abstract class Chart {

    protected $title;
    protected $labels;
    protected $values;
    protected $colors;

    public function getTitle() {
        return $this->title;
    }

    public function getLabels() {
        return $this->labels;
    }

    public function getValues() {
        return $this->values;
    }

    public function getColors() {
        return $this->colors;
    }

    public function __construct($title, $values, $labels, $colors) {
        $this->title = $title;
        $this->values = $values;
        $this->labels = $labels;
        $this->colors = $colors;
    }

}