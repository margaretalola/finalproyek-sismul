<?php

namespace App\Controllers;

use App\Models\M_welcome;
use CodeIgniter\Controller;

class Welcome extends Controller
{
    protected $model;
    protected $session;

    public function __construct()
    {
        $this->model = new M_welcome();
        $this->session = \Config\Services::session();
        helper(['url', 'form']);
    }
    
    public function index($id = null)
    {
        if ($id === null) {
            // Display all posts
            $data['home_post'] = $this->model->readPost();
            return view('header') . view('home', $data) . view('footer');
        } else {
            // Display specific post
            $data['post'] = $this->model->readPost($id);
            
            if (!$data['post']) {
                session()->setFlashdata('error', 'Post not found');
                return redirect()->to(base_url());
            }
            
            return view('header') . view('post', $data) . view('footer');
        }
    }

    public function view($id)
    {
        // Regular code (uncomment after testing)
        $data['post'] = (object) $this->model->readPost($id);
        
        if (!$data['post']) {
            session()->setFlashdata('error', 'Post not found');
            return redirect()->to(base_url());
        }
        
        return view('header') . view('view_post', $data) . view('footer');
    }

    public function edit($id)
    {
        
        // Regular code (uncomment after testing)
        $data['post'] = (object) $this->model->readPost($id);
        
        if (!$data['post']) {
            session()->setFlashdata('error', 'Post not found');
            return redirect()->to(base_url());
        }
        
        return view('header') . view('edit_post', $data) . view('footer');
    }


    public function create()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => 'required|max_length[30]',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('header') . view('create') . view('footer');
        }

        $id = uniqid('item', true);

        $file = $this->request->getFile('image1');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = str_replace('.', '_', $id) . '.' . $file->getExtension();
            $file->move('./upload/post', $newName);

            $this->model->createPost($id, $newName);
            return redirect()->to(base_url());
        } else {
            $this->session->setFlashdata('error', $file->getErrorString());
            return redirect()->to('welcome/index');
        }
    }

    // Updated method for handling the form update
    // public function update($id)
    // {
    //     $post = (object) $this->model->readPost($id);
    
    //     if (!$post) {
    //         session()->setFlashdata('error', 'Post not found');
    //         return redirect()->to(base_url());
    //     }
        
    //     // Get form data
    //     $data = [
    //         'name' => $this->request->getPost('name'),
    //         'description' => $this->request->getPost('description')
    //     ];
        
    //     // Handle file upload if needed
    //     $file = $this->request->getFile('userfile');
    //     if ($file && $file->isValid() && !$file->hasMoved()) {
    //         $newName = $file->getRandomName();
    //         $file->move(FCPATH . 'upload/post/', $newName);
            
    //         // Delete old file if it exists
    //         if (!empty($post->filename)) {
    //             if (file_exists('./upload/post/' . $post->filename)) {
    //                 unlink('./upload/post/' . $post->filename);
    //             }
    //         }
            
    //         $data['filename'] = $newName;
    //     }
        
    //     // Update in database
    //     $updated = $this->model->updatePost($id, $data);
        
    //     if ($updated) {
    //         session()->setFlashdata('success', 'Post updated successfully');
    //     } else {
    //         session()->setFlashdata('error', 'Failed to update post');
    //     }
        
    //     return redirect()->to(base_url());
    // }

    public function update($id)
    {
        $post = (object) $this->model->readPost($id);

        if (!$post) {
            session()->setFlashdata('error', 'Post not found');
            return redirect()->to(base_url());
        }

        // Ambil semua data dari form
        $data = $this->request->getPost();

        // Handle file upload jika ada file baru
        $file = $this->request->getFile('userfile');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'upload/post/', $newName);

            // Delete old file if it exists
            if (!empty($post->filename)) {
                if (file_exists('./upload/post/' . $post->filename)) {
                    unlink('./upload/post/' . $post->filename);
                }
            }

            // Tambahkan atau update nama file ke dalam array $data
            $data['filename'] = $newName;
        }
        // Update data di database
        $updated = $this->model->updatePost($id, $data);

        if ($updated) {
            session()->setFlashdata('success', 'Post updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update post');
        }

        return redirect()->to(base_url());
    }


    public function delete($id)
    {
        // For complex IDs, it's important to decode if needed
        $id = urldecode($id);
        
        $post = $this->model->readPost($id);
        
        if (!$post) {
            session()->setFlashdata('error', 'Post not found');
            return redirect()->to(base_url());
        }
        
        $deleted = $this->model->deletePost($id);
        
        if ($deleted) {
            // Delete file if exists
            if (!empty($post->filename) && file_exists('./upload/post/' . $post->filename)) {
                unlink('./upload/post/' . $post->filename);
            }
            
            session()->setFlashdata('success', 'Post deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete post');
        }
        
        return redirect()->to(base_url());
    }



    public function deleteAll()
    {
        $this->model->deleteAllPosts();

        $files = glob('./upload/post/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        return redirect()->to(base_url());
    }
}
