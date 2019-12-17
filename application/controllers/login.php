<?php
class Login extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('id'))
        return redirect('admin/welcome');
  }
  public function index()
  {
    $this->form_validation->set_rules('username','User Name','required|alpha');
    $this->form_validation->set_rules('password','Password','required|max_length[12]');
    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

    if($this->form_validation->run())
    {
      // echo"form goto database";
      $username=$this->input->post('username');
      $password=$this->input->post('password');
      $this->load->model('loginmodel');
      $login_id=$this->loginmodel->isvalidate($username,$password);
      if($login_id)
      {
        $this->session->set_userdata('id',$login_id);
        return redirect('admin/welcome');

      }
      else
      {
        $this->session->set_flashdata('Login_failed','Invalid Username or Password');
        return redirect('login');
      }
    }
    else
     {
      $this->load->view('admin/login');
    }
  }

  public function register()
  {
    $this->load->view('admin/register');
  }
  public function sendemail()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
      if($this->form_validation->run('register_validation'))
    {
      $post=$this->input->post();
      $this->load->model('loginmodel','user_add');
      if($this->user_add->add_user($post))
        {
          $this->session->set_flashdata('user','user added successfully');
          $this->session->set_flashdata('user_class','alert-success');

        }
      else
         {
           $this->session->set_flashdata('user','user not added successfully');
           $this->session->set_flashdata('user_class','alert-danger');
        }
        return redirect('login/register');

    }
    else
    {
      $this->load->view('admin/register');
    }
  }
}


 ?>
