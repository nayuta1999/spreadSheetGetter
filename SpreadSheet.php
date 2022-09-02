<?php
  class SpreadSheet{
    private $url = "";
    public function __construct($_url)
    {
      if(preg_match("/http/",$_url)){
        $this->url = $_url;
      }else{
        throw new Exception("URLが不正規です．");
      }
    }
    
    public function getURL($id){
      $csv = $this->getCSV();
      foreach($csv as $row){
        if($id === $row[0]){
          return $row[1];
        }
      }
    }

    private function getCSV(){
      $csv=file_get_contents($this->url);
      $csv_body = explode("\n",$csv);
      $result = [];
      foreach($csv_body as $row){
        $result[] = explode(',',$row);
      }
      return $result;
    }
  }