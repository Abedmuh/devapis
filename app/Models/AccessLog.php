<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class AccessLog extends Model
{
    use HasFactory;
    protected $table = 'access_log';
    public $timestamps = false;

    public function scopeFilter($query, Request $filters) {
      if ($filters['search']) {
        return $query->where($filters['kategori'], 'like', $filters['search'])
        ->get();
      } else {
        $query->get();
      }
    }
    public function scopeLogList($query,array $filters) {
      if ($filters) {
        return $query->where($filters['kategori'], 'like', $filters['search'])
        ->get();
      } else {
        $query->get();
      }
    }
}
