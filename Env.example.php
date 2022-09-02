<?php
  class Env{
    private $env=[
      'url' => "", //スプレッドシートのURL
    ];

    public function getEnv(){
      return $this->env;
    }
  }