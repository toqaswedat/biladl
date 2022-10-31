<?php
class Registermodel extends CI_Model
{


    /*---------- Users ------------*/

    public function AllUsers($pdata, $getcount=null)
    {
        $columns = array
        (            
            0 => 'mobile',
        );
        $search_1 = array
        (
            1 => 'users.mobile',          
        );        
        if(isset($pdata['search_text_1'])!="")
        {
            $this->db->like($search_1[$pdata['search_on_1']], $pdata['search_text_1'], $pdata['search_at_1'] ); 
        }
        if($getcount)
        {
            return $this->db->select('id')->from('users')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('users.*,(CASE WHEN users.status=1 THEN "ACTIVE" ELSE "DEACTIVE" END) as Userstatus')->from('users')->order_by('id','desc');
        }
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $orderby_field = $columns[$pdata['order'][0]['column'] ];   
            $orderby = $pdata['order']['0']['dir'];
            $this->db->order_by($orderby_field,$orderby);
            $this->db->limit($perpage,$limit);
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();       
        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    /*---------- /Users ------------*/




 /*---------- /Notifications ------------*/

    public function ALLNotificaton($pdata, $getcount=null)
    {
        
        if($getcount)
        {
            return $this->db->select('id')->from('notifications')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('*');
            $this->db->from('notifications');
        }
        
        $this->db->order_by('id','desc');
        
          if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();       
        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
      
    }

 /*---------- /Notification ------------*/




    /*---------- Topics ------------*/


      public function AllTopics($pdata, $getcount=null)
    {
        $generatesno=1;
        if($getcount)
        {
            return $this->db->select('id')->from('advice_topics')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('advice_topics.*');
            $this->db->from('advice_topics');            
            $this->db->order_by('advice_topics.topics','ASC');


        }
         if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    /*---------- END Topics ------------*/


        /*---------- All Countries ------------*/


    public function Allcountries($pdata, $getcount=null)
    {
        $columns = array
        (            
            0 => 'countries.country_name',
        );
        $search_1 = array
        (
            1 => 'countries.country_name',          
        );        
        if(isset($pdata['search_text_1'])!="")
        {
            $this->db->like($search_1[$pdata['search_on_1']], $pdata['search_text_1'], $pdata['search_at_1'] ); 
        }
       
        if($getcount)
        {   return $this->db->select('id')->from('countries')->order_by('id','desc')->get()->num_rows();
        }
        else
        {
            $this->db->select('countries.*');
            $this->db->from('countries');            
            $this->db->order_by('countries.id','ASC');


        }
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    /*---------- END Country ------------*/

            /*---------- All Cities ------------*/


    public function Allcities($pdata, $getcount=null)
    {
        $columns = array
        (            
            0 => 'cities.name',
        );
        $search_1 = array
        (
            1 => 'cities.name',          
        );        
        if(isset($pdata['search_text_1'])!="")
        {
            $this->db->like($search_1[$pdata['search_on_1']], $pdata['search_text_1'], $pdata['search_at_1'] ); 
        }
        $generatesno = 1;
        if($getcount)
        {  
           $this->db->select('cities.id')->from('cities');
           $this->db->join('countries','cities.cid=countries.id','left');
             return $this->db->order_by('countries.country_name','ASC')->get()->num_rows();
        }
        else
        {
            $this->db->select('cities.*,countries.country_name');
            $this->db->from('cities');            
            $this->db->join('countries','cities.cid=countries.id','left');            
            $this->db->order_by('countries.country_name','ASC');
        }
         if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    
    }

    /*---------- END Country ------------*/
















    
    
        /*---------- Admin lawyer ------------*/
    
    public function AllAdminLawyer($pdata, $getcount=null)
    {
        $generatesno=1;
        if($getcount)
        {
            return $this->db->select('id')->from('app_own_lawyers')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('app_own_lawyers.*');
            $this->db->from('app_own_lawyers');            
            $this->db->order_by('app_own_lawyers.name','ASC');

        }
        $result = $this->db->get()->result_array();       
        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    /*---------- Admin lawyer ------------*/


    public function Allpackages($pdata, $getcount=null)
    {
        $columns = array
        (            
            0 => 'title',
        );
       

        if($getcount)
        {
            return $this->db->select('id')->from('packages')->where('status',1)->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('packages.*');
            $this->db->from('packages');
            $this->db->where('status',1);
           
        }
          
       
        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(title) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(price) LIKE '%$searchFor%' OR";
                
                $where .= " LOWER(total_days) LIKE '%$searchFor%' OR";
                $where .= " LOWER(package_type) LIKE '%$searchFor%')";
                $this->db->where($where);
        }
            

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }



    public function Allfaqs($pdata, $getcount=null)
    {
        
       

        if($getcount)
        {
            return $this->db->select('id')->from('faqs')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('faqs.*');
            $this->db->from('faqs');
            
        }
          
       
        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(title) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(description) LIKE '%$searchFor%' OR";
                $where .= " LOWER(created_on) LIKE '%$searchFor%')";
                $this->db->where($where);
        }
            

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }


    public function Articles($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            return $this->db->select('id')->from('article')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('article.*');
            $this->db->from('article');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(title) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(description) LIKE '%$searchFor%' OR";
                $where .= " LOWER(created_on) LIKE '%$searchFor%')";
                $this->db->where($where);
        }

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }


    public function legal_news($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            return $this->db->select('id')->from('legal_news')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('legal_news.*');
            $this->db->from('legal_news');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(title) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(description) LIKE '%$searchFor%' OR";
                $where .= " LOWER(created_on) LIKE '%$searchFor%')";
                $this->db->where($where);
        }

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    public function Useful_links($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            return $this->db->select('id')->from('useful_links')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('useful_links.*');
            $this->db->from('useful_links');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(title) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(description) LIKE '%$searchFor%' OR";
                $where .= " LOWER(links) LIKE '%$searchFor%' OR";
                $where .= " LOWER(created_on) LIKE '%$searchFor%')";
                $this->db->where($where);
        }

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    public function Download_document($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            return $this->db->select('id')->from('legal_document')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('legal_document.*');
            $this->db->from('legal_document');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(title) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(download_link) LIKE '%$searchFor%' OR";
                $where .= " LOWER(created_on) LIKE '%$searchFor%')";
                $this->db->where($where);
        }

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    public function View_all_lawyer($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            $this->db->select('users.id')->from('users');
            $this->db->where('type','lawyer');
            return $this->db->order_by('users.id','desc')->get()->num_rows();   
        }
        else
        {
            $this->db->select('users.id as lawyer_id,users.status,users.name,users.email,users.mobile,users.created_at,LD.*');
            $this->db->from('users');
            $this->db->join('lawyer_details LD','users.id=LD.user_id');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(users.name) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(users.email) LIKE '%$searchFor%' OR";
                $where .= " LOWER(users.mobile) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.identity_no) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.city_name) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.nationality) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.licence_no) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.district_name) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.languages) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.specialization) LIKE '%$searchFor%' OR";
                $where .= " LOWER(LD.gender) LIKE '%$searchFor%' OR";
                $where .= " LOWER(users.created_at) LIKE '%$searchFor%')";
                $this->db->where($where);
        }
             $this->db->where('type','lawyer');
         $this->db->order_by('users.id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }

    public function View_all_student($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            $this->db->select('users.id')->from('users');
            $this->db->where('type','student');
                return $this->db->order_by('users.id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('users.id as student_id,users.status,users.name,users.email,users.mobile,users.created_at,SD.*');
            $this->db->from('users');
            $this->db->join('students_details SD','users.id=SD.user_id');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(users.name) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(users.email) LIKE '%$searchFor%' OR";
                $where .= " LOWER(users.mobile) LIKE '%$searchFor%' OR";
                $where .= " LOWER(SD.identity_no) LIKE '%$searchFor%' OR";
                $where .= " LOWER(SD.current_city) LIKE '%$searchFor%' OR";
                $where .= " LOWER(SD.instiutute_name) LIKE '%$searchFor%' OR";
                $where .= " LOWER(SD.course_name) LIKE '%$searchFor%' OR";
                $where .= " LOWER(SD.specialzation) LIKE '%$searchFor%' OR";
                $where .= " LOWER(SD.gender) LIKE '%$searchFor%' OR";
                $where .= " LOWER(users.created_at) LIKE '%$searchFor%')";
                $this->db->where($where);
        }
        $this->db->where('type','student');
        $this->db->order_by('users.id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
       // echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }


    public function View_all_members($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            $this->db->select('users.id')->from('users');
            $this->db->where('type','member');
        return $this->db->order_by('users.id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('users.id as member_id,users.status,users.name,users.email,users.mobile,users.created_at,MD.*');
            $this->db->from('users');
            $this->db->join('memeber_details MD','users.id=MD.user_id');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(users.name) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(users.email) LIKE '%$searchFor%' OR";
                $where .= " LOWER(users.mobile) LIKE '%$searchFor%' OR";
                $where .= " LOWER(MD.county_code) LIKE '%$searchFor%' OR";
                $where .= " LOWER(MD.nationality) LIKE '%$searchFor%' OR";
                $where .= " LOWER(MD.country) LIKE '%$searchFor%' OR";
                $where .= " LOWER(MD.region) LIKE '%$searchFor%' OR";
                $where .= " LOWER(MD.dob) LIKE '%$searchFor%' OR";
                $where .= " LOWER(MD.gender) LIKE '%$searchFor%' OR";
                $where .= " LOWER(users.created_at) LIKE '%$searchFor%')";
                $this->db->where($where);
        }
        $this->db->where('type','member');
        $this->db->order_by('users.id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
       // echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }





    public function needAdvice($pdata, $getcount=null)
    {       
       

        if($getcount)
        {
            return $this->db->select('id')->from('advices')->order_by('id','desc')->get()->num_rows();  
        }
        else
        {
            $this->db->select('advices.*');
            $this->db->from('advices');
        }

        if(isset($pdata['search_text_1']) && $pdata['search_text_1'] !="")
        { 
           $searchFor=strtolower($pdata['search_text_1']); 
                        $where  = "(LOWER(topic) LIKE '%$searchFor%' OR ";
                $where .= " LOWER(question_heading) LIKE '%$searchFor%' OR";
                $where .= " LOWER(description) LIKE '%$searchFor%' OR";
                $where .= " LOWER(city) LIKE '%$searchFor%' OR";
                $where .= " LOWER(email_id) LIKE '%$searchFor%' OR";
                $where .= " LOWER(mobile) LIKE '%$searchFor%' OR";
                $where .= " LOWER(created_on) LIKE '%$searchFor%')";
                $this->db->where($where);
        }

         $this->db->order_by('id','desc');
        if(isset($pdata['length']))
        {
            $perpage = $pdata['length'];
            $limit = $pdata['start'];
            $generatesno=$limit+1;
            $this->db->limit($perpage,$limit);  
        }
        else
        {
            $generatesno = 0;
        }
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();  exit;          

        foreach($result as $key=>$values)
        {
            $result[$key]['sno'] = $generatesno++;
        }
        return $result;
    }



        /* -------Other functions */

        function Update_tbl($tblname=NULL,$rowID = NULL,$data=NULL)
    {       
        if($rowID && $tblname)
        {   
            $this->db->where('id',$rowID); 
            $this->db->update($tblname, $data);
            return true;           
        }
        return false;
    }

    function set_topic($RecordData = NULL)
    {       
        if($RecordData)
        {               
            $this->db->insert('advice_topics', $RecordData);
            
            //$insert_id = $this->db->insert_id();
            return true;           
        }
        return false;
    } 

     function delete_row_id($tblname=NULL,$banID = NULL)
    {       
        if($banID && $tblname)
        {  
            $this->db->where('id',$banID);
            $this->db->delete($tblname);
            return true;           
        }
        return false;
    }


    public function check_id_is_present($tblname=null,$condition=null)
    {
        if($tblname && $condition)
        {     
             $this->db->select('id');
             $this->db->where($condition);            
             $this->db->from($tblname);
             $result = $this->db->get()->result_array();
        }
           
        return $result;
    }


        /* -------END Other functions */



    public function delete_by_condition($tblname=null,$condition=null)
    {
        if($tblname && $condition)
        {     
           
             $this->db->where($condition);
             $this->db->delete($tblname);
            return true;
        }
           
        return false;
    }   

    

    
    function get_image_Url($tblname=NULL,$banID = NULL)
    {       
        if($banID && $tblname)
        {               
           
            $this->db->select('image');
            $this->db->where('id',$banID);            
            $this->db->from($tblname);
            
        return $result = $this->db->get()->row();       
                    
        }
        return array();
    } 



    function get_row_data($tblname=NULL,$banID = NULL)
    {       
        if($banID && $tblname)
        {    
            $this->db->where('id',$banID);            
            $this->db->from($tblname);
            
        return $result = $this->db->get()->row();       
                    
        }
        return array();
    }

    function chat_convertion($UserID=null,$startPoint=null)
    {
        if($UserID)
        {
            $this->db->select("chat_table.*,IF (chat_table.sender_id='Admin', 'Admin','User') as UserType,DATE_FORMAT(chat_table.created_at,'%I:%i:%s') TIMEONLY ");            
            $this->db->from('chat_table');
            $this->db->join('users as sender','chat_table.sender_id=sender.id','left');
            $this->db->join('users as reciver','chat_table.reciver_id=reciver.id','left');            
            $this->db->where('chat_table.sender_id',$UserID);
            $this->db->or_where('chat_table.reciver_id',$UserID);
            $this->db->order_by('chat_table.created_at','DESC');
            //$this->db->order_by('chat_table.id','desc');          
            $this->db->limit(6);
            $result = $this->db->get()->result();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
              
                 $data=array('view_receiver'=>1);
                 $this->db->where('sender_id', $UserID);  //here is where condition
                 $this->db->update('chat_table',$data);

                 return array_reverse($result);
           

        }

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
            $this->db->select("chat_table.*,IF (chat_table.sender_id='Admin', 'Admin','User') as UserType,DATE_FORMAT(chat_table.created_at,'%I:%i:%s') TIMEONLY ");            
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
            //$this->db->limit(3);
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
            $UpdateID=array();
            foreach ($result as $key => $value) {               
               if($value['UserType']=='User'){
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

    function chat_nofication()
    {
           
            $this->db->group_by('sender_id');
            $this->db->select("chat_table.*, DATE_FORMAT(chat_table.created_at,'%I:%i:%s') as TIMEONLY,sender.name");            
            $this->db->from('chat_table');
            $this->db->join('users as sender','chat_table.sender_id=sender.id');
            $this->db->where('chat_table.reciver_id','Admin');
            $this->db->where('chat_table.view_receiver',0);
            $this->db->order_by('chat_table.created_at','DESC');
            //$this->db->order_by('chat_table.id','desc');          
            //$this->db->limit(3);
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
            if(empty($result))
            {
                return array();
                
            }
           return array_reverse($result);
           

       

    }


    function set_notification($RecordData = NULL)
    {       
        if($RecordData)
        {               
            $this->db->insert('notifications', $RecordData);
           // $insert_id = $this->db->insert_id();
            return true;           
        }
        return false;
    }
 




    /*---------- Admin Details ------------*/

    public function AdminDetails()
    {
        $query = $this->db->get('admin');      
        return $query->row();
    }

    public function UpdatePassword($data)
    {
        // $this->db->where('AdminID', 1);
        $this->db->update('admin', $data); 
        //echo $this->db->last_query();  exit;          
        return true;
    }

    /*---------- /Admin Details ------------*/

    /*---------- Send Push Notification ------------*/

     public function sendPushNotification($tokens, $message) 
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'registration_ids' => $tokens,
            'data' => $message
            );
        $headers = array(
            'Authorization:key = AIzaSyDGiMt4M2rAMoYy6pICuymX-Ob6uhuOX1k',
            'Content-Type: application/json'
            );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);           
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        //echo $result;exit;
        return $result;
    }

    /*---------- /Send Push Notification ------------*/

}
?>