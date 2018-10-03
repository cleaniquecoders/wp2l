<?php

namespace App\Services\WordPress;

class ImportService extends \App\Services\WordPress\BaseService
{
    /**
     * The current.
     *
     * @var
     */
    protected $current = 1;

    /**
     * The total_pages.
     *
     * @var
     */
    protected $total_pages;

    /**
     * Handle Request.
     */
    public function handle()
    {
        $message = $this->getUri() . ' page - ' . $this->current;
        echo title_case($message) . PHP_EOL;

        if (0 == $this->current % 5) {
            sleep(3); // sleep
        }

        $client  = $this->getClient();
        $request = $this->getRequest($this->current);
        $promise = $client->sendAsync($request)->then(function ($response) {
            $this->total_pages = $response->getHeader('X-WP-TotalPages')[0];
            $this->total_pages = ((int) $this->total_pages);
            $this->store($this->uri, $response->getBody());
        }, function ($exception) {
            logger()->error($exception->getMessage());
        });
        $promise->wait();
        if ($this->current <= $this->total_pages) {
            $this->current = $this->current + 1;
            $this->handle();
        }
    }

    /**
     * Store in WP storage.
     *
     * @param string $type    Type of Resource
     * @param json   $content
     */
    public function store($type, $content)
    {
        $data = $this->prettyJson($content);
        if (! empty($data)) {
            $filename = 'wp/' . $type . '_' . \Carbon\Carbon::now()->format('YmdHis') . '.json';
            file_put_contents(storage_path($filename), $data);
        }
    }

    /**
     * Format to JSON Pretty.
     *
     * @param json $data JSON Encoded
     *
     * @return json JSON Pretty Encoded
     */
    public function prettyJson($data)
    {
        $data = json_decode($data);

        return empty($data) ? null : json_encode($data, JSON_PRETTY_PRINT);
    }
}
