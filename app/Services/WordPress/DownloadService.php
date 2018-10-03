<?php

namespace App\Services\WordPress;

class DownloadService extends \App\Services\WordPress\BaseService
{
    protected $path;

    protected $file_name;

    public function setDownloadPath($path)
    {
        $upload_url  = $this->getDomain() . '/wp-content/uploads/';
        $upload_path = str_replace($upload_url, 'app/public/', $path);
        $this->path  = storage_path($upload_path);

        if (! file_exists(dirname($this->path))) {
            mkdir(dirname($this->path), 0755, true);
        }

        return $this;
    }

    public function setFileName($file_name)
    {
        $this->file_name = $file_name;

        return $this;
    }

    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * Handle Request.
     */
    public function handle()
    {
        return $this->downloadFile();
    }

    private function downloadFile()
    {
        $file_path = fopen($this->path, 'w+');
        $client    = new \GuzzleHttp\Client();
        $response  = $client->get(
            $this->getUri(), [
                'save_to' => $file_path,
            ]
        );

        return [
            'response_code' => $response->getStatusCode(),
            'name'          => $this->getFileName(),
        ];
    }
}
