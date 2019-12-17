<?php
class loginmodel extends CI_Model
{
  public function add_user($post)
  {
    // $this->load->library('database');
    return $this->db->insert('users',$post);
  }
  public function isvalidate($username,$password)
  {
    $q=$this->db->where(['username'=>$username,'password'=>$password])
             ->get('users');
    if($q->num_rows())
    {
      return $q->row()->id;
    }
    else
     {
      return false;
    }

  }
  public function add_articles($post)
  {
    return $this->db->insert('articles',$post);
  }
  public function articleList($limit,$offset)
  {
    $id=$this->session->userdata('id');
    $q=$this->db->select()
                ->from('articles')
                ->where(['user_id'=>$id])
                ->limit($limit,$offset)
                ->get();
    return $q->result();

  }
  public function find_article($articleid)
  {
    $q=$this->db->Select(['article_title','article_body','id'])
                ->where(['id'=>$articleid])
                ->get('articles');
  return $q->row();
  }
  public function updatearticle($articleid,Array $post)
  {
    return $this->db->where('id',$articleid)
                    ->update('articles',$post);


  }
  public function del_article($articleid,Array $post)
  {
    return $this->db->where('id',$articleid)
                    ->delete('articles',$post);
  }
  public function num_rows()
  {
    $id=$this->session->userdata('id');
      $q=$this->db->select()
                  ->from('articles')
                  ->where(['user_id'=>$id])
                  ->get();
              return $q->num_rows();
  }

  public function all_articleList($limit,$offset)
   {

    $query=$this->db->select()
             ->from('articles')
              ->limit($limit,$offset)
             ->get();


            return  $query->result();
   }

   public function all_articles_count()
   {

    $q=$this->db->select()
             ->from('articles')

             ->get();
            return $q->num_rows();

   }

}


 ?>
