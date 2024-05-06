<?php

namespace App\Models;

use CodeIgniter\Model;


class BlogModel extends Model{
    protected $table = 'blog';
    protected $allowedFields=['title','description'];
    
        public function getBlogs()
        {
            return $this->orderBy('id','ASC')->findAll();
        }

        public function createBlog($data)
        {
            return $this->insert($data);
        }
        public function viewBlog($id)
        {
            return $this->where('id',$id)->first();
        }
        public function updateBlog($id,$data)
        {
            return $this->update($id,$data);
        }
        public function deleteBlog($id)
        {
            return $this->delete($id);
        }

}

?>