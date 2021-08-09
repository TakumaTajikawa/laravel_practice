<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
    protected $table = 'peoples';
    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'email' => 'email',
        'age' => 'integer',
    ];

    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getNameAndIdAttribute()
    {
        return $this->name . '[id=' . $this->id . ']';
    }

    public function getNameAndMailAttribute()
    {
        return $this->name . '(' . $this->email . ')';
    }

    public function getNameAndAgeAttribute()
    {
        return $this->name . '(' . $this->age . ')';
    }

    public function getAllDataAttribute()
    {
        return $this->name . '(' . $this->age . ')' . ' [' . $this->email . ']';
    }

    // public function getNameAttribute($name)
    // {
    //     return strtoupper($name);
    // }

    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setAllDataAttribute(array $value): void
    {
        $this->attributes['name'] = $value[0];
        $this->attributes['email'] = $value[1];
        $this->attributes['age'] = $value[2];
    }

}

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
