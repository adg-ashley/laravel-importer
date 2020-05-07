<?php
namespace Adg\Importer\Traits;

trait MapHelpers {

    public function getMapAsCollection() {
        return collect($this->map);
    }

    public function getMapKeys() {
        return $this->getMapAsCollection()
            ->keys()
            ->all();
    }

    public function getMapValues() {
        return $this->getMapAsCollection()
            ->values()
            ->all();
    }

    public function getMapImploded($limiter=", ", $map="values") {
        return $this->getMapAsCollection()
            ->{$map}()
            ->implode($limiter);
    }
}