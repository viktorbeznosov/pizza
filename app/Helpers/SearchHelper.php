<?php

namespace App\Helpers;

use App\Blog;
use Illuminate\Support\Facades\DB;

class SearchHelper {

    public static function search($q){
        
        $data = DB::select("SELECT * FROM `blogs` WHERE `title` LIKE ? OR `text` LIKE ?", ['%'.$q.'%','%'.$q.'%']);
        
        $result = array();
        foreach($data as $item){
            $result['data'][] = array(
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->text,
                'link' => '/admin/blogs/'.$item->id.'/edit'
            );
        }
        
        $data = DB::select("SELECT * FROM `categories` WHERE `name` LIKE ? OR `description` LIKE ?", ['%'.$q.'%','%'.$q.'%']);
        foreach($data as $item){
            $result['data'][] = array(
                'id' => $item->id,
                'title' => $item->name,
                'description' => $item->description,
                'link' => 'admin/cat/'.$item->id.'/edit'
            );
        }
        
        $result['count'] = count($result['data']);
        
        return $result;
    }
    
}
