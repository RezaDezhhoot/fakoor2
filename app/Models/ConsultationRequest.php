<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class ConsultationRequest extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    protected $casts = [
        'checked' => 'boolean',
    ];

    protected array $searchAbleColumns = ['full_name', 'phone', 'email', 'description'];

    public function checkedLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->checked ? 'بررسی شده' : 'بررسی نشده'
        );
    }

    public function date(): Attribute
    {
        return Attribute::make(
            get: fn() => Jalalian::forge($this->created_at)->format('%A, %d %B %Y')
        );
    }
}
