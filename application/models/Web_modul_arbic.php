<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_modul_arbic extends CI_Model
{
	
    function get_chats_services($user_id=NULL)
    {       
        if($user_id)
        {   
            $this->db->select('CR.*,users.name as Expert_name,ROUND(AVG(ratings.rating),1) as avgRate,categories.title as categoryName,subcategories.title as Sub-cat-Name');
            $this->db->from('chat_relation as CR');           
            $this->db->join('subcategories', 'CR.subcategory_id=subcategories.id');
            $this->db->join('categories', 'subcategories.category_id=categories.id');           
            $this->db->join('users', 'CR.responce_by=users.id');
            $this->db->join('ratings', 'CR.responce_by=ratings.expert_id','left');
            $this->db->where('CR.user_id', $user_id);            
            $this->db->order_by('CR.created_at','DESC');            
            $this->db->limit(5);            
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
            
            return $result;


        }
        return array();
    }



    function user_currnt_running_package($user_ID=NULL)
    {       
        if($user_ID)
        {   
            $this->db->select('packages.*');
            $this->db->from('user_subscription as USP');           
            $this->db->join('packages', 'USP.package_id=packages.id AND USP.status=1');
            $this->db->where('USP.user_id', $user_ID);                            
            $this->db->where('USP.expires_on >','CURDATE()',false);
            //$this->db->limit(1);            
            $result = $this->db->get()->row();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
            
            return $result;


        }
        return array();
    }

    function useful_link_list($type=null,$start_from=0,$upto=1){
        if($type=='count')
        {
            $this->db->select('UseLink.id');               
        }
        else
        {
          $this->db->select('UseLink.id,UseLink.title_arbic,LEFT(UseLink.description_arbic,100) as description,UseLink.created_on,UseLink.links');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('useful_links as UseLink');
          $this->db->order_by('UseLink.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;
        return $result->result();
   
    }

    function useful_document_list($type=null,$start_from=0,$upto=1){
        if($type=='count')
        {
            $this->db->select('legalDoc.id');               
        }
        else
        {
          $this->db->select('legalDoc.id,legalDoc.title_arbic,legalDoc.created_on,legalDoc.download_link');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('legal_document as legalDoc');
          $this->db->order_by('legalDoc.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;
        return $result->result();
   
    }

    function faq_list($type=null,$start_from=0,$upto=1){
        if($type=='count')
        {
            $this->db->select('faqs.id');               
        }
        else
        {
          $this->db->select('faqs.id,faqs.title_arbic,faqs.created_on,faqs.description_arbic');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('faqs');
          $this->db->order_by('faqs.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;
        return $result->result();
   
    }

    function lawyer_list($type=null,$start_from=0,$upto=1){
        if($type=='count')
        {
            $this->db->select('Alaw.id');               
        }
        else
        {
          $this->db->select('Alaw.id,Alaw.name,Alaw.created_on,Alaw.specialization');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('app_own_lawyers Alaw');
          $this->db->order_by('Alaw.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;
        return $result->result();
   
    }

    function remove_bookmark_article_table($articleID=null,$userID=null)
    {
        if($articleID && $userID)
        {
                    
            $this->db->select('article_ids');            
            $this->db->from('bookmarks');
            $this->db->where('user_id',$userID);
            $this->db->where('FIND_IN_SET('.$articleID.',article_ids)>',0,false);    
            $this->db->limit(1);
            $articles=$this->db->get()->result_array();          
            if(!empty($articles))
            {
                $articleIDarray= explode(',',$articles[0]['article_ids']);
                $articleIDarray=array_filter($articleIDarray);
                 if (($key = array_search($articleID, $articleIDarray)) !== false) {
                    unset($articleIDarray[$key]);
                }
                 $articleIDs =implode(',', $articleIDarray);
                 $this->db->where('user_id',$userID);
                $this->db->set('article_ids', $articleIDs);            
                 $this->db->update('bookmarks');
               
            }
            return true;

        }
            return false;         
        
    }


    function update_bookmark_article_table($articleID=null,$userID=null)
    {
        if($articleID && $userID)
        {
            $this->db->where('user_id',$userID);
            $this->db->where('!FIND_IN_SET('.$articleID.',article_ids)',null,false);            
            $this->db->set('article_ids', 'CONCAT(article_ids,\','.$articleID.'\')', FALSE);            
            $this->db->update('bookmarks');
           //echo $this->db->last_query();exit;
            
            return true;

        }
            return false;         
        
    }


   function remove_bookmark_news_table($newsID=null,$userID=null)
    {
        if($newsID && $userID)
        {
                    
            $this->db->select('news_ids');            
            $this->db->from('bookmarks');
            $this->db->where('user_id',$userID);
            $this->db->where('FIND_IN_SET('.$newsID.',news_ids)>',0,false);    
            $this->db->limit(1);
            $news=$this->db->get()->result_array();
            if(!empty($news))
            {
                $newsIDarray= explode(',',$news[0]['news_ids']);
                $newsIDarray=array_filter($newsIDarray);
                 if (($key = array_search($newsID, $newsIDarray)) !== false) {
                    unset($newsIDarray[$key]);
                }
                 $newsIDs =implode(',', $newsIDarray);
                 $this->db->where('user_id',$userID);
                 $this->db->set('news_ids', $newsIDs);            
                 $this->db->update('bookmarks');
               
            }
            return true;

        }
            return false;         
        
    }


    function update_bookmark_news_table($newsID=null,$userID=null)
    {
        if($newsID && $userID)
        {
            $this->db->where('user_id',$userID);
            $this->db->where('!FIND_IN_SET('.$newsID.',news_ids)',null,false);            
            $this->db->set('news_ids', 'CONCAT(news_ids,\','.$newsID.'\')', FALSE);            
            $this->db->update('bookmarks');
            //echo $this->db->last_query();exit;

            return true;

        }
            return false;
    }


      function bookmarked_article_list($type=null,$start_from=0,$upto=1,$userID=Null){
        if($type=='count')
        {
            $this->db->select('article.id');               
        }
        else
        {
          $this->db->select('article.id,article.title_arbic,article.image,article.id,LEFT(article.description_arbic,100) as description,article.created_on,');
          $this->db->select('IF(BOOK.id, "1", "0") as staus_book');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('article');
          $this->db->join('bookmarks as BOOK',"FIND_IN_SET(CAST(article.id AS CHAR), BOOK.article_ids) > 0 AND user_id='$userID'");
          $this->db->order_by('article.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;        
        return $result->result();
   
    }


    function bookmarked_news_list($type=null,$start_from=0,$upto=1,$userID=Null){
        if($type=='count')
        {
            $this->db->select('Lnews.id');               
        }
        else
        {
          $this->db->select('Lnews.id,Lnews.title_arbic,Lnews.image,LEFT(Lnews.description_arbic,100) as description,Lnews.created_on');
           $this->db->select('IF(BOOK.id, "1", "0") as staus_book');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('legal_news as Lnews');
          $this->db->join('bookmarks as BOOK',"FIND_IN_SET(CAST(Lnews.id AS CHAR), BOOK.news_ids) > 0 AND user_id='$userID'");
          $this->db->order_by('Lnews.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;
        return $result->result();
   
    }

    function chat_History($UserID=null,$startPoint=null)
    {
        if($UserID)
        {
            $this->db->select("chat_table.*,IF (chat_table.sender_id='Admin', 'Admin','User') as UserType,DATE_FORMAT(chat_table.created_at,'%I:%i:%s') TIMEONLY ");            
            $this->db->from('chat_table');
            $this->db->join('users as sender','chat_table.sender_id=sender.id','left');
            $this->db->join('users as reciver','chat_table.reciver_id=reciver.id','left');
             if($startPoint)
             {
                $this->db->where('chat_table.id<',$startPoint);
             }           
            $this->db->where('(chat_table.sender_id',$UserID,false);
            $this->db->or_where('chat_table.reciver_id',$UserID.')',false);
            $this->db->order_by('chat_table.created_at','DESC');
            //$this->db->order_by('chat_table.id','desc');          
            $this->db->limit(3);
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
           return array_reverse($result);
           

        }

    }


    function chat_Future($UserID=null,$startPoint=null)
    {
        if($UserID)
        {
            $this->db->select("chat_table.*,IF (chat_table.sender_id='Admin', 'Admin','User') as UserType,IF(sender.name, sender.name ,reciver.name) as Uname,DATE_FORMAT(chat_table.created_at,'%I:%i:%s') TIMEONLY ");            
            $this->db->from('chat_table');
            $this->db->join('users as sender','chat_table.sender_id=sender.id','left');
            $this->db->join('users as reciver','chat_table.reciver_id=reciver.id','left');
             if($startPoint)
             {
                $this->db->where('chat_table.id >',$startPoint);
             }           
            $this->db->where('(chat_table.sender_id',$UserID,false);
            $this->db->or_where('chat_table.reciver_id',$UserID.')',false);
            $this->db->order_by('chat_table.created_at','DESC');
            //$this->db->order_by('chat_table.id','desc');          
            $this->db->limit(3);
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
            $UpdateID=array();
            foreach ($result as $key => $value) {               
               if($value['UserType']=='Admin'){
                    array_push($UpdateID,$value['id']);
                }
            }
           
            if(!empty($UpdateID))
            {
                 $data=array('view_receiver'=>1);
                 $this->db->where_in('id', $UpdateID);  //here is where condition
                 $this->db->update('chat_table',$data);
            }

           
           return array_reverse($result);
           

        }

    }


    /*

All arbic page models


*/
    function article_list($type=null,$start_from=0,$upto=1,$userID=Null){
        if($type=='count')
        {
            $this->db->select('article.id');               
        }
        else
        {
          $this->db->select('article.id,article.title_arbic,article.image,article.id,LEFT(article.description_arbic,100) as description,article.created_on,');
          $this->db->select('IF(BOOK.id, "1", "0") as staus_book');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('article');
          $this->db->join('bookmarks as BOOK',"FIND_IN_SET(CAST(article.id AS CHAR), BOOK.article_ids) > 0 AND user_id='$userID'",'LEFT');
          $this->db->order_by('article.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;        
        return $result->result();
   
    }



    function news_list($type=null,$start_from=0,$upto=1,$userID=Null){
        if($type=='count')
        {
            $this->db->select('Lnews.id');               
        }
        else
        {
          $this->db->select('Lnews.id,Lnews.title_arbic,Lnews.image,LEFT(Lnews.description_arbic,100) as description,Lnews.created_on');
           $this->db->select('IF(BOOK.id, "1", "0") as staus_book');
            $this->db->limit($upto,$start_from);     
        }              
                   
          $this->db->from('legal_news as Lnews');
          $this->db->join('bookmarks as BOOK',"FIND_IN_SET(CAST(Lnews.id AS CHAR), BOOK.news_ids) > 0 AND user_id='$userID'",'LEFT');
          $this->db->order_by('Lnews.created_on','DESC');
        $result = $this->db->get();
        if($type=='count')
        {
         return  $result->num_rows();
        }
        //echo $this->db->last_query();exit;
        return $result->result();
   
    }




}