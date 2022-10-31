<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");		
		$this->is_logged_in();
		$this->load->model('admin/registermodel');
		$this->load->model('common_model');	
		$this->load->helper('url','form','HTML');
        $this->load->library(array('form_validation', 'session','user_agent'));		
	}
		
	
	/*----------- Users --------------*/

	public function AllMember()
	{
        $Users = $this->registermodel->View_all_members($_POST);
        $result_count=$this->registermodel->View_all_members($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($Users) ),
            "data"  => $Users);  
        echo json_encode($json_data);
    }

	public function Users()
	{		
		$data['title'] = "Biladl All User Pannel";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_users', $data);
		$this->load->view('admin/includes/footer', $data);
	}


	/*----------- /Users --------------*/


	/*----------- All Topic --------------*/

	public function AllTopic()
	{
        $AllTopic = $this->registermodel->AllTopics($_POST);
        $result_count=$this->registermodel->AllTopics($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($AllTopic) ),
            "data"  => $AllTopic);  
        echo json_encode($json_data);
    }




	public function all_topic_page()
	{		
		
		$data['title'] = "Biladl Topics";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_advice', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	 public function Addtopic()
	{
			$message='';
       		
            
            	$Topic_name = strtoupper($this->input->post('Topic_name'));
            	$Topic_name_arb = strtoupper($this->input->post('Topic_name_arb'));				
				$data = array(				
				'topics' => $Topic_name,
				'topics_arbic' => $Topic_name_arb,
				'created_on' => date('Y-m-d H:i:s')				
				);

	           	$GetData = $this->registermodel->set_topic($data);

				if(!$GetData)
				{
					$this->session->set_flashdata('success','Unable to store now');					
				}
				else
				{           
					$this->session->set_flashdata('success','Added Successfully');
				}           
            

                  redirect('admin/register/all_topic_page', 'refresh');

  }

   public function TopicDelete()
	{		
		$topic_id =  $this->uri->segment(4);

		$condition = array(				
				'id' => $topic_id
				);

		
		$result = $this->registermodel->delete_row_id('advice_topics',$topic_id);	


		if($result)
		{
		 	$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/all_topic_page', 'refresh');
			
	}





	/*----------- /All topic --------------*/


	/*----------- county --------------*/

	public function AllCountry()
	{
        $AllTopic = $this->registermodel->Allcountries($_POST);
        $result_count=$this->registermodel->Allcountries($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($AllTopic) ),
            "data"  => $AllTopic);  
        echo json_encode($json_data);
    }




	public function country_page()
	{	
		$data['title'] = "Biladl Countries";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_country', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	 public function Addcountry()
	{
		$message='';
    	$require_fields = array(
            'counry_name' => 'Enter country name!',
            'country_code' => "Country code required!",
            'isd_code' => "ISD code required"
        );
    	extract($_POST);
        foreach ($require_fields as $key => $value) {
            if(!isset($$key)){
                $this->session->set_flashdata('success',$value);
                redirect('admin/register/country_page', 'refresh');
            }
            if(is_array($$key)){ $$key=array_map('trim',$$key);
        		$$key=array_map('strtoupper',$$key);
        	 }else{$$key=strtoupper(trim($$key));}      
        }

		$data = array(				
		'country_code' => $country_code,
		'mob_code' => $isd_code,
		'country_name' => $counry_name
		);

        $insert_chat = $this->common_model->inset_to_tbl('countries',$data);
		if(!$insert_chat)
		{
			$this->session->set_flashdata('success','Unable to store now');
		}
		else
		{           
			$this->session->set_flashdata('success','Added Successfully');
		}  
          redirect('admin/register/country_page', 'refresh');

  	}

  	 public function DeleteCountry()
	{		
		$countryID =  $this->uri->segment(4);
		
		$result = $this->registermodel->delete_row_id('countries',$countryID);	


		if($result)
		{
		 	$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/country_page', 'refresh');
			
	}





	/*----------- /end of country section --------------*/

	/*----------- List of city --------------*/


	public function AllCity()
	{
        $AllTopic = $this->registermodel->Allcities($_POST);
        $result_count=$this->registermodel->Allcities($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($AllTopic) ),
            "data"  => $AllTopic);  
        echo json_encode($json_data);
    }

	public function citys_page()
	{	

		$condition = array('is_deleted' => 1);
		$GetData = $this->common_model->get_tables_records('countries','',$condition);
		$data['Country'] = $GetData;

		$data['title'] = "Biladl Cities";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_citys', $data);
		$this->load->view('admin/includes/footer', $data);
	}


	public function Addcity()
	{
		$message='';
    	$require_fields = array(
            'CountryID' => 'Select a city!',
            'city_name' => "City name required!"
        );
    	extract($_POST);
        foreach ($require_fields as $key => $value) {
            if(!isset($$key) || $$key==''){
                $this->session->set_flashdata('success',$value);
                redirect('admin/register/citys_page', 'refresh');
            }
            if(is_array($$key)){ $$key=array_map('trim',$$key);
        		$$key=array_map('strtoupper',$$key);
        	 }else{$$key=strtoupper(trim($$key));}      
        }

		$data = array(				
		'cid' => $CountryID,
		'name' => $city_name
		);

        $insert_chat = $this->common_model->inset_to_tbl('cities',$data);
		if(!$insert_chat)
		{
			$this->session->set_flashdata('success','Unable to store now');
		}
		else
		{           
			$this->session->set_flashdata('success','Added Successfully');
		}  
          redirect('admin/register/citys_page', 'refresh');

  	}

  	 public function DeleteCity()
	{		
		$cityID =  $this->uri->segment(4);
		
		$result = $this->registermodel->delete_row_id('cities',$cityID);	


		if($result)
		{
		 	$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/citys_page', 'refresh');
			
	}





	/*----------- List of city --------------*/










	public function Packages()
	{
        $Allpacks = $this->registermodel->Allpackages($_POST);
        $result_count=$this->registermodel->Allpackages($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($Allpacks) ),
            "data"  => $Allpacks);  
        echo json_encode($json_data);
    }


	public function all_package()
	{		
		
		$data['title'] = "Biladl Packages";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_packages', $data);
		$this->load->view('admin/includes/footer', $data);
	}


	 public function Addpackage()
	{
			$message='';       		

           
            	$package_title = strtoupper($this->input->post('package_title'));				
            	$package_title_arbic = strtoupper($this->input->post('package_title_arbic'));				
            	$package_type = strtoupper($this->input->post('package_type'));				
            	$package_type_arbic = strtoupper($this->input->post('package_type_arbic'));				
            	$package_days = $this->input->post('package_days');
            	$package_price = $this->input->post('package_price');
            	$Description = $this->input->post('Description');            	
            	$Description_arbic = $this->input->post('Description_arbic');            	
		 		//$Description = $this->security->xss_clean($Description);


				$data = array(				
				'title' => $package_title,
				'title_arbic' => $package_title_arbic,
				'price' => $package_price,
				'package_type' => $package_type,
				'package_type_arbic' => $package_type_arbic,
				'total_days' => $package_days,
				'description' => $Description,				
				'description_arbic' => $Description_arbic,				
				'created_on' => date('Y-m-d H:i:s')				
				);

	           	$GetData = $this->common_model->inset_to_tbl('packages',$data);

				if(!$GetData)
				{
					$this->session->set_flashdata('success','Unable to store now');					
				}
				else
				{           
					$this->session->set_flashdata('success','Added Successfully');
				}           
            

                  redirect('admin/register/all_package', 'refresh');

  	 }

  	 public function PackageDelete()
	{		
		$PackageID =  $this->uri->segment(4);

		$condition = array(				
				'package_id' => $PackageID
				);

		$result = $this->registermodel->check_id_is_present('user_subscription',$condition);
		$condition = array(				
				'id' => $PackageID
				);
		if(!empty($result))
		{
			$data = array(				
				'status' => 0
				);

			$GetData = $this->common_model->update_to_tbl('packages',$data,$condition);
			if($GetData){
			  $message="Package is Inactive for other subscriber !!!";
			}
			else
			{
			  $message="Unable to delete contact to developer";
			}
			goto skippThis;
		}
		else
		{
			 $result1 = $this->registermodel->delete_row_id('packages',$PackageID);
			if($result1)
			{
				$message="Deleted Successfully";
			}
			else
			{
				$message="already deleted";
			}	

		}

		
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/all_package', 'refresh');
			
	}
	
	public function EditPack()
	{		
		 $pakID =  $this->uri->segment(4);
		 
		$data['title'] = "Biladl Edit Package";
		$condition= array(
			'id' => $pakID,
			);	
		$data['package_details'] = $this->common_model->get_one_row_data('packages',$condition);

		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/edit_package', $data);
		$this->load->view('admin/includes/footer', $data);
			
	}

	
    public function Edit_packages()
	{
			$message='';       		

           
            	$pakid = strtoupper($this->input->post('pakid'));
            	$package_title = strtoupper($this->input->post('package_title'));
            	$package_title_arbic = strtoupper($this->input->post('package_title_arbic'));				
            	$package_type = strtoupper($this->input->post('package_type'));				
                $package_type_arbic = strtoupper($this->input->post('package_type_arbic'));				
            	$package_days = $this->input->post('package_days');
            // 	$package_price = $this->input->post('package_price');
            	$Description = $this->input->post('Description');            	
            	$Description_arbic = $this->input->post('Description_arbic');            	
		 		//$Description = $this->security->xss_clean($Description);


				$data = array(				
				'title' => $package_title,
				'title_arbic' => $package_title_arbic,
				// 'price' => $package_price,
				'package_type' => $package_type,
				'package_type_arbic' => $package_type_arbic,
				'total_days' => $package_days,
				'description' => $Description,				
				'description_arbic' => $Description_arbic,				
				'created_on' => date('Y-m-d H:i:s')				
				);
				
				$condition= array(
			'id' => $pakid,
			);
                
                $GetData = $this->common_model->update_to_tbl('packages',$data,$condition);
				if(!$GetData)
				{
					$this->session->set_flashdata('success','Unable to update data');					
				}
				else
				{           
					$this->session->set_flashdata('success','updated Successfully');
				}           
            

                  redirect('admin/register/all_package', 'refresh');

  	 }

	public function faqs()
	{
        $ALLFAQs = $this->registermodel->Allfaqs($_POST);
        $result_count=$this->registermodel->Allfaqs($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($ALLFAQs) ),
            "data"  => $ALLFAQs);  
        echo json_encode($json_data);
    }


	public function all_faqs()
	{		
		
		$data['title'] = "Biladl FAQs";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_faqs', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	public function AddFAQ()
	{
			$message='';       		

           
            	$title = $this->input->post('title');
            	$title_arbic = $this->input->post('title_arbic');
            	$Description = $this->input->post('Description');            	
            	$Description_arbic = $this->input->post('Description_arbic');            	
		 		//$Description = $this->security->xss_clean($Description);


				$data = array(				
				'title' => $title,
				'title_arbic' => $title_arbic,
				'description' => $Description,				
				'description_arbic' => $Description_arbic,				
				'created_on' => date('Y-m-d H:i:s')				
				);

	           	$GetData = $this->common_model->inset_to_tbl('faqs',$data);

				if(!$GetData)
				{
					$this->session->set_flashdata('success','Unable to store now');					
				}
				else
				{           
					$this->session->set_flashdata('success','Added Successfully');
				}           
            

                  redirect('admin/register/all_faqs', 'refresh');

  	 }

	public function FAQDelete()
	{		
		 $FaqID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('faqs',$FaqID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/all_faqs', 'refresh');
			
	}

	public function EditFAQ()
	{		
		 $FAQID =  $this->uri->segment(4);
		 
		$data['title'] = "Biladl Edit News";
		$condition= array(
			'id' => $FAQID,
			);	
		$data['Article_Details'] = $this->common_model->get_one_row_data('faqs',$condition);

		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/edit_faq', $data);
		$this->load->view('admin/includes/footer', $data);
			
	}

	public function UpdateFAQ()
	{		
		$FAQID = $this->input->post('rowid');
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Descriptions = $this->input->post('Description');		
		$Description_arbic = $this->input->post('Description_arbic');
		$condition= array(
			'id' => $FAQID,
			);		 
		$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,				
				'description' => $Descriptions,				                     
				'description_arbic' => $Description_arbic
				);
	        
	       $GetData = $this->common_model->update_to_tbl('faqs',$data,$condition);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to Update FAQ');
				
			}
			else
			{           
				$this->session->set_flashdata('success','FAQ Updated Successfully');


			}
			redirect('admin/register/all_faqs', 'refresh'); 
			
	}




	public function All_need_advice()
	{
        $ALLFAQs = $this->registermodel->needAdvice($_POST);
        $result_count=$this->registermodel->needAdvice($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($ALLFAQs) ),
            "data"  => $ALLFAQs);  
        echo json_encode($json_data);
    }


	public function need_advice()
	{		
		
		$data['title'] = "Biladl Need Advices";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_need_advice', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	public function adviceDelete()
	{		
		 $AdviceID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('advices',$AdviceID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/need_advice', 'refresh');
			
	}


	public function All_article()
	{
        $AllArticle = $this->registermodel->Articles($_POST);
        $result_count=$this->registermodel->Articles($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count),
            "recordsFiltered"  => intval(count($AllArticle)),
            "data"  => $AllArticle);  
        echo json_encode($json_data);
    }


	public function list_article()
	{		
		
		$data['title'] = "Biladl Articles";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_article', $data);
		$this->load->view('admin/includes/footer', $data);
	}


	public function set_article()
	{
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Descriptions = $this->input->post('Description');		
		$Description_arbic = $this->input->post('Description_arbic');		
		$error=1;
		if(!isset($title) || !isset($Descriptions)){
			$error=0;
			$this->session->set_flashdata('success','Please Fill the required filds');
		 }		

			$message='';
       		$randon_number = mt_rand (1000,5000);
            $file_name = time().'_'.$randon_number;
            $config['upload_path']          = './user_upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
           /* $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;     */     
            $config['file_name']            = $file_name;
           

            $Db_file_path='user_upload/'.$file_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ImageName'))
            {
                   $Geterror = array('error' => $this->upload->display_errors());

                    foreach ($Geterror as $key => $value) {
                    	$message=$value.'<br>';
                    }
				$this->session->set_flashdata('success',$message);

				$error=0;
            }

	    if($error){


			$filestuatus=$this->upload->data();
			$Db_file_path.=$filestuatus['file_ext'];

			$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,
				'image' => $Db_file_path,
				'description' => $Descriptions,				                     
				'description_arbic' => $Description_arbic,				                     
				'created_on' => date('Y-m-d H:i:s')
				);
	        
	        $GetData = $this->common_model->inset_to_tbl('article',$data);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to add Articles');
				unset($Db_file_path);
			}
			else
			{           
				$this->session->set_flashdata('success','Articles Added Successfully');


			} 

	  }
		 redirect('admin/register/list_article','refresh');
		
	}

	public function articleDelete()
	{		
		 $AdviceID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('article',$AdviceID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/list_article', 'refresh');
			
	}


	public function EditArticle()
	{		
		 $ArticleID =  $this->uri->segment(4);
		 
		$data['title'] = "Biladl Edit News";
		$condition= array(
			'id' => $ArticleID,
			);	
		$data['Article_Details'] = $this->common_model->get_one_row_data('article',$condition);

		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/edit_article', $data);
		$this->load->view('admin/includes/footer', $data);
			
	}

	public function UpdateArticle()
	{		
		$ArticleID = $this->input->post('rowid');
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Descriptions = $this->input->post('Description');		
		$Description_arbic = $this->input->post('Description_arbic');
		$condition= array(
			'id' => $ArticleID,
			);		 
		$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,				
				'description' => $Descriptions,				                     
				'description_arbic' => $Description_arbic
				);
	        
	       $GetData = $this->common_model->update_to_tbl('article',$data,$condition);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to Update Articles');
				
			}
			else
			{           
				$this->session->set_flashdata('success','Articles Update Successfully');


			}
			redirect('admin/register/list_article', 'refresh'); 
			
	}





	public function All_news()
	{
        $AllLegalNews = $this->registermodel->legal_news($_POST);
        $result_count=$this->registermodel->legal_news($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count),
            "recordsFiltered"  => intval(count($AllLegalNews)),
            "data"  => $AllLegalNews);  
        echo json_encode($json_data);
    }


	public function list_news()
	{		
		
		$data['title'] = "Biladl News";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_news', $data);
		$this->load->view('admin/includes/footer', $data);
	}


	public function set_news()
	{
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Descriptions = $this->input->post('Description');		
		$Description_arbic = $this->input->post('Description_arbic');		
		$error=1;
		if(!isset($title) || !isset($Descriptions)){
			$error=0;
			$this->session->set_flashdata('success','Please Fill the required filds');
		 }		

			$message='';
       		$randon_number = mt_rand (1000,5000);
            $file_name = time().'_'.$randon_number;
            $config['upload_path']          = './user_upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
           /* $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;     */     
            $config['file_name']            = $file_name;
           

            $Db_file_path='user_upload/'.$file_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ImageName'))
            {
                   $Geterror = array('error' => $this->upload->display_errors());

                    foreach ($Geterror as $key => $value) {
                    	$message=$value.'<br>';
                    }
				$this->session->set_flashdata('success',$message);

				$error=0;
            }

	    if($error){


			$filestuatus=$this->upload->data();
			$Db_file_path.=$filestuatus['file_ext'];

			$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,
				'image' => $Db_file_path,
				'description' => $Descriptions,				                     
				'description_arbic' => $Description_arbic,				                     
				'created_on' => date('Y-m-d H:i:s')
				);
	        
	        $GetData = $this->common_model->inset_to_tbl('legal_news',$data);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to add News');
				unset($Db_file_path);
			}
			else
			{           
				$this->session->set_flashdata('success','News Added Successfully');


			} 

	  }
		 redirect('admin/register/list_news','refresh');
		
	}

	public function newsDelete()
	{		
		 $NewsID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('legal_news',$NewsID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/list_news', 'refresh');
			
	}

	public function EditNews()
	{		
		 $NwwsID =  $this->uri->segment(4);
		 
		$data['title'] = "Biladl Edit News";
		$ConditionData= array(
			'id' => $NwwsID,
			);	
		$data['news_Details'] = $this->common_model->get_one_row_data('legal_news',$ConditionData);

		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/edit_news', $data);
		$this->load->view('admin/includes/footer', $data);
			
	}

	public function UpdateNews()
	{		
		$NwwsID = $this->input->post('rowid');
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Descriptions = $this->input->post('Description');		
		$Description_arbic = $this->input->post('Description_arbic');
		$ConditionData= array(
			'id' => $NwwsID,
			);		 
		$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,				
				'description' => $Descriptions,				                     
				'description_arbic' => $Description_arbic
				);
	        
	       $GetData = $this->common_model->update_to_tbl('legal_news',$data,$ConditionData);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to Update news');
				
			}
			else
			{           
				$this->session->set_flashdata('success','News Updated Successfully');


			}
			redirect('admin/register/list_news', 'refresh'); 
			
	}

	public function All_usefulLinks()
	{
        $AllLegalNews = $this->registermodel->Useful_links($_POST);
        $result_count=$this->registermodel->Useful_links($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count),
            "recordsFiltered"  => intval(count($AllLegalNews)),
            "data"  => $AllLegalNews);  
        echo json_encode($json_data);
    }


	public function UsefulLinks()
	{		
		
		$data['title'] = "Biladl Usefullinks";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_useful_Links', $data);
		$this->load->view('admin/includes/footer', $data);
	}


	public function set_UsefulLinks()
	{
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Links = $this->input->post('Links');
		$Descriptions = $this->input->post('Description');			
		$Descriptions_arbic = $this->input->post('Description_arbic');			
		$error=1;
		if(!isset($title) || !isset($Descriptions)){
			$error=0;
			$this->session->set_flashdata('success','Please Fill the required filds');
		 }		

			$message='';
       		

	    if($error){
			
			$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,
				'links' => $Links,
				'description' => $Descriptions,				                     
				'description_arbic' => $Descriptions_arbic,				                     
				'created_on' => date('Y-m-d H:i:s')
				);
	        
	        $GetData = $this->common_model->inset_to_tbl('useful_links',$data);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to add Links');
				unset($Db_file_path);
			}
			else
			{           
				$this->session->set_flashdata('success','Links Added Successfully');


			} 

	  }
		 redirect('admin/register/UsefulLinks','refresh');
		
	}

	public function UsefulLinkDelete()
	{		
		 $AdviceID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('useful_links',$AdviceID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/UsefulLinks', 'refresh');
			
	}

		public function EditUsefulLink()
	{		
		 $FAQID =  $this->uri->segment(4);
		 
		$data['title'] = "Biladl Edit Useful Links";
		$condition= array(
			'id' => $FAQID,
			);	
		$data['Link_Details'] = $this->common_model->get_one_row_data('useful_links',$condition);

		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/edit_usefullink', $data);
		$this->load->view('admin/includes/footer', $data);
			
	}

	public function UpdateUsefulLink()
	{		
		$LinksID = $this->input->post('rowid');
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');
		$Links = $this->input->post('Links');		
		$Descriptions = $this->input->post('Description');		
		$Description_arbic = $this->input->post('Description_arbic');
		$condition= array(
			'id' => $LinksID,
			);		 
		$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,
				'links' => $Links,				
				'description' => $Descriptions,				                     
				'description_arbic' => $Description_arbic
				);
	        
	       $GetData = $this->common_model->update_to_tbl('useful_links',$data,$condition);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to Update Links');
				
			}
			else
			{           
				$this->session->set_flashdata('success','Links Updated Successfully');


			}
			redirect('admin/register/UsefulLinks', 'refresh'); 
			
	}



	public function All_document()
	{
        $AllLegalNews = $this->registermodel->Download_document($_POST);
        $result_count=$this->registermodel->Download_document($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count),
            "recordsFiltered"  => intval(count($AllLegalNews)),
            "data"  => $AllLegalNews);  
        echo json_encode($json_data);
    }


	public function Documents()
	{		
		
		$data['title'] = "Biladl Legal Documents";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_download_doc', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	public function set_Document()
	{
		$title = $this->input->post('title');
		$title_arbic = $this->input->post('title_arbic');

		$error=1;
		if(!isset($title)){
			$error=0;
			$this->session->set_flashdata('Fails','Please Fill the required filds');
		 }		

			$message='';
       		$randon_number = mt_rand (1000,5000);
            $file_name = time().'_'.$randon_number;
            $config['upload_path']          = './user_upload/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100000;
           /* $config['max_width']            = 1024;
            $config['max_height']           = 768;     */     
            $config['file_name']            = $file_name;
           

            $Db_file_path='user_upload/'.$file_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ImageName'))
            {
                   $Geterror = array('error' => $this->upload->display_errors());

                    foreach ($Geterror as $key => $value) {
                    	$message=$value.'<br>';
                    }
				$this->session->set_flashdata('Fails',$message);

				$error=0;
            }

	    if($error){


			$filestuatus=$this->upload->data();
			$Db_file_path.=$filestuatus['file_ext'];

			$data = array(
				'title' => $title,
				'title_arbic' => $title_arbic,
				'download_link' => $Db_file_path,
				'created_on' => date('Y-m-d H:i:s')
				);
	        
	        $GetData = $this->common_model->inset_to_tbl('legal_document',$data);
			
			if(!$GetData)
			{
				$this->session->set_flashdata('Fails','Failed to add Documents');
				unset($Db_file_path);
			}
			else
			{           
				$this->session->set_flashdata('success','Document Added Successfully');


			} 

	  }
		 redirect('admin/register/Documents','refresh');
		
	}

	public function DocumentDelete()
	{		
		 $AdviceID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('legal_document',$AdviceID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/Documents', 'refresh');
			
	}

	public function All_lawyer()
	{
        $AllLegalNews = $this->registermodel->View_all_lawyer($_POST);
        $result_count=$this->registermodel->View_all_lawyer($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count),
            "recordsFiltered"  => intval(count($AllLegalNews)),
            "data"  => $AllLegalNews);  
        echo json_encode($json_data);
    }


	public function view_lawyer()
	{		
		
		$data['title'] = "Biladl Lawyer registration";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_lawyer', $data);
		$this->load->view('admin/includes/footer', $data);
	}



	public function view_user_document()
	{		
		
		$lawyerID =  $this->uri->segment(4);
		$condition = array('user_id' => $lawyerID);
		$GetData = $this->common_model->get_tables_records('user_documents','',$condition);
		$data['Documents'] = $GetData;
		// print_r($GetData);
		// exit();
		$data['title'] = "Biladl Lawyer registration";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/document_preview', $data);
		$this->load->view('admin/includes/footer', $data);
	}



	public function User_Active_Deactive()
	{		
		$lawyerID =  $this->uri->segment(4);
		$status =  $this->uri->segment(5);
		$data = array('status' => 9);
		if($status!="Suspend")
		{
			$data = array('status' => 1);
		}

		$condition = array('id' => $lawyerID);
		$GetData = $this->common_model->update_to_tbl('users',$data,$condition);
		if($GetData)
		{
			$message="Suspended Successfully";
		}
		else
		{
			$message="already Suspended";
		}

		$this->session->set_flashdata('success',$message);
		redirect($this->agent->referrer(), 'refresh');
			
	}

















	public function All_lawyer_student()
	{
        $AllLegalNews = $this->registermodel->View_all_student($_POST);
        $result_count=$this->registermodel->View_all_student($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count),
            "recordsFiltered"  => intval(count($AllLegalNews)),
            "data"  => $AllLegalNews);  
        echo json_encode($json_data);
    }


	public function view_lawyer_student()
	{		
		
		$data['title'] = "Biladl All Student Resgistration";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_lawyer_student', $data);
		$this->load->view('admin/includes/footer', $data);
	}



	public function Lawyer_student_Delete()
	{		
		 $AdviceID =  $this->uri->segment(4);
		 $result = $this->registermodel->delete_row_id('students',$AdviceID);
		if($result)
		{
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		skippThis:
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/view_lawyer_student', 'refresh');
			
	}



		/*----------- Notification --------------*/

	public function ALLNotificatons()
	{
        $Banners = $this->registermodel->ALLNotificaton($_POST);
        $result_count=$this->registermodel->ALLNotificaton($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($Banners) ),
            "data"  => $Banners);  
        echo json_encode($json_data);
    }

	public function Notificatons()
	{	

		$data['title'] = "Biladl Notifications";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/all_notification', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	public function AddNotification()
	{	
	
		$Descriptions = trim($this->input->post('Descriptions'));
		$whom = trim($this->input->post('whom'));
		if($Descriptions==''){
				$message="Description is required";
				$this->session->set_flashdata('success',$message);
				goto skippThis;
				}

		if($whom==''){
				$message="For whom is required";
				$this->session->set_flashdata('success',$message);
				goto skippThis;
				}	
		
		
		
		 if(isset($Descriptions))
		 {
		
		 	//$this->load->library("security");
		 	$Descriptions = $this->security->xss_clean($Descriptions);

			$data = array(
			'description' => $Descriptions,                     
			'send_to' => $whom,                     
			'created_on' => date('Y-m-d H:i:s')
			);
				$GetData = $this->registermodel->set_notification($data);

			if(!$GetData)
			{
				$this->session->set_flashdata('success','Failed to add notificatons');
			}
			else
			{     
				$this->load->model('admin/notifications_model');				
           		$this->notifications_model->insert_push_notification($Descriptions,$whom);
				$this->session->set_flashdata('success','Notificatons Added Successfully');

			}  

		 }
		 skippThis:
		redirect('admin/register/Notificatons','refresh');
		
	}

	public function NotificationDelete()
	{		
		$ban_id =  $this->uri->segment(4);		
		$result = $this->registermodel->delete_row_id('notifications',$ban_id);

		if($result)
		{
		 
			$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}

		 $this->session->set_flashdata('success',$message);
         redirect('admin/register/Notificatons', 'refresh');


			
	}





	/*----------- /Notification --------------*/


	/*----------- All lawter registered in admin --------------*/

	public function AllAdminLawyer()
	{
        $AllTopic = $this->registermodel->AllAdminLawyer($_POST);
        $result_count=$this->registermodel->AllAdminLawyer($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($AllTopic) ),
            "data"  => $AllTopic);  
        echo json_encode($json_data);
    }


	public function AdminLawyer()
	{	
		$data['title'] = "Biladl Admin lawyer";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list-lawyer-form-admin', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	 public function AddAdminLawyer()
	{
			$message='';
	    	$lawyer_name = ucfirst($this->input->post('Lawyer_name'));
	    	$specialization = ucwords($this->input->post('specialization'));				
			$data = array(				
			'name' => $lawyer_name,
			'specialization' => $specialization,
			'created_on' => date('Y-m-d H:i:s')				
			);
			$SetData = $this->common_model->inset_to_tbl('app_own_lawyers',$data);

			if(!$SetData)
			{
				$this->session->set_flashdata('success','Unable to store now');					
			}
			else
			{           
				$this->session->set_flashdata('success','Added Successfully');
			}    

           redirect('admin/register/AdminLawyer', 'refresh');

  	}

   	public function AdminLawyerDelete()
	{		
		$lawyerID =  $this->uri->segment(4);
		$condition = array(				
				'id' => $lawyerID
				);
		$result = $this->registermodel->delete_row_id('app_own_lawyers',$lawyerID);	

		if($result)
		{
		 	$message="Deleted Successfully";
		}
		else
		{
			$message="already deleted";
		}
		
		$this->session->set_flashdata('success',$message);
		redirect('admin/register/AdminLawyer', 'refresh');
			
	}



	/*----------- All lawter registered in admin --------------*/











		/*----------- Experts -------------- */

	public function AllExperts()
	{
        $Users = $this->registermodel->AllExperts($_POST);
        $result_count=$this->registermodel->AllExperts($_POST,1);
        $json_data = array(
            "draw"  => intval($_POST['draw'] ),
            "iTotalRecords"  => intval($result_count ),
            "iTotalDisplayRecords"  => intval($result_count ),
            "recordsFiltered"  => intval(count($Users) ),
            "data"  => $Users);  
        echo json_encode($json_data);
    }

	public function Experts()
	{		
		$data['title'] = "Biladl Pannel";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_experts', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	public function Active_deactive_Experts()
	{
		$status=0;
		$rowID =  $this->uri->segment(4);
		$status_name =  $this->uri->segment(5);
		if ($status_name=="Active") {
			$status=1;
		}
		$data = array(				                     
				'status' => $status,                     
				'modified_at' => date('Y-m-d H:i:s')
				);
		$result = $this->registermodel->Update_tbl('users',$rowID,$data);
		if($result)
		{		 	
			$message="Status changed Successfully";
		}
		else
		{
			$message="Sorry to change status";
		}

		$this->session->set_flashdata('success',$message);
        redirect('admin/register/Experts', 'refresh');


			
	}

	/*----------- /Experts --------------*/

	
	
	/*----------- chat convertion --------------*/

	function ViewConvertion()
	{
		 $UserID =  $this->uri->segment(4);


		$data['title'] = "Biladl Chat Convertion";
		$data['UserID'] = $UserID;
		$data['Total_convertion'] = $this->registermodel->chat_convertion($UserID);
		$ConditionData= array(
			'id' => $UserID,
			);	
		$data['User_Details'] = $this->common_model->get_one_row_data('users',$ConditionData);	

		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/list_chat_convertion', $data);
		$this->load->view('admin/includes/footer', $data);		


		
	}

	function GetMoreChat()
	{
		extract($_POST);
		$json_msg ='success';
		$error=0;
		$json_Data=array();
		
		if(!isset($lastChatID)){
			$json_msg= "last ID not Found";
			$error++;
			
		 }

		 if(!isset($UserID)){
			$json_msg= "User ID not Found";
			$error++;			
		 }
		 $json_Data['history_convertion'] = $this->registermodel->chat_History($UserID,$lastChatID);
		if(empty($json_Data['history_convertion'])){
					$json_msg= "No More message";
		  			$error++;
		    }
		 $json_Data['error'] = $error;
		 $json_Data['json_msg'] =$json_msg;		

		echo $myJSON = json_encode($json_Data);
		 exit();
	}

	function GetFetureChat()
	{
		extract($_POST);
		$json_msg ='success';
		$error=0;
		$json_Data=array();
		
		if(!isset($ENDChatID)){
			$json_msg= "last ID not Found";
			$error++;
			
		 }

		 if(!isset($UserID)){
			$json_msg= "User ID not Found";
			$error++;			
		 }
		 $json_Data['history_convertion'] = $this->registermodel->chat_Future($UserID,$ENDChatID);
		if(empty($json_Data['history_convertion'])){
					$json_msg= "No More message";
		  			$error++;
		    }
		  
		 $json_Data['error'] = $error;
		 $json_Data['json_msg'] =$json_msg;		

		echo $myJSON = json_encode($json_Data);
		 exit();
	}

	function  SendMessage()
	{
		extract($_POST);

		$json_msg ='success';
		$error=0;
		$json_Data=array();
		
		if(!isset($Mymsg)){
			$json_msg= "Empty message";
			$error++;
			
		 }

		 if(!isset($UserID)){
			$json_msg= "User ID not Found";
			$error++;			
		 }
		 
		 $Sender_ID='Admin';
		 $data = array(            
            'sender_id' => $Sender_ID,
            'reciver_id' => $UserID,            
            'message' => $Mymsg,            
            'created_at' => date('Y-m-d H:i:s')            
            );

        $insert_chat = $this->common_model->inset_to_tbl('chat_table',$data);
        if(!$insert_chat){
           	$json_msg= "Unable To send message";
			$error++;	
        }
        

		 $json_Data['error'] = $error;
		 $json_Data['json_msg'] =$json_msg;
		 echo $myJSON = json_encode($json_Data);
		 exit();
	}

	function Chat_Notification()
	{
		
		$json_msg ='success';
		$error=0;
		$json_Data=array();
		 $json_Data['history_convertion'] = $this->registermodel->chat_nofication();
		if(empty($json_Data['history_convertion'])){
					$json_msg= "No More message";
		  			$error++;
		    }
		 $json_Data['error'] = $error;
		 $json_Data['json_msg'] =$json_msg;
		 echo $myJSON = json_encode($json_Data);
		 exit();
	}


	/*----------- /chat convertion --------------*/
	
	/*----------- Change Password --------------*/

	public function ChangePassword()
	{
		$data['title'] = "Biladl change password";
		if($query = $this->registermodel->AdminDetails())
		{
			$data['row'] = $query;
		}
		//var_dump($data['row']);		
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/change_password', $data);
		$this->load->view('admin/includes/footer', $data);
	}

	public function UpdatePassword()
	{	
		$Password = $this->input->post('Password');
		$data = array(
			'password' => md5($Password),
			);		
		$data['modified_on'] = date('Y-m-d H:i:s');
		$this->registermodel->UpdatePassword($data);
		$this->session->set_flashdata('success', 'Password Updated Successfully.');
		redirect('admin/register/ChangePassword/', 'refresh');
	}

	/*----------- /Change Password --------------*/

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');		
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('admin/login', 'refresh');
		}
	}
















}
?>