<?php

namespace App\Services;

use App\Services\MyServiceInterface;

class MyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['hello', 'welcome', 'Bye!'];

    public function __construct(int $id = -1)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = "select id:" . $id . ', data:"' . $this->data[$id] . '"';
        }
    }

    public function setId(int $id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = "select id:" . $id . ', data:"' . $this->data[$id] . '"';
        }
    }

    public function say(): string
    {
        return $this->msg;
    }

    public function data(int $id): string
    {
        return $this->data[$id];
    }

    public function allData(): array
    {
        return $this->data;
    }
}