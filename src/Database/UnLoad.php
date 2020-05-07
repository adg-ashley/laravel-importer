<?php
namespace Adg\Importer\Database;

class Unload {

    private $model; 

    public function __construct($model) {
        $this->model = $model;
    }

    public function run () {
        echo "connection is ".$this->model->getConnection()->getDatabaseName();
        echo var_dump($this->model->getMapImploded());
        $this->dump($this->model->getTable())
            ->import();
        return $this;
    }

    public function dump($table) {
        echo "dump ".$table.PHP_EOL;
        return $this;
    }

    public function getDumpQuery() {
        $raw = "SET interactive_timeout = 31536000";
    }

    public function getDumpConfigQuery() {
       return [
           "SET interactive_timeout = 31536000",
           "SET wait_timeout = 31536000",
           "SET innodb_lock_wait_timeout = 1073741824"
       ];

    }

    public function import() {
        echo "import ".PHP_EOL;
        return $this;
    }

}