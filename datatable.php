<?php

class DatatableField extends StructureField {

  static public $assets = [
    'css' => [
      'datatables.min.css',
      'datatable.css'
    ],
    'js' => [
      'datatables.min.js',
      'datatable.js'
    ]
  ];

  public function entries() {
    $entries = parent::entries();
    if ($this->filter()) {
      $entries = call_user_func($this->filter(), $entries);
    } 
    return $entries;
  }

  public function headline() {
    return str_replace('/structure/add', '/datatable/add', parent::headline());
  }

  public function style() {
    return 'table';
  }

  public function content() {
    return tpl::load(__DIR__ . DS . 'template.php', array('field' => $this));
  }

  public function url($action) {
    return purl($this->model(), 'field/' . $this->name() . '/datatable/' . $action);
  }  

}