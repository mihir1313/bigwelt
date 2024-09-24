<?php

namespace App\Libraries;

class FileUploader
{
    public function uploadFiles($files, $uploadDir)
    {
        $results = [];

        foreach ($files['files'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move($uploadDir);

                $results[] = [
                    'name' => $file->getName(),
                    'path' => $uploadDir . $file->getName(),
                    'status' => 'Uploaded successfully',
                ];
            } else {
                // Handle error
                $results[] = [
                    'name' => $file->getName(),
                    'status' => 'Failed to upload',
                    'error' => $file->getErrorString() . '(' . $file->getError() . ')',
                ];
            }
        }

        return $results;
    }
}
