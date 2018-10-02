<?php

use App\CUONGLELIB\Facades;
if(!function_exists('getThumbnail')){
    function getThumbnail($fileName){
        return Tool::getThumbnail($fileName);
    }
}