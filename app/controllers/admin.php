<?php

class admin extends Controller
{
	protected $user;


	public function __construct()
	{
		// initliaze the models that need to be used in this controller
		$this->user = $this->model('user');
		$this->student = $this->model('student');
	}

	public function index()
	{
		// if user is not logged then it can not access this method
		if(Session::get('loggin') == false)
		{
			$this->redirect('admin/login');
		}

		$this->view('layout/header');
		$this->view('layout/navbar');
		$this->view('admin/index');
		$this->view('layout/footer');
	}

	/* do login in if cred. matches
	* @param $_post data
	*/
	public function login ()
	{
		// if already logged in the redirect to dashboard page
		if(Session::get('loggin') == true)
		{
			$this->redirect('admin/index');
		}

		if(isset($_POST) && !empty($_POST))
		{
		//call protected function to login the user
			$this->__postLogin();
		}

		$this->view('layout/header');
		$this->view('admin/login');
		$this->view('layout/header');
	}

	/* 
	*to logout from the system
	*/
	public function logout()
	{
		Session::destroy();
		$this->redirect('admin/login');
	}

	/* do login in cred. matches
	* @param $_post data
	* @redirect to dashboard if cred. matches
	*/
	protected function __postLogin()
	{
		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$userData = $this->user->getBy('username', $username);
			if (isset($userData) && !empty($userData)) 
			{
				if (MD5($password) == $userData['0']['password']) 
				{
					//set the session to true
					Session::set('loggin',true);
					// if matches username and password redirect to index
					$this->redirect('admin/index');
				} 
				else
				{
					//when password is wrong
					$response = array();
					$response['message'][] = 'Your password is wrong, please try again !';
					$this->view('admin/login', $response);
				}
			} 
			else
			{
				// when username is wrong
				$response = array();
				$response['message'][] = 'Your Username is wrong, please try again !';
				$this->view('admin/login', $response);	
			}
		}
		else
		{
			// if user press submit button without entering username and password
			$response = array();
			$response['message'][] = 'Please enter username and password to login !';
			$this->view('admin/login',$response);
		}
	}

	/*
	* to list the students
	*/
	public function students()
	{
		$students = $this->student->getAll();


		$this->view('layout/header');
		$this->view('layout/navbar');
		$this->view('admin/students', $students);
		$this->view('layout/footer');
	}

	/*
	* to add the students
	*/

	public function addStudents()
	{
		$this->view('layout/header');
		$this->view('layout/navbar');
		$this->view('admin/add');
		$this->view('layout/footer');
		exit;

	}

	/*
	* to save the students
	*/

	public function saveStudents()
	{
		if(isset($_POST['submit']))
		{
			
			$data = array();
			$data['username'] = $_POST['username'];
			$data['email'] = $_POST['email'];
			$data['name'] = $_POST['name'];
			$data['gender'] = $_POST['gender'];
			$data['additional_information'] = $_POST['additional_information'];
			$data['hobbies'] = implode(',',$_POST['hobbies']);
			$data['test_score'] = $_POST['test_score'];

			// save data in to database
			$last_insert_id = $this->student->save($data);
			if(!empty($last_insert_id)){
				$response = array();
				$response['message'][] = 'Your data has been saved !';
				$this->view('admin/students',$response);
			}else{
				$response = array();
				$response['message'][] = 'There is some problem, Please try again! !';
				$this->view('admin/students',$response);
			}
			
			
		}
		
	}

	/*
	* to edit the students
	*/

	public function editStudents($id)
	{
		echo 'edit sutdent of this id'.$id;
		exit;

	}


	/*
	* to edit the students
	*/

	public function deleteStudents($id)
	{
		echo 'delete sutdent of this id'.$id;
		exit;

	}

	
	
	
}