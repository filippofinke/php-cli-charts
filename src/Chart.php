<?php
namespace Charts;

abstract class Chart {

    protected $title;
    protected $labels;
    protected $values;

    public function getTitle() {
        return $this->title;
    }

    public function getLabels() {
        return $this->labels;
    }

    public function getValues() {
        return $this->values;
    }

    public function __construct($title, $values, $labels) {
        $this->title = $title;
        $this->values = $values;
        $this->labels = $labels;
    }

}