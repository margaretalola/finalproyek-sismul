<?php

namespace App\Models;

use CodeIgniter\Model;

class M_welcome extends Model
{
    protected $table = 'post';            // Nama tabel di database
    protected $primaryKey = 'id';         // Primary key tabel
    protected $allowedFields = ['id', 'name', 'description', 'filename'];  // Kolom yang bisa diisi otomatis

    public function createPost($id, $filename)
    {
        $data = [
            'id'          => $id,
            'name'        => request()->getPost('name'),
            'description' => request()->getPost('description'),
            'filename'    => $filename
        ];

        return $this->insert($data);
    }

    public function readPost($id = null)
    {
        if ($id === null) {
            return $this->db->table('post')->get()->getResultArray();
        } else {
            // Return specific post as array
            return $this->db->table('post')->where('id', $id)->get()->getRowArray(); 
            return ($query->getNumRows() > 0) ? $query->getRowArray() : null;
        }
    }



    public function updatePost($id)
    {
        $request = \Config\Services::request();
        
        $data = [
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
        ];
        
        $this->db->table('post')
            ->where('id', $id)
            ->update($data);
            
        return true;
    }

    public function deletePost($id)
    {
        try {
            // For string IDs, we don't cast to int
            $result = $this->db->table('post')
                            ->where('id', $id)
                            ->delete();
                            
            return ($this->db->affectedRows() > 0);
        } catch (\Exception $e) {
            log_message('error', 'Delete error: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteAllPosts()
    {
        return $this->builder()->truncate();  // Mengosongkan tabel
    }
}
