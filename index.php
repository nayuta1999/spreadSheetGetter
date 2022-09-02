<?php
  $id = -1;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }else{
    print("id is not set");
    return -1;
  }

