<?php

namespace Stanfieldr;

class ChildClass extends ParentClass {
    public function getDerp() {
        $derp = parent::getDerp();

        if (empty($derp)) {
            return "ferpa derp";
        }

        return $derp;
    }
}