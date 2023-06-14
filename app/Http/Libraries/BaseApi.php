<?php

namespace App\Http\Libraries;


use Illuminate\Support\Facades\Http;


class BaseApi
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://localhost:3000';
    }

    private function client()
    {
        return Http::baseUrl($this->baseUrl);
    }

    public function index(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function dashboard(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function create(String $endpoint, Array $data)
    {
        return $this->client()->post($endpoint, $data);
    }

    public function show(String $endpoint, Array $data)
    {
        return $this->client()->get($endpoint, $data);
    }

    public function update(String $endpoint, Array $data)
    {
        return $this->client()->post($endpoint, $data);
    }

    public function destroy(String $endpoint, Array $data)
    {
        return $this->client()->post($endpoint, $data);
    }

    public function softDelete(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function restore(String $endpoint, Array $data)
    {
        return $this->client()->get($endpoint, $data);
    }

    public function hardDelete(String $endpoint, Array $data)
    {
        return $this->client()->post($endpoint, $data);
    }
}
