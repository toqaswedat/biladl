<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expert_model extends CI_Model
{
	 


    function get_exp_services($Exp_id=NULL)
    {       
        if($Exp_id)
        {   $this->db->select('categories.*,subcategories.title as subcategories,subcategories.id as subcategoriesID ');
            $this->db->from('expert_service');           
            $this->db->join('subcategories', 'expert_service.subcategory_id=subcategories.id');
            $this->db->join('categories', 'subcategories.category_id=categories.id');          
            $this->db->where('status', 1);
            $this->db->where('expert_service.expert_id', $Exp_id);
            return $result = $this->db->get()->result_array();

                  
        }
        return array();
    }


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


    function get_request_services($Exp_id=NULL)
    {       
        if($Exp_id)
        {   
            $this->db->select('RR.*,categories.title as categoryName,subcategories.title as Sub-cat-Name');
            $this->db->from('request_responce as RR');           
            $this->db->join('subcategories', 'RR.subcategory_id=subcategories.id');
            $this->db->join('categories', 'subcategories.category_id=categories.id');
            $this->db->join('expert_service', 'RR.subcategory_id=expert_service.subcategory_id');
            $this->db->where('expert_service.expert_id', $Exp_id);
            $this->db->where('expert_service.avalible',1);
            $this->db->where('expert_service.status',1);
            $this->db->where('RR.view_status',0);
            $this->db->where('RR.responce_by',0);
            $this->db->order_by('RR.id','RANDOM');
            $id='('.$Exp_id.')';           
            $this->db->not_like('RR.expert_visitors',$id);
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

    function book_request_or_avalibitity($expertID=NULL,$requstID=NULL)
    {       
        if($expertID && $requstID)
        { 
            $data= array('responce_by' => $expertID,'view_status' => 1);
            $this->db->set($data);
            $this->db->where('id', $requstID);
            $this->db->update('request_responce');
            if($this->db->affected_rows() > 0)
            {
                return true;
            }

        }
        return FALSE;
    }


    function ignore_request_services($expertID=NULL,$requstID=NULL)
    {       
        if($expertID && $requstID)
        { 
            $this->db->set('expert_visitors', 'CONCAT(expert_visitors,\'('.$expertID.'), \')', FALSE);
            $this->db->where('id', $requstID);
            $this->db->update('request_responce');

            return true;

        }
        return FALSE;
    }


    function make_chat_conversion($expertID=NULL,$requstID=NULL)
    {       
        if($expertID && $requstID)
        { 
            
            $query = $this->db->query("INSERT chat_relation (category_id, subcategory_id,image,product_name,location,description,user_id,created_at,responce_by) SELECT category_id, subcategory_id,image,product_name,location,description,user_id,created_at,responce_by FROM request_responce WHERE id='$requstID' AND responce_by='$expertID'");
            
            if($query)
            $this->db->delete('request_responce', array('id' => $requstID));             

            return true;

        }
        return FALSE;
    }


    function get_chats_services($Exp_id=NULL)
    {       
        if($Exp_id)
        {   
            $this->db->select('CR.*,users.name,categories.title as categoryName,subcategories.title as Sub-cat-Name');
            $this->db->from('chat_relation as CR');           
            $this->db->join('subcategories', 'CR.subcategory_id=subcategories.id');
            $this->db->join('categories', 'subcategories.category_id=categories.id');
            $this->db->join('expert_service', 'CR.subcategory_id=expert_service.subcategory_id');
            $this->db->join('users', 'CR.user_id=users.id');
            $this->db->where('expert_service.expert_id', $Exp_id);
            $this->db->where('expert_service.avalible',1);
            $this->db->where('expert_service.status',1);
            $this->db->where('CR.responce_by',$Exp_id);
            $this->db->order_by('CR.created_at','DESC');            
            $this->db->limit(5);            
            $result = $this->db->get()->result_array();
            if(empty($result))
            {
                return array();
                
            }
            
            return $result;


        }
        return array();
    }












}