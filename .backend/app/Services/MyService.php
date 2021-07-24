<?php

namespace App\Services;

class MyService
{
    private $serial;
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['hello', 'welcome', 'Bye!'];

    public function __construct(int $id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = "select id:" . $id . ', data:"' . $this->data[$id] . '"';
        }
    }

    public function setId(int $id): void
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = "select id:" . $id . ', data:"' . $this->data[$id] . '"';
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id): string
    {
        return $this->data[$id];
    }

    public function alldata()
    {
        return $this->data;
    }
}