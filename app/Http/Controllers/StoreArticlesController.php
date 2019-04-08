<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
use App\Article;

class StoreArticlesController extends Controller
{
    public function show($store)
    {
      // Checks if id is a number
        if (is_numeric($store)) {
           $stor = Store::find($store);
           // checks if store exists in database
           if ($stor) {
             $aArticle = $stor->articles;
             foreach ($aArticle as $art) {
               $art['store_name'] = $stor['name'];
               unset($art['store_id']);
             }
             $response = array();
             $response['articles'] = $aArticle;
             $response['success'] = true;
             $response['total_elements'] = count($aArticle);

             return $response;
           }
           else{
             return response()->json(['sucess' => false, 'error_code' => 404, 'error_msg' => 'Record not Found' ], 200);
          }

        }
        else{
           return response()->json(['sucess' => false, 'error_code' => 400, 'error_msg' => 'Bad Request' ], 200);
        }

    }
}
