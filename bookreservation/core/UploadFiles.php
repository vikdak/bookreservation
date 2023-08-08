<?php

class UploadFiles
{
    public function __construct(){}

    public function upload($files): string
    {
    if ($files['name'])
         move_uploaded_file($files['tmp_name'], "C:\Users\\vikto\Desktop\Code Academy\bookreservation\public\storage\images\\{$files['name']}");
         return $files['name'];
    }
}