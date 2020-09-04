<?php

namespace App;

use App\Type;
use App\Domaine;
use App\Faculty;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'author', 'document', 'comment',
    ];

    protected $guarded = [
        'created_at' , 'updated_at', 'deleted_at',
    ];

    /**
     * Return the document which this comment concern
     */
    public function getDocument() {
        return $this->belongsTo('App\Document', 'document', 'id');
    }

    /**
     * Return the author of the comment
     */
    public function getAuthor() {
        return $this->belongsTo('App\User', 'author', 'id');
    }
}
