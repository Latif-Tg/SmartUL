<?php

namespace App;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Faculty extends Authenticatable
{
    //
    use SoftDeletes;
    use Notifiable;
    
    protected $fillable = [
        'title', 'password', 'isRoot', 'register_fac', 'email','university','adresse','isValid',
    ];

    protected $guarded = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * return the documents published by the faculty
     *
     * @author latif55 <shabanabdoulatif@gmail.com>
     * @return void
     */
    public function documentsPublishByFaculty() {
        return $this->hasMany('App\Document');
    }
}
