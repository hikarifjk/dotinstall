<?php
namespace MyApp;

class ImageUploader {
  public function upload() {
    try {
      $this->_validateUpload();
    } catch (\Exception $e){
      echo $e->getMessage();
      exit;
    }
    header('Location: http://' . $_SERVER['HTTP_HOST']);
    exit;
  }
  private function _validateUpload() {

  }
}
