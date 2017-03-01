<?php

  class ShareModel extends Model{
    public function index(){
      //$this->query('SELECT * FROM shares ORDER BY postdate DESC');

    $this->query('SELECT shares.title, shares.body, shares.link, shares.postdate, users.name, users.id
      FROM  shares INNER JOIN  users ON shares.userid = users.id');

      $rows = $this->resultSet();


      return $rows;
    }


    public function add()
    {
      //sanitize post
      $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      if($post['submit'])
      {

        if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
          Messages::setMesssage('Please Fill In All Fields', 'error');
          return;
        }
        //insert into db
        $this->query("INSERT INTO shares(userid,title,body,link) VALUES(:userid,:title,:body,:link)");
        $this->bind(":userid",$_SESSION['userData']['id']);
        $this->bind(":title",$post['title']);
        $this->bind(":body",$post['body']);
        $this->bind(":link",$post['link']);
        $this->execute();

        if($this->lastInsertId())
        {
          header("Location:".ROOT_URL."shares");
        }



      }
      return;

    }
  }


 ?>
