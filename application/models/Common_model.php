<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
    

    function inset_to_tbl($TableName=Null,$RecordData=NULL)
    {
        if($TableName!=NULL && $RecordData!=NULL)
        {            
            if($this->db->insert($TableName, $RecordData))
            return ($this->db->affected_rows() < 1) ? false : true;
        }

        return false;
       
    }

    function inset_to_batch($TableName=Null,$RecordData=NULL)
    {
        if($TableName!=NULL && $RecordData!=NULL)
        {            
            if($this->db->insert_batch($TableName, $RecordData))
            return ($this->db->affected_rows() < 1) ? false : true;
        }

        return false;
       
    }


    function check_id_is_present($TableName=Null,$ConditionData=NULL)
    {





        if($TableName!=NULL)
        { 
            if($ConditionData)
            {
                 $this->db->where($ConditionData);
            }

            $record_details = $this->db->get($TableName);   
            //echo $this->db->last_query();exit;
            return ($record_details->num_rows() < 1) ? false : true;
            
        }

        return false;
       
    }



    function check_noof_row($TableName=Null,$ConditionData=NULL)
    {
        if($TableName!=NULL)
        { 
            if($ConditionData)
            {
                 $this->db->where($ConditionData);
            }

           return $record_details = $this->db->get($TableName)->num_rows();  
            //echo $this->db->last_query();exit;
         
            
        }

        return 0;
       
    }


    function get_one_row_data($TableName=NULL, $ConditionData=NULL)
    {    

        if($TableName!=NULL)
        { 
            if($ConditionData)
            {
                 $this->db->where($ConditionData);
            }
                 $record_details = $this->db->get($TableName);
                //echo $this->db->last_query();exit;

            if($record_details->num_rows() > 0)
            {
                 return $record_details->row();
            }
                 return array(); 
        }

        
    }

    function user_details($userID)
  {
    
    $this->db->where('users.id', $userID);
    $this->db->select('users.*');
    
    $users = $this->db->get('users');  
    //echo $this->db->last_query();exit;
    if($users->num_rows() > 0)
    {
      return $users->result();
    }
    return array();
  }

    function get_list_colomn_name($TableName=NULL)
    { 
      //       $fields = $this->db->field_data($TableName);
      //       foreach ($fields as $field)
      //       {
      //           echo $field->name;
      //           echo $field->type;
      //           echo $field->max_length;
      //           echo $field->primary_key.'<br>';
      //       }
      //       exit();
      return (object) array_fill_keys($this->db->list_fields($TableName), '');
      //return $this->db->list_fields($TableName);
    }

     function get_one_row_with_colomn($TableName=NULL,$fieldNames='*', $ConditionData=NULL)
    {    

        if($TableName!=NULL)
        { 
            if($ConditionData)
            {
                 $this->db->where($ConditionData);
            }
                 $this->db->select($fieldNames);

                 $record_details = $this->db->get($TableName);
                //echo $this->db->last_query();exit;

            if($record_details->num_rows() > 0)
            {
                 return $record_details->row();
            }
                 return array(); 
        }

        
    }



    function update_to_tbl($TableName=Null,$RecordData=NULL,$condition=null)
    {
        if($TableName!=NULL && $RecordData!=NULL && $condition!=NULL)
        {   
            $this->db->where($condition);            
            $this->db->update($TableName,$RecordData);
            //echo $this->db->last_query();exit;

             return true;
          
        }

        return false;
       
    }

    function get_tables_records($TableName=NULL,$fieldNames='*', $ConditionData=NULL,$order_by=null)
    {       
       
        if($TableName!=NULL)
        { 
            if($ConditionData)
            {
                 $this->db->where($ConditionData);
            }

              if($order_by && is_array($order_by))
              {

                foreach ($order_by as $key => $value) {

                    $this->db->order_by($key,$value);
                } 
             
              }

                 $this->db->select($fieldNames);

                 $record_details = $this->db->get($TableName);
                //echo $this->db->last_query();exit;

            if($record_details->num_rows() > 0)
            {
                 return $record_details->result();
            }
                 return array(); 
        }

        return array(); 
        
    }


function get_tables_records_array($TableName=NULL,$fieldNames='*', $ConditionData=NULL,$order_by=null)
    {       
       
        if($TableName!=NULL)
        { 
            if($ConditionData)
            {
                 $this->db->where($ConditionData);
            }

              if($order_by && is_array($order_by))
              {

                foreach ($order_by as $key => $value) {

                    $this->db->order_by($key,$value);
                } 
             
              }

                 $this->db->select($fieldNames);

                 $record_details = $this->db->get($TableName);
                //echo $this->db->last_query();exit;

            if($record_details->num_rows() > 0)
            {
                 return $record_details->result_array();
            }
                 return array(); 
        }

        return array(); 
        
    }



    public function delete_by_condition($tblname=null,$condition=null)
    {
        if($tblname && $condition)
        {     
           
             $this->db->where($condition);
             $this->db->delete($tblname);

             
            if ($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
             
            return true;
        }
           
        return false;
    }   

        public function DelOne_by_condition($tblname=null,$condition=null)
    {
        if($tblname && $condition)
        {     
           
             $this->db->where($condition);
             $this->db->limit(1);             
             $this->db->delete($tblname);

            if ($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
             
            return true;
        }
           
        return false;
    }
    
    function delete_unset_user($keywords='')
    {
        if($keywords!='')
        {  
           $this->db->group_start();
           $this->db->where('mobile',$keywords);           
           $this->db->or_where("email",$keywords);
           $this->db->group_end();
           $this->db->where('status',8);
           $this->db->limit(1);
           $this->db->delete('users');
           //echo $this->db->last_query();  exit; 
             if ($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
              echo $this->db->last_query();  exit; 
            return true;
            

        }  
            return $result;
    }




}