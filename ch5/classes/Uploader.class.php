<?php
class Uploader {
    private $filename;
    private $fileData;
    private $destination;
    
    
    public function __construct( $key ) {
        $this->filename = $_FILES[$key]['name'];
        $this->fileData = $_FILES[$key]['tmp_name'];
    }

    public function saveIn( $folder ) {
        $this->destination = $folder;
    }
    
    public function save(){
        $folderIsWritAble = is_writable( $this->destination );
        if( $folderIsWritAble ){
            $name = "$this->destination/$this->filename";
            $succes = move_uploaded_file( $this->fileData, $name );
        } else {
            trigger_error("cannot write to $this->destination");
            $succes = false;
        }
        return $succes;
    }

}
