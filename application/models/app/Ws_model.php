<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ws_model extends CI_Model
{	

	function set_users($RecordData = NULL)
    {       
        if($RecordData)
        {               
            $this->db->insert('users', $RecordData);
            //echo $this->db->last_query();exit;   
            $insert_id = $this->db->insert_id();
            return $insert_id;           
        }
        return array();
    }  





    function get_users($user_id=NULL)
    {       
        if($user_id)
        {               
			$this->db->where('status', 1);
			$this->db->where('id', $user_id);
			$user_details = $this->db->get('users');   
			//echo $this->db->last_query();exit;
			if($user_details->num_rows() > 0)
			{
				return $user_details->row();
			}

			return array();         
        }
        return array();
    } 


    function user_login_status($mobile=NULL)
    {       
        $this->db->where('status', 0);
        $this->db->where('mobile', $mobile);
        $Users = $this->db->get('users');   
        //echo $this->db->last_query();exit;
        if($Users->num_rows() > 0)
        {
            return $Users->row();
        }
        return array();
    }

     function user_login($email, $password)
    {       
        
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $Users = $this->db->get('users');
        if($Users->num_rows() > 0)
        {
            return $Users->row();
        }
        return array();
    }


     function update_user($RecordData = NULL, $UserID = NULL)
    {       

        if($RecordData)
        {               
            $this->db->update('users', $RecordData, array('id' => $UserID));
            return true;   
        }
        return false;
    }

    
    
    function get_nofication_details($startPoint=0,$user_type="ALL",$usedID=null)
    {
         
            $this->db->order_by('created_on','DESC');            
            $this->db->where('send_to',$user_type);     
            $this->db->or_where('send_to','ALL');
            if($usedID)
            {
                 $this->db->or_where('send_to',$usedID);
            }           

            $this->db->limit(3,$startPoint);
            $notiFy_detail= $this->db->get('notifications'); 
            if($notiFy_detail->num_rows() > 0)
            {
                return $notiFy_detail->result_array();
            }

            return array();         
        
    }


    function get_faq_details($startPoint=0)
    {
         
            $this->db->order_by('created_on','DESC');
            $this->db->limit(10,$startPoint);
            $faq_Details= $this->db->get('faqs'); 
            if($faq_Details->num_rows() > 0)
            {
                return $faq_Details->result_array();
            }

            return array();         
        
    }


    function get_legal_news_details($userID='',$startPoint=0)
    {
         $this->db->select("news.id,news.title,news.title_arbic,news.image,news.created_on");
            $this->db->select("IF(bookmarks.user_id='$userID', 'YES', 'NO') as Bookmarked");
            $this->db->order_by('news.created_on','DESC');
            $this->db->from('legal_news as news');
            $this->db->join('bookmarks',"FIND_IN_SET(news.id, bookmarks.news_ids) AND bookmarks.user_id='$userID'",'left'); 
            $this->db->limit(10,$startPoint);
            $news_Details= $this->db->get(); 
            if($news_Details->num_rows() > 0)
            {
                return $news_Details->result_array();
            }

            return array();

           $this->db->select("article.id,article.title,article.title_arbic,article.image");
        
    }

    function get_news_details($newsID=null)
    {       
            if($newsID)
            {
            $this->db->where('id',$newsID);            
            $this->db->order_by('created_on','DESC');
            $news_Details= $this->db->get('legal_news'); 
            if($news_Details->num_rows() > 0)
            {
                return $news_Details->row();
            }

            return array();
            }         
        
    }


    function get_all_package()
    {
            $this->db->select("id,title,price,description,description_arbic,package_type,created_on");            
            $this->db->where('status',1,false);
            $this->db->order_by('title','ASC'); 
            //$this->db->order_by('created_on','DESC');            
            $package_Details= $this->db->get('packages'); 
            if($package_Details->num_rows() > 0)
            {
                return $package_Details->result_array();
            }

            return array();         
        
    }


    function get_package_details($packageID=null)
    {       
            if($packageID)
            {
            $this->db->where('id',$packageID);            
            $this->db->order_by('created_on','DESC');
            $package_Details= $this->db->get('packages'); 
            if($package_Details->num_rows() > 0)
            {
                return $package_Details->row();
            }

            return array();
            }         
        
    }

    function get_subscribed_package_details($userID=null)
    {       
            if($userID)
            {
                
            $cdate=date('Y-m-d H:i:s');
            $this->db->select('user_subscription.*,pak.title');                
            $this->db->from('user_subscription');
            $this->db->join('packages as pak','user_subscription.package_id=pak.id');
            $this->db->where('user_subscription.status',1);
            $this->db->where('user_subscription.user_id',$userID);                
            $this->db->where('user_subscription.expires_on >=',$cdate);                
            $this->db->order_by('user_subscription.id','DESC');
            $subscribed_Details= $this->db->get(); 
            //echo $this->db->last_query();exit;

            if($subscribed_Details->num_rows() > 0)
            {
                return $subscribed_Details->row();
            }

            return array();
            }         
        
    }


    function get_ulseFul_links($startPoint=0)
    {
         
            $this->db->order_by('created_on','DESC');
            $this->db->limit(10,$startPoint);
            $useful_links= $this->db->get('useful_links'); 
            if($useful_links->num_rows() > 0)
            {
                return $useful_links->result_array();
            }

            return array();         
        
    }

    function get_all_article($userID='')
    {
            $this->db->select("article.id,article.title,article.title_arbic,article.image");
            $this->db->select("IF(bookmarks.user_id='$userID', 'YES', 'NO') as Bookmarked");
            $this->db->order_by('article.created_on','DESC');            
            $this->db->from('article');            
            $this->db->join('bookmarks',"FIND_IN_SET(article.id, bookmarks.article_ids) AND bookmarks.user_id='$userID'",'left');            
            $article_Details= $this->db->get();
            // echo $this->db->last_query();exit; 
            if($article_Details->num_rows() > 0)
            {
                return $article_Details->result_array();
            }

            return array();         
        
    }


    function get_article_details($articleID=null)
    {       
            if($articleID)
            {
            $this->db->where('id',$articleID);            
            $this->db->order_by('created_on','DESC');
            $article_Details= $this->db->get('article'); 
            if($article_Details->num_rows() > 0)
            {
                return $article_Details->row();
            }

            return array();
            }         
        
    }


    function get_legal_documents($startPoint=0)
    {
         
            $this->db->order_by('created_on','DESC');
            $this->db->limit(10,$startPoint);
            $document_Details= $this->db->get('legal_document'); 
            if($document_Details->num_rows() > 0)
            {
                return $document_Details->result_array();
            }

            return array();         
        
    }


    function get_all_topic()
    {
            
            $this->db->order_by('created_on','DESC');            
            $topic_Details= $this->db->get('advice_topics'); 
            if($topic_Details->num_rows() > 0)
            {
                return $topic_Details->result_array();
            }

            return array();         
        
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

    function bookmark_articles($userID=null)
    {
            if($userID)
            {
                $this->db->select("article_ids");
                $this->db->where('user_id',$userID);
                        $id_Details= $this->db->get('bookmarks');
                        $ids=array_unique(explode(',',$id_Details->row()->article_ids));
                        $ids=array_filter($ids);
                          if(empty($ids)){ return  array(); }
                $this->db->select("id,title,title_arbic,image,created_on");
                $this->db->where_in('id',$ids);
                $this->db->order_by('created_on','DESC');            
                        $article_Details= $this->db->get('article');
                //echo $this->db->last_query();exit;

                if($article_Details->num_rows() > 0)
                {
                    return $article_Details->result_array();
                }
            }
            

            return array();         
        
    }

    function bookmark_news($userID=null)
    {
        if($userID)
        {
            $this->db->select("news_ids");
            $this->db->where('user_id',$userID);
            $id_Details= $this->db->get('bookmarks');
            $ids=array_unique(explode(',',$id_Details->row()->news_ids));
            $ids=array_filter($ids);
            if(empty($ids)){ return  array(); }
            $this->db->select("id,title,title_arbic,image,created_on");                
            $this->db->where_in('id',$ids);
            $this->db->order_by('created_on','DESC');            
                    $article_Details= $this->db->get('legal_news');
            //echo $this->db->last_query();exit;
            if($article_Details->num_rows() > 0)
            {
                return $article_Details->result_array();
            }
        }
        return array();
    }

    function search_content_by_keyworkds($Search_type=Null,$keywords=null)
    {
        if($Search_type && $keywords)
        {
            switch ($Search_type) {
                case 'NEWS':
                    $table="legal_news";

                    break;

                case 'ARTICLE':
                    $table="article";
                    
                    break;
                case 'USEFUL_LINKS':
                    $table="useful_links";
                    
                    break;

                case 'LEGAL_DOC':
                    $table="legal_document";
                    
                    break;
                case 'APP_LAWYER':
                    $table="app_own_lawyers";
                    
                    break;
                case 'FAQ':
                    $table="faqs";
                    
                    break;
				
				case 'CHAT':
                    $table="chat_table";
                    
                    break;                    
                
                default:
                    $table="faqs";
                    break;
            }

            $filds_list=$this->db->list_fields($table);

            $this->db->from($table);

            if(!empty($filds_list))
            {
             $where  = "(";
             $ORS='';
             foreach ($filds_list as $key => $colomn_name) {                
                $where .= " $ORS LOWER($colomn_name) LIKE '%$keywords%'  ";
                $ORS="OR"; 

             }
             $where  .= ")";

             $this->db->where($where);
            }

            $this->db->order_by('id','DESC');
            $this->db->limit(10);
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }            

        }  
            return $result;
        
       
    }



    function get_message_convertion($Sender_ID=Null,$start=0)
    {
        if($Sender_ID)
        {               
            $this->db->from('chat_table');
            $this->db->where('sender_id',$Sender_ID);           
            $this->db->or_where("reciver_id",$Sender_ID);
           // $this->db->where('id <',$End);            
            $this->db->order_by('created_at','DESC');
            $this->db->limit(10,$start);
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
            

        }  
            return $result;
        
       
    }





}