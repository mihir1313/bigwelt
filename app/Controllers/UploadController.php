<?php

namespace App\Controllers;

use App\Libraries\FileUploader;

class UploadController extends BaseController
{
    public function index()
    {
        return view('upload_form'); 
    }

    public function upload()
    {
        $uploadDir = WRITEPATH . 'uploads/';
    
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); 
        }
    
        $fileUploader = new FileUploader();
        $results = $fileUploader->uploadFiles($this->request->getFiles('files'), $uploadDir);
    
        if (count($results) > 0) {
            session()->setFlashdata('success', 'File Uploaded successfully. Path for file : \bigwelt-task\writable\uploads');
        } else {
            session()->setFlashdata('error', 'File upload failed. Please try again.');
        }
    
        return redirect()->to('/upload');
    }
    
    
}
