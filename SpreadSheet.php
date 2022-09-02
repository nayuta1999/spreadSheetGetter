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

    public function GetURLContents($url){
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

    function expand_url( $url, $redirs = 0 ) {
      if ( $redirs == 20 ) {
        throw new Exception('TOO MANY REDIRECTS!!');
      }
     
      $ch = curl_init( $url );
      curl_setopt_array( $ch, [
        CURLOPT_HEADER => 1,
        CURLOPT_NOBODY => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => 0
      ] );
      $resp = curl_exec( $ch );
     
      if ( preg_match( '/Location: (.*)/i', $resp, $matches ) ) {
        return $this->expand_url( $matches[1], ++$redirs );
      }
     
      return trim( $url );
    }
  }