<?php
namespace App\CUONGLELIB\Facades;
use App\CUONGLELIB\ToolFactory;
use Illuminate\Support\Facades\Facade;

class Tool extends Facade{

    protected static function getFacadeAccessor()
    {
        return ToolFactory::class;
    }
}