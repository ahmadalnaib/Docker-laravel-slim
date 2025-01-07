<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
  protected $builder;
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function apply(Builder $builder)
  {
    $this->builder = $builder;


    foreach ($this->request->all() as $name => $value) {
      if (method_exists($this, $name)) {
      $this->$name($value);
      }
    }

    return $builder;
  }
     

}