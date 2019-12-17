<?php
class Admin extends MY_Controller
{
  public function index()
  {
  return redirect('admin/login');
  }
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('id'))
      return redirect('login');
  }
  public function welcome()
  {

    $this->load->model('loginmodel','ar');
    $this->load->library('pagination');
    // echo $this->ar->num_rows();
    // exit();
    $config=[
        'base_url'=>base_url('admin/welcome'),
        'per_page'=>2,
        'total_rows'=>$this->ar->num_rows(),
        'full_tag_open'=>"<ul class='pagination'>",
        'full_tag_close'=>"</ul>",
        'next_tag_open' =>"<li>",
        'next_tag_close' =>"</li>",
        'prev_tag_open' =>"<li>",
        'prev_tag_close' =>"</li>",
        'num_tag_open' =>"<li>",
        'num_tag_close' =>"</li>",
        'cur_tag_open' =>"<li class='active'><a>",
        'cur_tag_close' =>"</a></li>"
      ];
    $this->pagination->initialize($config);
    $articles=$this->ar->articleList($config['per_page'],$this->uri->segment(3));
    $this->load->view('admin/dashbord',['articles'=>$articles]);
  }
  public function logout()
  {
    $this->session->unset_userdata('id');
    return redirect('login');
  }
  public function adduser()
  {
    $this->load->view('admin/add_article');
  }
  public function edituser($id)
  {
    $this->load->model('loginmodel');
    $article=$this->loginmodel->find_article($id);
    $this->load->view('admin/edit_article',['article'=>$article]);
  }
  public function userValidation()
  {
    $config=[
      'upload_path'=>'./upload/',
      'allowed_types'=>'gif|jpeg|png|jpg',
    ];

    $this->load->library('upload',$config);

    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

    if($this->form_validation->run('add_article_rules')&& $this->upload->do_upload())
    {
      $post=$this->input->post();
      $data=$this->upload->data();
      $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);

      $post['image_path']=$image_path;
      // print_r($post);
      // exit;
      $this->load->model('loginmodel','useradd');
      if($this->useradd->add_articles($post))
      {
        $this->session->set_flashdata('user','Articles added successfully');
        $this->session->set_flashdata('user_class','alert-success');
      }
      else
      {
        $this->session->set_flashdata('user','Articles not added successfully');
        $this->session->set_flashdata('user_class','alert-danger');
      }
      return redirect('admin/welcome');
    }
    else
    {
      $upload_error=$this->upload->display_errors();
      $this->load->view('admin/add_article',compact('upload_error'));
    }
  }
  public function update_article($articleid)
  {
    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
    if($this->form_validation->run('add_article_rules'))
    {
      $post=$this->input->post();
      $this->load->model('loginmodel','useradd');
      if($this->useradd->updatearticle($articleid,$post))
      {
        $this->session->set_flashdata('user','Articles updated successfully');
        $this->session->set_flashdata('user_class','alert-success');
      }
      else
      {
        $this->session->set_flashdata('user','Articles not updated successfully');
        $this->session->set_flashdata('user_class','alert-danger');
      }
      return redirect('admin/welcome');
    }
    else
     {
       $this->load->view('admin/edituser');
    }

  }
  public function delarticle($articleid)
  {
    $post=$this->input->post();
    $this->load->model('loginmodel','useradd');
    if($this->useradd->del_article($articleid,$post))
    {
      $this->session->set_flashdata('user','Articles Deleted successfully');
      $this->session->set_flashdata('user_class','alert-success');
    }
    else
    {
      $this->session->set_flashdata('user','Articles not Deleted successfully');
      $this->session->set_flashdata('user_class','alert-danger');
    }
    return redirect('admin/welcome');

  }


}



 ?>
