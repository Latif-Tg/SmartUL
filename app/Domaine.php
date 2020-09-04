<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domaine extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title',
    ];

    protected $guarded = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Return the documents for a domain
     *
     * @return void
     */
    public function getDocumentsForDomaine() {
        return $this->hasMany('App\Document');
    }
}
