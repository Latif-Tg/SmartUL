<?php

namespace App;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Enseignant extends Authenticatable
{
    //
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'register_num','university','isValid',
    ];

    protected $guarded = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * return all the document the teacher has published
     *
     * @return void
     */
    public function documentsPublishByTeacher() {
        return $this->hasMany('App\Document');
    }
}
