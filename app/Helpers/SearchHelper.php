<?php

namespace App\Helpers;

use App\Blog;
use Illuminate\Support\Facades\DB;

class SearchHelper {

    public static function search($q){
        
        $arrParams = array();
        for ($i = 0; $i < 12; $i++){
            $arrParams[] = '%'.$q.'%';
        }
        $query = "
               SELECT 'blogs' as 'type',blogs.id, null as cat_id, blogs.title, blogs.text FROM blogs WHERE title LIKE ? OR text LIKE ? 
               UNION 
               SELECT 'categories',categories.id, null as cat_id, categories.name, categories.description FROM `categories` WHERE `name` LIKE ? OR description LIKE ? 
               UNION 
               SELECT 'products',products.id, products.cat_id, products.name, products.description FROM `products` WHERE `name` LIKE ? OR description LIKE ? 
               UNION 
               SELECT 'services',services.id, null as cat_id, services.name, services.description FROM `services` WHERE `name` LIKE ? OR description LIKE ? 
               UNION 
               SELECT 'users',users.id, null as cat_id, users.name, users.email FROM `users` WHERE `name` LIKE ? OR email LIKE ?
               UNION 
               SELECT 'admins',admins.id, null as cat_id, admins.name, admins.email FROM `admins` WHERE `name` LIKE ? OR email LIKE ? 
                ";
        $data = collect(DB::select($query, $arrParams));
        
        foreach ($data as $key => &$item){
            switch ($item->type){
                case 'blogs':
                    $blog = Blog::find($item->id);
                    if (!GateHelper::all('VIEW_BLOGS','UPDATE_BLOGS', ['blog' => $blog])){                        
                        $data->forget($key);
                        continue;
                    } else {
                        $item->link = '/admin/blogs/' . $item->id . '/edit';
                        break;      
                    }

                case 'categories':
                    if (!GateHelper::all('VIEW_CATEGORIES','CREATE_CATEGORIES')){
                        $data->forget($key);
                        continue;
                    } else {
                        $item->link = '/admin/cat/' . $item->id . '/edit';
                        break;                       
                    }
                case 'products':
                    if (!GateHelper::all('VIEW_CATEGORIES','CREATE_CATEGORIES')){
                        $data->forget($key);
                        continue;                        
                    } else {
                        $item->link = '/admin/products/edit/' . $item->id . '/' . $item->cat_id;
                        break;                        
                    }

                case 'services':
                    if (!GateHelper::all('VIEW_SERVICES','UPDATE_SERVICES')){
                        $data->forget($key);
                        continue;                         
                    } else {
                        $item->link = '/admin/services/' . $item->id . '/edit';
                        break;                       
                    }

                case 'users':
                    if (!GateHelper::all('VIEW_USERS','UPDATE_USERS')){
                        $data->forget($key);
                        continue;                         
                    } else {
                        $item->link = '/admin/users/' . $item->id . '/edit';
                        break;                       
                    }
                    $item->link = '/admin/users/' . $item->id . '/edit';
                    break;
                case 'admins':
                    if (!GateHelper::all('VIEW_ADMINS','UPDATE_ADMINS')){
                        $data->forget($key);
                        continue;                          
                    } else {
                        $item->link = '/admin/admins/' . $item->id . '/edit';
                        break;                        
                    }
            }
        }

        $total = count($data);
        $items_per_page = 5;
        $pages_count = intval(ceil($total / $items_per_page));
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $items = $data->forPage($page, $items_per_page); //Filter the page var

        return array(
            'items' => $items,
            'items_per_page' => $items_per_page,
            'pages_count' => $pages_count,
            'total' => $total,
            'page' => $page
        );
    }
    
}
