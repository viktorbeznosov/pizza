<?php

namespace App\Helpers;

use App\Blog;
use Illuminate\Support\Facades\DB;

class SearchHelper {

    public static function search($q){
        
        $arrParams = array('%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%','%'.$q.'%');
        $query = "
               SELECT 'blogs',blogs.id, blogs.title, blogs.text FROM blogs WHERE title LIKE ? OR text LIKE ? 
               UNION 
               SELECT 'categories',categories.id, categories.name, categories.description FROM `categories` WHERE `name` LIKE ? OR description LIKE ? 
               UNION 
               SELECT 'products',products.id, products.name, products.description FROM `products` WHERE `name` LIKE ? OR description LIKE ? 
               UNION 
               SELECT 'services',services.id, services.name, services.description FROM `services` WHERE `name` LIKE ? OR description LIKE ? 
               UNION 
               SELECT 'users',users.id, users.name, users.email FROM `users` WHERE `name` LIKE ? OR email LIKE ?
               UNION 
               SELECT 'admins',admins.id, admins.name, admins.email FROM `admins` WHERE `name` LIKE ? OR email LIKE ? 
                ";
        $data = collect(DB::select($query, $arrParams));
        
//        $blogs = DB::table('blogs')->where('title', 'LIKE', '%'.$q.'%')->orWhere('text', 'LIKE', '%'.$q.'%')->select('title','text');
//        $categories = DB::table('categories')->where('name', 'LIKE', '%'.$q.'%')->orWhere('description', 'LIKE', '%'.$q.'%')->union($blogs)->select('name','description')->get();
//        $data = $categories;
            
        $result = array();
//        foreach($data as $item){
//            $result['data'][] = array(
//                'id' => $item->id,
//                'title' => $item->title,
//                'description' => $item->text,
//                'link' => '/admin/blogs/'.$item->id.'/edit'
//            );
//        }
        
//        $data = DB::select("SELECT * FROM `categories` WHERE `name` LIKE ? OR `description` LIKE ?", ['%'.$q.'%','%'.$q.'%']);
//        foreach($data as $item){
//            $result['data'][] = array(
//                'id' => $item->id,
//                'title' => $item->name,
//                'description' => $item->description,
//                'link' => 'admin/cat/'.$item->id.'/edit'
//            );
//        }
//        
//        $data = DB::select("SELECT * FROM `products` WHERE `name` LIKE ? OR `description` LIKE ?",['%'.$q.'%','%'.$q.'%']);
//        foreach($data as $item){
//            $result['data'][] = array(
//                'id' => $item->id,
//                'title' => $item->name,
//                'description' => $item->description,
//                'link' => 'admin/products/edit/'.$item->id.'/'.$item->cat_id
//            );
//        } 
//        
//        $data = DB::select("SELECT * FROM `services` WHERE `name` LIKE ? OR `description` LIKE ?",['%'.$q.'%','%'.$q.'%']);
//        foreach($data as $item){
//            $result['data'][] = array(
//                'id' => $item->id,
//                'title' => $item->name,
//                'description' => $item->description,
//                'link' => 'admin/services/'.$item->id.'/edit'
//            );
//        } 
//        
//        $data = DB::select("SELECT * FROM `users` WHERE `name` LIKE ? OR `email` LIKE ?",['%'.$q.'%','%'.$q.'%']);
//        foreach($data as $item){
//            $result['data'][] = array(
//                'id' => $item->id,
//                'title' => $item->name,
//                'description' => $item->email,
//                'link' => 'admin/users/'.$item->id.'/edit'
//            );
//        }  
//        
//        $data = DB::select("SELECT * FROM `admins` WHERE `name` LIKE ? OR `email` LIKE ?",['%'.$q.'%','%'.$q.'%']);
//        foreach($data as $item){
//            $result['data'][] = array(
//                'id' => $item->id,
//                'title' => $item->name,
//                'description' => $item->email,
//                'link' => 'admin/admins/'.$item->id.'/edit'
//            );
//        }          
        
//        $result['count'] = count($result['data']);
        
        return $data;
    }
    
}
