<?php
  require_once __DIR__.'/Env.php';
  require_once __DIR__.'/SpreadSheet.php';
  $id = -1;
  try{
    if(isset($_GET['id']) and is_numeric($_GET['id'])){
      $id = $_GET['id'];
    }else{
      throw new Exception("idが不正規です．");
    }
    $tmp = new Env();
    $env = $tmp->getEnv();
    $spreadsheet = new SpreadSheet($env['url']);
    print($spreadsheet->getURL($id)."<br>");
    $result = $spreadsheet->expand_url($spreadsheet->getURL($id));
    print($result);
  }catch(Exception $e){
      echo $e->getMessage();
  }


