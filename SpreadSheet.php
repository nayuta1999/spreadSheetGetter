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
      $csv=$this->GetURLContents($this->url);
      $csv_body = explode("\n",$csv);
      $result = [];
      foreach($csv_body as $row){
        $result[] = explode(',',$row);
      }
      return $result;
    }

    function GetURLContents($url){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 60);
      //Locationをたどる
      curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
      //最大何回リダイレクトをたどるか
      curl_setopt($ch,CURLOPT_MAXREDIRS,10);
      //リダイレクトの際にヘッダのRefererを自動的に追加させる
      curl_setopt($ch,CURLOPT_AUTOREFERER,true);

      $str = curl_exec($ch);
      curl_close($ch);
      return $str;
    }
  }