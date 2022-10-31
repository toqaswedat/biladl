<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	 


    function check_service_there_or_not($Record=NULL)
    {       
        if($Record)
        {   $this->db->select('id');
            $this->db->from('expert_service'); 
            $this->db->where($Record);
           return $result = $this->db->get()->result_array();
        }
        return array();
    }

    function get_requested_data($UserID=NULL)
    {       
        if($UserID)
        {   
            $this->db->select('RR.*,categories.title as categoryName,subcategories.title as Sub-cat-Name');
            $this->db->from('request_responce as RR');           
            $this->db->join('subcategories', 'RR.subcategory_id=subcategories.id');
            $this->db->join('categories', 'subcategories.category_id=categories.id');          
            $this->db->where('RR.user_id', $UserID);
            $this->db->order_by('RR.id','desc');
            $this->db->limit(1);            
            return $result = $this->db->get()->row();
        }
        return array();
    }

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

    function check_rating($user_id=NULL,$Conversion_ID=NULL)
    {       
        
        $this->db->where('convertion_id',$Conversion_ID);
        $this->db->where('user_id',$user_id);
        $Users = $this->db->get('ratings');
        if($Users->num_rows() > 0)
        {
            return true;
        }
        return false;
    }



     function set_rating($RecordData = NULL)
    {       
        if($RecordData)
        {               
            $this->db->insert('ratings', $RecordData);         
            return true;   
                       
        }     
        return true;
    }



    function get_comment_details($Expert_ID=NULL,$startPoint=0)
    {
        if($Expert_ID)
        {   
            $this->db->select('ratings.comment,ratings.rating,ratings.created_on,users.name');     
            $this->db->where('expert_id', $Expert_ID);
            $this->db->order_by('created_on','DESC');
            $this->db->limit(1,$startPoint);
            $this->db->join('users', 'users.id=ratings.user_id');
            $offer_comment = $this->db->get('ratings');
            //echo $this->db->last_query();exit;  
            if($offer_comment->num_rows() > 0)
            {
                return $offer_comment->result_array();
            }

            return array();         
        }
        return array();
    }




}