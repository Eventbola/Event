<?php
namespace app;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 class Item extends Model
 {
     public $fillable = ['title','description'];
 }