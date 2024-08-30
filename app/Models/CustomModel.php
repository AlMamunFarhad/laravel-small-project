<?php

namespace App\Models;

use Database\Factories\CustomFactory;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'custom_model';

    protected $primaryKey = 'custom_id';

    protected static function newFactory(): Factory
    {

        return CustomFactory::new();
    } 



}
