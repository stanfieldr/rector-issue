<?php

namespace Stanfieldr;
use Exception;

class ParentClass {
    private $id;
    private $loaded = false;
    private $data = [];

    public function __construct($id = null) {
        $this->id = $id;
    }

    public function load() {
        $this->data = ['derp' => 1];
        $this->loaded = true;
    }

    /**
	 * Magic method for getting/setting values on a Database Object
	 *
	 * @param String $function  Function name
	 * @param Array  $arguments Function arguments ($useCache = true)
	 * @return \DatabaseObject
	 */
    public function __call($function, $arguments) {
        $actions = ['GET', 'SET'];
        $action  = substr($function, 0, 3);

        if (!in_array($action, $actions)) {
            throw new Exception("Undefined function");
        }

        if (!$this->loaded) {
            $this->load();
        }

        if ($action === "GET") {
            return $this->data[strtolower(substr($function, 3))] ?? null;
        } elseif ($action === "SET") {
            // set logic..
        }
    }
}