<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait ApiResponser
{

    protected function showMessage($message){
        return Response()->json([
            'data'=>$message
          ],Response::HTTP_CREATED);
    }
}
