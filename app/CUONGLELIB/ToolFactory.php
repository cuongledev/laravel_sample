<?php

namespace App\CUONGLELIB;
class ToolFactory{

    public function getThumbnail($fileName){
        if($fileName){
            return preg_replace("/(.*)\.(.*)/i",'$1_thumb.$2',$fileName);
        }
        return '';
    }
}