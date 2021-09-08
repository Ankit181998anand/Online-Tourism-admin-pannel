<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	public function packages()
	{
		header("Access-Control-Allow-Origin: *");

		$packages = $this->api_model->get_packages($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($packages)){
			foreach($packages as $package){

				$short_desc = strip_tags(character_limiter($package->description, 70));
				$author = $package->first_name.' '.$package->last_name;
				$posts[] = array(
					'id' => $package->id,
					'title' => $package->title,
					'price'=>$package->price,
					'rating'=>$package->rating,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$package->image),
					'created_at' => $package->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function home_banners()
	{
		header("Access-Control-Allow-Origin: *");

		$banner = array();
		$home_banners = $this->api_model->get_home_banners();
		if(!empty($home_banners)){
			foreach($home_banners as $home_banner){
				$banner[] = array(
					'id' => $home_banner->id,
					'title' => $home_banner->title,
					'button_title'=>$home_banner->button_title,
					'imagename' => base_url('media/images/'.$home_banner->imagename),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($banner));
	}
	public function package_banners()
	{
		header("Access-Control-Allow-Origin: *");

		$banner = array();
		$package_banners = $this->api_model->get_package_banners();
		if(!empty($package_banners)){
			foreach($package_banners as $package_banner){
				$banner[] = array(
					'id' => $package_banner->id,
					'title' => $package_banner->title,
					'imagename' => base_url('media/images/'.$package_banner->imagename),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($banner));
	}

	public function destination_banners()
	{
		header("Access-Control-Allow-Origin: *");

		$banner = array();
		$destination_banners = $this->api_model->get_destination_banners();
		if(!empty($destination_banners)){
			foreach($destination_banners as $destination_banner){
				$banner[] = array(
					'id' => $destination_banner->id,
					'title' => $destination_banner->title,
					'imagename' => base_url('media/images/'.$destination_banner->imagename),
				);
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($banner));
	}
	/////////////	cat_package
	public function cat_packages()
	{
		header("Access-Control-Allow-Origin: *");

		$cat = array();
		$cat_packages = $this->api_model->get_cat_packages();
		if(!empty($cat_packages)){
			foreach($cat_packages as $cat_package){
				$cat[] = array(
					'id' => $cat_package->id,
					'name' => $cat_package->name
				);
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($cat));
	}
	/////////////	cat_destinations
	public function cat_destinations()
	{
		header("Access-Control-Allow-Origin: *");

		$cat = array();
		$cat_destinations = $this->api_model->get_cat_destinations();
		if(!empty($cat_destinations)){
			foreach($cat_destinations as $cat_destination){
				$cat[] = array(
					'id' => $cat_destination->id,
					'name' => $cat_destination->name
				);
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($cat));
	}


	//////service // why us


	public function services()
	{
		header("Access-Control-Allow-Origin: *");

		$data = array();
		$services = $this->api_model->get_services();
		if(!empty($services)){
			foreach($services as $service){
				$short_desc = strip_tags(character_limiter($service->des, 70));
				$data[] = array(
					'id' => $service->id,
					'name' => $service->name,
					'short_desc' => html_entity_decode($short_desc),
					'imagename' => base_url('media/images/'.$service->imagename),

				);
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}
 ///////////////testimonial


 	public function testimonial()
 	{
 		header("Access-Control-Allow-Origin: *");

 		$data = array();
 		$testimonials = $this->api_model->get_testimonials();
 		if(!empty($testimonials)){
 			foreach($testimonials as $testimonial){
 				$data[] = array(
 					'id' => $testimonial->id,
 					'name' => $testimonial->name,
 					'details' => $testimonial->details,
					'rating' => $testimonial->rating,
					'des' => $testimonial->des,
 					'image' => base_url('media/images/'.$testimonial->image),
 				);
 			}
 		}
 		$this->output
 			->set_content_type('application/json')
 			->set_output(json_encode($data));
 	}
	public function featured_packages()
	{
		header("Access-Control-Allow-Origin: *");

		$packages = $this->api_model->get_packages($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($packages)){
			foreach($packages as $package){

				$short_desc = strip_tags(character_limiter($package->description, 70));
				$author = $package->first_name.' '.$package->last_name;

				$posts[] = array(
					'id' => $package->id,
					'title' => $package->title,
					'price'=>$package->price,
					'rating'=>$package->rating,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$package->image),
					'created_at' => $package->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function package($id)
	{
		header("Access-Control-Allow-Origin: *");

		$package = $this->api_model->get_package($id);

		$author = $package->first_name.' '.$package->last_name;

		$post = array(
			'id' => $package->id,
			'title' => $package->title,
			'description' => $package->description,
			'rating' => $package->rating,
			'price' => $package->price,
			'author' => $author,
			'image' => base_url('media/images/'.$package->image),
			'created_at' => $package->created_at
		);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	///
	//    Destination

	public function destinations()
	{
	  header("Access-Control-Allow-Origin: *");

	  $destinations = $this->api_model->get_destinations($featured=false, $recentpost=false);

	  $posts = array();
	  if(!empty($destinations)){
	    foreach($destinations as $destination){

	      $short_desc = strip_tags(character_limiter($destination->description, 70));
	      $author = $destination->first_name.' '.$destination->last_name;

	      $posts[] = array(
	        'id' => $destination->id,
	        'title' => $destination->title,
	        'price'=>$destination->price,
	        'rating'=>$destination->rating,
	        'short_desc' => html_entity_decode($short_desc),
	        'author' => $author,
	        'image' => base_url('media/images/'.$destination->image),
	        'created_at' => $destination->created_at
	      );
	    }
	  }

	  $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($posts));
	}

	public function featured_destinations()
	{
	  header("Access-Control-Allow-Origin: *");

	  $destinations = $this->api_model->get_destinations($featured=true, $recentpost=false);

	  $posts = array();
	  if(!empty($destinations)){
	    foreach($destinations as $destination){

	      $short_desc = strip_tags(character_limiter($destination->description, 70));
	      $author = $destination->first_name.' '.$destination->last_name;

	      $posts[] = array(
	        'id' => $destination->id,
	        'title' => $destination->title,
	        'price'=>$destination->price,
	        'rating'=>$destination->rating,
	        'short_desc' => html_entity_decode($short_desc),
	        'author' => $author,
	        'image' => base_url('media/images/'.$destination->image),
	        'created_at' => $destination->created_at
	      );
	    }
	  }

	  $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($posts));
	}

	public function destination($id)
	{
	  header("Access-Control-Allow-Origin: *");

	  $destination = $this->api_model->get_destination($id);

	  $author = $destination->first_name.' '.$destination->last_name;

	  $post = array(
	    'id' => $destination->id,
	    'title' => $destination->title,
			'rating' => $destination->rating,
			'price' => $destination->price,
	    'description' => $destination->description,
	    'author' => $author,
	    'image' => base_url('media/images/'.$destination->image),
	    'created_at' => $destination->created_at
	  );

	  $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($post));
	}
	//
	///

	public function recent_packages()
	{
		header("Access-Control-Allow-Origin: *");

		$packages = $this->api_model->get_packages($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($packages)){
			foreach($packages as $package){

				$short_desc = strip_tags(character_limiter($package->description, 70));
				$author = $package->first_name.' '.$package->last_name;

				$posts[] = array(
					'id' => $package->id,
					'title' => $package->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$package->image),
					'created_at' => $package->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function categories()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model->get_categories();

		$category = array();
		if(!empty($categories)){
			foreach($categories as $cate){
				$category[] = array(
					'id' => $cate->id,
					'name' => $cate->category_name
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($category));
	}

	public function page($slug)
	{
		header("Access-Control-Allow-Origin: *");

		$page = $this->api_model->get_page($slug);

		$pagedata = array(
			'id' => $page->id,
			'title' => $page->title,
			'description' => $page->description
		);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pagedata));
	}

	public function contact()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');

		$formdata = json_decode(file_get_contents('php://input'), true);

		if( ! empty($formdata)) {

			$name = $formdata['name'];
			$email = $formdata['email'];
			$phone = $formdata['phone'];
			$message = $formdata['message'];

			$contactData = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'message' => $message,
				'created_at' => date('Y-m-d H:i:s', time())
			);

			$id = $this->api_model->insert_contact($contactData);

			$this->sendemail($contactData);

			$response = array('id' => $id);
		}
		else {
			$response = array('id' => '');
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function sendemail($contactData)
	{
		$message = '<p>Hi, <br />Some one has submitted contact form.</p>';
		$message .= '<p><strong>Name: </strong>'.$contactData['name'].'</p>';
		$message .= '<p><strong>Email: </strong>'.$contactData['email'].'</p>';
		$message .= '<p><strong>Phone: </strong>'.$contactData['phone'].'</p>';
		$message .= '<p><strong>Name: </strong>'.$contactData['message'].'</p>';
		$message .= '<br />Thanks';

		$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$this->email->from('demo@rsgitech.com', 'RSGiTECH');
		$this->email->to('demo2@rsgitech.com');
		$this->email->cc('another@rsgitech.com');
		$this->email->bcc('them@rsgitech.com');

		$this->email->subject('Contact Form');
		$this->email->message($message);

		$this->email->send();
	}

	public function login()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
    header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');

    $formdata = json_decode(file_get_contents('php://input'), true);

    $username = $formdata['username'];
    $password = $formdata['password'];

    $user = $this->api_model->login($username, $password);

    if($user) {
        $response = array(
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'token' => $user->token
        );
    }
    else {
        $response = array();
    }

    $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
}
////////////////  userTimelines
public function userTimelines()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$timelines = $this->api_model->get_user_timeline($token);
		foreach($timelines as $timeline) {
			$name = $timeline->first_name.' '.$timeline->last_name;
			$profile_image=$timeline->pimage;
			$user_id= $timeline->luser_id;
			$posts[] = array(
				'id' => $timeline->id,
				'des' => $timeline->des,
				'name'=>$name,
				'user_id'=>$user_id,
				'profile_image'=>base_url('media/images/'.$profile_image),
				'image' => base_url('media/images/'.$timeline->image),
				'posted_at' => $timeline->posted_at
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
}
/////////////////////////////////////////////////
/////////////////////getTimeline(id:number)

public function userTimeline($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$timeline = $this->api_model->get_user_timelin($id);

		$post = array(
			'id' => $timeline->id,
			'des' => $timeline->des,
			'user_id'=>$timeline->luser_id,
			'image' => base_url('media/images/'.$timeline->image),
			'posted_at' => $timeline->posted_at
		);


		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}
}
///////////////////////////////////

	public function addTimeline()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {
			$des = $this->input->post('des');
			$user_id = $this->input->post('user_id');
			$filename = NULL;
			$isUploadError = FALSE;
			if ($_FILES && $_FILES['image']['name']) {

							$config['upload_path']          = './media/images/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$timelineData = array(
					'user_id' => $user_id,
					'des' => $des,
					'image' => $filename,
					'posted_at' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model->inserttimeline($timelineData);

				$response = array(
					'status' => 'success'
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}

//////////////////////// updateTimeline

	public function updateTimeline($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$timeline = $this->api_model->get_user_timelin($id);
			$filename = $timeline->image;
			$des = $this->input->post('des');
			$user_id = $this->input->post('user_id');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {

					if($timeline->image && file_exists(FCPATH.'media/images/'.$timeline->image))
					{
						unlink(FCPATH.'media/images/'.$timeline->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$timelineData = array(

					'des' => $des,
					'image' => $filename,
					'user_id' => $user_id,
				);

				$this->api_model->updateTimeline($id, $timelineData);

				$response = array(
					'status' => 'success'
				);
           	}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}

	/////////////////////////deleteTimeline



		public function deleteTimeline($id)
		{
			header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			header("Access-Control-Allow-Headers: authorization, Content-Type");

			$token = $this->input->get_request_header('Authorization');

			$isValidToken = $this->api_model->checkToken($token);

			if($isValidToken) {

				$timeline = $this->api_model->get_user_timelin($id);

				if($timeline->image && file_exists(FCPATH.'media/images/'.$timeline->image))
				{
					unlink(FCPATH.'media/images/'.$timeline->image);
				}

				$this->api_model->deleteTimeline($id);

				$response = array(
					'status' => 'success'
				);

				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode($response));
			}
		}

//////////////////////user_info

public function user_info()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$info = $this->api_model->get_user_info($token);

		$post = array(
			'user_id' => $info->id,
			'first_name' => $info->first_name,
			'last_name'=>$info->last_name,
			'mobile'=>$info->mobile,
			'email'=>$info->email,
			'bio'=>$info->bio,
			'username'=>$info->username,
			'title'=>$info->title,
			'p_no'=>$info->p_no,
			'country'=>$info->country,
			'state'=>$info->state,
			'city'=>$info->city,
			'pc'=>$info->pc,
			'pimage' => base_url('media/images/'.$info->pimage),
			'cover' => base_url('media/images/'.$info->cover)
		);
		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}
}
///////////////////////// bookgetdestination
public function bookgetdestination($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');
	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

	$destination = $this->api_model->get_destination($id);

	$author = $destination->first_name.' '.$destination->last_name;

	$post = array(
		'id' => $destination->id,
		'title' => $destination->title,
		'rating' => $destination->rating,
		'price' => $destination->price,
		'description' => $destination->description,
		'author' => $author,
		'image' => base_url('media/images/'.$destination->image),
		'created_at' => $destination->created_at
	);

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($post));
}
}


//////////////////////////bookingDes
public function bookingDes()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {
		$des_id = $this->input->post('des_id');
		$user_id = $this->input->post('user_id');
		$f_name= $this->input->post('f_name');
		$mobile= $this->input->post('mobile');
		$email= $this->input->post('email');
		$price=$this->input->post('price');

					$bookingData = array(
				'user_id' => $user_id,
				'des_id' => $des_id,
				'f_name'=>$f_name,
				'mobile'=>$mobile,
				'email' => $email,
				'price'=>$price,
				'book_at' => date('Y-m-d H:i:s', time())
			);

			$id = $this->api_model->bookingData($bookingData);
			$response = array(
				'status' => 'success'
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
/////////////////////////getmybookingdes
public function getmybookingdes()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$book_ds = $this->api_model->get_user_booking_des($token);
		foreach($book_ds as $book_d) {
			$posts[] = array(
				'id' => $book_d->id,
				'des_id' => $book_d->des_id,
				'price'=>$book_d->price,
				'ispaid'=>$book_d->ispaid,
				'des_title'=>$book_d->des_title
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
}
///////////////////////

	public function adminBlogs()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$packages = $this->api_model->get_admin_packages();
			foreach($packages as $package) {
				$posts[] = array(
					'id' => $package->id,
					'title' => $package->title,
					'image' => base_url('media/images/'.$package->image),
					'created_at' => $package->created_at
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts));
		}
	}

	public function adminBlog($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$package = $this->api_model->get_admin_package($id);

			$post = array(
				'id' => $package->id,
				'title' => $package->title,
				'description' => $package->description,
				'image' => base_url('media/images/'.$package->image),
				'is_featured' => $package->is_featured,
				'is_active' => $package->is_active
			);


			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post));
		}
	}

	public function createBlog()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$is_featured = $this->input->post('is_featured');
			$is_active = $this->input->post('is_active');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

							$config['upload_path']          = './media/images/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$packageData = array(
					'title' => $title,
					'user_id' => 1,
					'description' => $description,
					'image' => $filename,
					'is_featured' => $is_featured,
					'is_active' => $is_active,
					'created_at' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model->insertBlog($packageData);

				$response = array(
					'status' => 'success'
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}

	public function updateBlog($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$package = $this->api_model->get_admin_package($id);
			$filename = $package->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$is_featured = $this->input->post('is_featured');
			$is_active = $this->input->post('is_active');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {

					if($package->image && file_exists(FCPATH.'media/images/'.$package->image))
					{
						unlink(FCPATH.'media/images/'.$package->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$packageData = array(
					'title' => $title,
					'user_id' => 1,
					'description' => $description,
					'image' => $filename,
					'is_featured' => $is_featured,
					'is_active' => $is_active
				);

				$this->api_model->updateBlog($id, $packageData);

				$response = array(
					'status' => 'success'
				);
           	}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}

	public function deleteBlog($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$package = $this->api_model->get_admin_package($id);

			if($package->image && file_exists(FCPATH.'media/images/'.$package->image))
			{
				unlink(FCPATH.'media/images/'.$package->image);
			}

			$this->api_model->deleteBlog($id);

			$response = array(
				'status' => 'success'
			);

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}
}
