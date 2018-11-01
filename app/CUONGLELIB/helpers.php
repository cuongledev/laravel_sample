<?php

use App\CUONGLELIB\Facades\Tool;
if(!function_exists('getThumbnail')){
    function getThumbnail($fileName){
        return Tool::getThumbnail($fileName);
    }
}