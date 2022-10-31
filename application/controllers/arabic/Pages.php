<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		// $this->is_logged_in();
		//$this->load->model('homemodel');
		//error_reporting(0);
		$this->load->model('Common_model');
		$this->load->model('Web_modul_arbic');
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('Ajax_pagination');
	}
	
	public function index()
	{
		die("Please go back from this page");
	}


	public function cyber_defamation($data=array())
	{
		if(!is_array($data)){ $data=array(); }
		 $data['title'] = " لادل  - السيبرانية التشهير  ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/cyber-defamation.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}


	public function member_plans($data=array())
	{
		if(!is_array($data)){ $data=array(); }
		 $data['title'] = "  بلادل  -  العضوية الذهبية ";
		 $condition2= array('status' => 1);
		$order_by= array('price' => 'ASC');
		$all_packages = $this->Common_model->get_tables_records('packages','',$condition2,$order_by);
		$data['all_packages'] = $all_packages;
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/member_plans.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}


// public function privacy_policy($data=array())
// 	{
// 		if(!is_array($data)){ $data=array(); }
// 		 $data['title'] = "Biladl - Cyber Defamation";
// 		 $this->load->view('website/arabic/include/header.php', $data);
// 		 $this->load->view('website/arabic/privacy_policy.php', $data);
// 		 $this->load->view('website/arabic/include/footer.php', $data);
// 	}





	public function articles($start_from=0)
	{
		if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1){
			$start_from=0;
		}
		

		$userID="tapas123";
		if($this->session->has_userdata('user_id'))
		{
			$userID=$this->session->userdata('user_id');
		}

		 $totalDBrecords = $this->Web_modul_arbic->article_list('count',false,false,$userID);
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$upto=5;
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_articles = $this->Web_modul_arbic->article_list('records',$start_from,$upto,$userID);

		if(empty($paged_articles) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=1;
		}
		 $data['title'] = "Biladil - Articles";	
		 $data['paged_articles'] = $paged_articles;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();

		$data['next_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url('arabic/').$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/articles.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);

		 
	}

	public function MoreArticles()
	{
		$response = array('status' => false,'message'=>'No data found','response'=>'');
		if(!$this->input->post('artID'))
		{
			$response = array('status' => false,'message'=>'No read-more selected','response'=>'');
			exit_with_json($response);					
		}
		$postal_array=$this->input->post(array('artID'), TRUE);
		extract($postal_array);

		$condition = array('id' => $artID);		
		$colomn_retraive = array('description_arbic');		
		$description = $this->Common_model->get_one_row_with_colomn('article',$colomn_retraive,$condition);

		if(!empty($description))
		{
			$response = array('status' => TRUE,'message'=>'Record found','response'=>$description);			
		}

		 exit_with_json($response);
	}


	public function News($start_from=0)
	{
		if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1){
			$start_from=0;
		}
		

		$userID="tapas123";
		if($this->session->has_userdata('user_id'))
		{
			$userID=$this->session->userdata('user_id');
		}


		 $totalDBrecords = $this->Web_modul_arbic->news_list('count',false,false,$userID);
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$upto=5;
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_news = $this->Web_modul_arbic->news_list('records',$start_from,$upto,$userID);

		if(empty($paged_news) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=0;
		}
		 $data['title'] = "Biladil - legal news";	
		 $data['paged_news'] = $paged_news;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();

		$data['next_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url('arabic/').$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/news.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);

		 //self :: testfile222();
	}

	public function MoreNews()
	{
		$response = array('status' => false,'message'=>'No data found','response'=>'');
		if(!$this->input->post('newsID'))
		{
			$response = array('status' => false,'message'=>'No read-more selected','response'=>'');
			 exit_with_json($response);					
		}
		$postal_array=$this->input->post(array('newsID'), TRUE);
		extract($postal_array);
		$condition = array('id' => $newsID);		
		$colomn_retraive = array('description_arbic');		
		$description = $this->Common_model->get_one_row_with_colomn('legal_news',$colomn_retraive,$condition);

		if(!empty($description))
		{
			$response = array('status' => TRUE,'message'=>'Record found','response'=>$description);			
		}

		 exit_with_json($response);
	}


	public function NewsDetails($newsID=0)
	{
		 $data['title'] = "Biladil - legal news Details";	
		if(is_array($newsID)){ $newsID=0; }

		$condition = array('id' => $newsID);		
		$colomn_retraive = array('title_arbic','description_arbic','image','created_on');		
		$data['news_details'] = $this->Common_model->get_one_row_with_colomn('legal_news',$colomn_retraive,$condition);
		if(!empty($data['news_details']))
		{	
			 $data['title'] = $data['news_details']->title_arbic." Biladil - legal news ";
			$this->load->view('website/arabic/include/header.php', $data);
			$this->load->view('website/arabic/news-details.php', $data);
			$this->load->view('website/arabic/include/footer.php', $data);
			return true;
		}
		 die("Unable to get your records");
	}

	public function articledetails($newsID=0)
	{
		 $data['title'] = "Biladil - legal news Details";	
		if(is_array($newsID)){ $newsID=0; }

		$condition = array('id' => $newsID);		
		$colomn_retraive = array('title_arbic','description_arbic','image','created_on');		
		$data['news_details'] = $this->Common_model->get_one_row_with_colomn('article',$colomn_retraive,$condition);
		if(!empty($data['news_details']))
		{	
			 $data['title'] = $data['news_details']->title_arbic." Biladil - legal news ";
			$this->load->view('website/arabic/include/header.php', $data);
			$this->load->view('website/arabic/news-details.php', $data);
			$this->load->view('website/arabic/include/footer.php', $data);
			return true;
		}
		 die("Unable to get your records");
	}



	public function Useful_links($start_from=0)
	{
		if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1){
			$start_from=0;
		}
		$upto=20;
		 $totalDBrecords = $this->Web_modul_arbic->useful_link_list('count');
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_useful_links = $this->Web_modul_arbic->useful_link_list('records',$start_from,$upto);

		if(empty($paged_useful_links) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=1;
		}
		 $data['title'] = "Biladil - Useful links";	
		 $data['paged_useful_links'] = $paged_useful_links;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();

		$data['next_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url('arabic/').$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/useful-links.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);

		 //self :: testfile222();
	}

	public function Useful_document($start_from=0)
	{
		if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1){
			$start_from=0;
		}
		$upto=1;
		 $totalDBrecords = $this->Web_modul_arbic->useful_document_list('count');
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_documents = $this->Web_modul_arbic->useful_document_list('records',$start_from,$upto);

		if(empty($paged_documents) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=1;
		}
		 $data['title'] = "Biladil - Useful Document";	
		 $data['paged_documents'] = $paged_documents;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();

		$data['next_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url('arabic/').$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/documents.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}

	public function faqs($start_from=0)
	{
		if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1){
			$start_from=0;
		}
		$upto=2;
		 $totalDBrecords = $this->Web_modul_arbic->faq_list('count');
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_faqs = $this->Web_modul_arbic->faq_list('records',$start_from,$upto);

		if(empty($paged_faqs) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=1;
		}
		 $data['title'] = "Biladil - FAQ Page";	
		 $data['paged_faqs'] = $paged_faqs;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();
		$data['next_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url('arabic/').$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/faq.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}


	public function lawyers($start_from=0)
	{
		
		if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1){
			$start_from=0;
		}
		$upto=2;
		 $totalDBrecords = $this->Web_modul_arbic->lawyer_list('count');
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_lawyers = $this->Web_modul_arbic->lawyer_list('records',$start_from,$upto);

		if(empty($paged_lawyers) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=1;
		}
		 $data['title'] = "Biladil - lawyers Page";	
		 $data['paged_lawyers'] = $paged_lawyers;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();
		$data['next_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url('arabic/').$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url('arabic/').$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/lawyers.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}



	public function about_us()
	{		
		 $data['title'] = " معلومات عنا ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/about.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}

	public function biladl()
	{		
		 $data['title'] = " بلادل  ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/biladl.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}

	public function contact()
	{	
		 
		if(!$this->session->userdata('user_logged_in')){
			$msg=array('status'=>false,'responce'=>'الرجاء تسجيل الدخول');
			echo json_encode($msg);
			die;
		}
		else{
			$msg=array('status'=>true,'responce'=>'نجاح!');
			echo json_encode($msg);
			die();
		}
	}

	
	public function contact_us()
	{		
		 $data['title'] = "  اتصل بنا - لادل  ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/contact.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}

	public function contact_usNew()
	{		
		 $data['title'] = "  اتصل بنا - لادل  ";
		//  $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/contactNew.php', $data);
		//  $this->load->view('website/arabic/include/footer.php', $data);
	}

	public function index2()
	{		
		 $data['title'] = "  اتصل بنا - لادل  ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/index2.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}
	public function privacy_policy()
	{		
		 $data['title'] = "  سياسة خاصة -  ادل  ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/privacy-policy.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}


	public function terms()
	{		
		 $data['title'] = "  سياسة خاصة -  ادل  ";
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/terms.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}




	public function online_advice($data=array())
	{
		if(!is_array($data)){ $data=array(); }
		$data['title'] = " نصيحة عبر الإنترنت ";		
		$data['all_topics'] = $this->Common_model->get_tables_records('advice_topics');
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/online-advice.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}


	/* START
 Ask an advice */


	public function Online_ask_an_advice(){

		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation->set_rules('Description', 'Description', 'required|strtolower|trim');
		$this->form_validation->set_rules('email_ID', 'Email',
										 'required|valid_email|strtolower|trim');
		$this->form_validation->set_rules('mobile', 'Contact No.','required|numeric|trim');
		$this->form_validation->set_rules('questionHEAD', 'Question Heading.','required|trim');
		$this->form_validation->set_rules('topicID', 'ID No', 'required|numeric|trim');
		$this->form_validation->set_rules('city', 'City', 'required|trim');
		if($this->form_validation->run() == false):

		$data['errors']=validation_errors();	
		self::online_advice($data);
		else :
			$cdates=date('Y-m-d H:i:s');
			$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}	extract($pstal_keys);

			 $data = array(
            'topic_id' => $topicID,
            'question_heading' => $questionHEAD,
            'description' => $Description,
            'city' => $city,
            'email_id' => $email_ID,
            'mobile' => $mobile,
            'created_on' => $cdates
            );

        	if($this->Common_model->inset_to_tbl('advices',$data))
        	{
        		$ask_id=$this->db->insert_id();

        		$uploadData=array();
       	 if(!empty($_FILES['documents']['name'])){        	
            $filesCount = count($_FILES['documents']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['document']['name']     = $_FILES['documents']['name'][$i];
                $_FILES['document']['type']     = $_FILES['documents']['type'][$i];
                $_FILES['document']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
                $_FILES['document']['error']    = $_FILES['documents']['error'][$i];
                $_FILES['document']['size']     = $_FILES['documents']['size'][$i];                
                // File upload configuration
                $randon_number = $ask_id.mt_rand (10,500);
           		$file_name = 'AADV'.time().'_'.$randon_number;
                $uploadPath = './storage/user_files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']            = $file_name;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('document')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['user_id'] = 'ASK'.$ask_id;
                    $uploadData[$i]['created_on'] = $cdates;
                    $uploadData[$i]['document_type'] = 'ONLINE_ADVICES';
                    $uploadData[$i]['document_path'] = 'storage/user_files/'.$fileData['file_name'];
                }
                else
                {
                	$statusMsg="يتعذر تحميل الملفات الآن ، يرجى التحقق مما إذا كنت قد حددت صورة أم لا";

                }
            }
	            if(!empty($uploadData)){            	
	                $set_users = $this->Common_model->inset_to_batch('user_documents',$uploadData);
	            }
        	}

        	$message="<p class='form-success'>استفسارك قدم بنجاح</p>";
        	$this->session->set_flashdata('success',$message,3);
        	redirect('arabic/pages/online_advice', 'refresh');
        	return true;

        }
        	$this->session->set_flashdata('success',$message,3);
			$this->online_advice($data);

		endif;
	}







	// public function post_required($data=array())
	// {
	// 	if(!is_array($data)){ $data=array(); }
		
	// }





/* END
Passswrod recover methods of all type of user 
*/


	public function testfile222()
	{

		// $data['title'] = "Biladil - Member login panel";
		 //$this->load->view('website/include/header.php', $data);
		// let tagers = {img: "src",link:"href", script:"src"};
		 //$this->load->view('website/articles.html');
		 echo 
				'<script type="text/javascript">
					var baseurl="'.base_url("assets/website/").'";
					var replaced_with="assets/";
					window.addEventListener("load", function () {
					    let tagers = {img: "src"};
					    for (let [tagsName, source] of Object.entries(tagers)) {      
					        var elements = document.getElementsByTagName(tagsName);
					        for (var i = 0; i < elements.length; i++) {
					             var Athestring= elements[i].getAttribute(source);        
					           var Nthestring= Athestring.replace(replaced_with, baseurl);
					            elements[i].setAttribute(source, Nthestring);            
					        }
					    }
					})

				</script>
				';
		 //$this->load->view('website/include/footer.php', $data);
	}

	function get_hyperPay()
{

	if(!$this->session->has_userdata('user_id'))
	{
		redirect(base_url('arabic/Login/member_normal_login/'),'refresh');
	}
	if(!$this->input->get('id'))
    {
    	redirect(base_url(),'refresh');
    }
    $packageID= $this->input->get('id');
    $condition = array(
            'id' => $packageID,
            'status' => 1                        
            );
    $package_details=$this->Common_model->get_one_row_data('packages',$condition);
	if(empty($package_details))
    {           
       die("packages Not found");
    }
 	$this->session->set_tempdata('PackageID',$packageID,1500);	
    $amount=$package_details->price;
    $parameter['amount']= $amount;
	$responseData = self::request_me2($parameter);
	$responseData=json_decode($responseData);
	$data['ini_payment']=$responseData;
	 //$this->load->view('website/include/header.php', $data);
	 $this->load->view('website/payment-page.php', $data);
	 //$this->load->view('website/include/footer.php', $data);


}

function request_me2($parameter=array()) {
		extract($parameter);
		
		$user_id = $this->session->userdata('user_id');
		if($this->session->userdata('user_type')=='member'){$type='memeber';}
		else if($this->session->userdata('user_type')=='lawyer'){$type='lawyer';}
		else if($this->session->userdata('user_type')=='student'){$type='students';}
		
		$user_details = $this->Common_model->get_one_row_data($type.'_details',"user_id=".$this->session->userdata('user_id'));
		if($user_details->street_name==''){$user_details->street_name='NA';}
		if($user_details->region==''){$user_details->region='NA';}
		if($user_details->state==''){$user_details->state='NA';}
		if($user_details->county_code==''){$user_details->county_code='NA';}
		if($user_details->zip_code==''){$user_details->zip_code='NA';}
		
		$rand = mt_rand(100000, 999999);
		$url = "https://test.oppwa.com/v1/checkouts";
		$data = "entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
				"&amount=$parameter[amount]".
				"&currency=SAR" .
				"&merchantTransactionId=biladl.$rand".
				"&testMode=EXTERNAL".
				"&paymentType=DB".
				"&merchantTransactionId=biladl.$rand". // thissss is should be       unique with every transaction
                "&customer.email=".$this->session->userdata('user_email').
                "&billing.street1=".$user_details->region.         
                "&billing.city=".$user_details->region.      
                "&billing.state=".$user_details->state.           
                "&billing.country=".$user_details->county_code.
                "&billing.postcode=".$user_details->zip_code.
                "&customer.givenName=".$this->session->userdata('user_name').
                "&customer.surname=mr";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	                   'Authorization:Bearer OGFjOWE0Yzc2Y2IzYjI4YzAxNmNiM2I5ZDE4NzAwNzl8alhocDJzczZtVw=='));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$responseData = curl_exec($ch);
		//print_r($responseData);
		if(curl_errno($ch)) {
			return curl_error($ch);
		}
		curl_close($ch);
		return $responseData;
	}

protected function request_me($parameter=array()) 
	{
		extract($parameter);
		$url = "https://oppwa.com/v1/checkouts";
		$data = "authentication.userId=8ac9a4c76cb3b28c016cb3b9d1870079" .
            "&authentication.password=jXhp2ss6mW" .
            "&authentication.entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
            "&amount=1.00".
            "&currency=SAR" .
            "&paymentType=DB" .
         "&merchantTransactionId=test1131112992". // thissss is should be       unique with every transaction
              "&customer.email=aser@fastnet.net.sa".
                "&billing.street1=sdgdfgfgr".         
"&billing.city=Jeddah".      
"&billing.state=Jeddah".           
"&billing.country=PK".
"&billing.postcode=54000".
"&customer.givenName=Yaser".
"&customer.surname=mr";
             "&notificationUrl=".base_url('pages/getPayStatus_test/');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$responseData = curl_exec($ch);
			
// 		$url = "https://oppwa.com/v1/checkouts";
//         $data = "authentication.userId=8ac9a4c76cb3b28c016cb3b9d1870079" .
//                 "&authentication.password=jXhp2ss6mW".
//                 "&authentication.entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
//                 "&amount=$amount".
//                 "&currency=SAR".
//                 "&testMode=EXTERNAL" .
//                 "&paymentType=DB".
//                 "&merchantTransactionId=biladl345789".
//                 "&customer.email=khadeer.md@iprismtech.com".
//                 "&billing.street1=Jubilee hills".
//                 "&billing.city=Riyad".
//                 "&billing.state=Riyad".
//                 "&billing.country=Saudhi".
//                 "&billing.postcode=500061".
//                 "&customer.givenName=Khadeer".
//                 "&customer.surname=Mohammed".
//                 "&notificationUrl=http://www.biladl.com/app/ws/Hyper_Status";
//                 //"&shopperResultUrl=customui://ss";
//                 //print_r($data);exit;
// 				$ch = curl_init();
// 				curl_setopt($ch, CURLOPT_URL, $url);
// 				curl_setopt($ch, CURLOPT_POST, 1);
// 				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
// 				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 				$responseData = curl_exec($ch);
				
				
				// $url = "https://oppwa.com/v1/checkouts";         
				// $data = "authentication.userId=8ac9a4c76cb3b28c016cb3b9d1870079" .                 
				// "&authentication.password=jXhp2ss6mW".                 
				// "&authentication.entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .                 
				// "&amount=$amount".                 
				// "&currency=$currency".                 
				// "&paymentType=$payment_type".                 
				// "&merchantTransactionId=biladl345789".                 
				// "&customer.email=khadeer.md@iprismtech.com".                
				// "&billing.street1=Jubilee hills".                 
				// "&billing.city=Riyad".                 
				// "&billing.state=Riyad".                 
				// "&billing.country=Saudhi".                 
				// "&billing.postcode=500061".                 
				// "&customer.givenName=Khadeer".                 
				// "&customer.surname=Mohammed".                 
				// "&notificationUrl=http://www.biladl.com/app/ws/Hyper_Status";                 
				// //"&shopperResultUrl=customui://ss";                 
				// //print_r($data);exit;                 
				// $ch = curl_init();                 
				// curl_setopt($ch, CURLOPT_URL, $url);                 
				// curl_setopt($ch, CURLOPT_POST, 1);                 
				// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                 
				// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production                 
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                 
				// $responseData = curl_exec($ch);               

		if(curl_errno($ch)) {
			return curl_error($ch);
		}
		curl_close($ch);
		return $responseData;
	}








	
}
?>