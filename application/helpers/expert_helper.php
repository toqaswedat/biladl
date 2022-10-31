<?php
defined('BASEPATH') OR exit('No direct script access allowed');





if( ! function_exists('category_separator')){
    function category_separator($all_service)
    {
    	$new_service=array();        
        foreach ($all_service as $key => $value) {
        $catid=$value['id'];
        if(!array_key_exists($catid, $new_service))
        {
            $new_service[$catid]['title']=$value['title'];
            $new_service[$catid]['all_subcats']='';
            $new_service[$catid]['subcats']=array();

        }

        $new_service[$catid]['all_subcats'].=$value['subcategories'].',';
        $temparray['subcat_ID']=$value['subcategoriesID'];        
        $temparray['subcat_title']=$value['subcategories'];
        array_push($new_service[$catid]['subcats'],$temparray);

         }
		return $new_service;
	}
}