<?php

namespace App\CUONGLELIB;
class ToolFactory{

    public function getThumbnail($fileName,$suffix = '_thumb'){
        if($fileName){
            return preg_replace("/(.*)\.(.*)/i","$1{$suffix}.$2",$fileName);
        }
        return '';
    }
}