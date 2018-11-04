<?php

use App\CUONGLELIB\Facades\Tool;
if(!function_exists('getThumbnail')){
    function getThumbnail($fileName,$suffix = '_thumb'){
        return Tool::getThumbnail($fileName,$suffix);
    }
}