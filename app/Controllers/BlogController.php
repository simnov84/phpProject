<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Controller;


class BlogController extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['blogs']=$model->getBlogs();
        return view('blog',$data);
    }

    public function store()
    {
        $data=[
            'title'=>$this->request->getVar('title'),
            'description'=>$this->request->getVar('description')
        ];
        $model=new BlogModel();
        $blogs=$model->createBlog($data);

        if($blogs){
            return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function viewBlog($id)
    {
       $model=new BlogModel();
       $res=$model->viewBlog($id);
       print_r($res);
    }
    
    public function updateBlog()
    {
        $id=$this->request->getvar('id');
        $data=[
            'title'=>$this->request->getVar('title'),
            'description'=>$this->request->getVar('description')
        ];
        $model=new BlogModel();
        $res=$model->updateBlog($id,$data);
        if($res >=1){
            return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function deleteBlog()
    {
        $id=$this->request->getvar('id');
        $model=new BlogModel();
        $res=$model->deleteBlog($id);
        if($res){
            return redirect('/');
        }else{
            return redirect('/');
        }
    }
}