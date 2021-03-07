<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $table = 'letter';

    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'text',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function getPhotoLinksFromText(): array
    {
        // этим получаем все ссылки
        preg_match_all('#(?:https?|ftp)://[^\s\,\;]+/[a-zA-Z0-9а-яА-Я]+.(?:jpg|jpeg|png|gif)#i', $this['text'], $matches);
        return $matches[0];
    }
}
