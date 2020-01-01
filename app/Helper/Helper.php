<?php
/**
 * Created by PhpStorm.
 * User: حمزة و مازن
 * Date: 20/10/2019
 * Time: 01:02 ص
 */

function formatResponse($data, $error=false, $message=null) {
    return response()->json([
        "error" => $error,
        "message" => $message,
        "data" => $data
    ]);
}