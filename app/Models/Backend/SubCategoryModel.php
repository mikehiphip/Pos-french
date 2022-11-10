<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tb_sub_category';
    public $timestamp = false;
}
