<?php

namespace App;

use App\Models\Type;
use App\Models\Domaine;
use App\Models\Faculty;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title', 'type', 'domaine', 'author', 'summary', 
        'keyword', 'directors', 'views', 'year', 'id_fac','idPublisher',
        'isPrivate', 'isEnable',
    ];

    protected $guarded = [
        'created_at' , 'updated_at', 'deleted_at',
    ];

    /**
     * return the domain of the document
     * @author latif55  shabanabdoulatif@gmail.com
     *
     * @return void
     */
    public function getDomaine()
    {
        return $this->belongsTo('App\Domaine','domaine','id');
    }

    /**
     * return the type of the document
     * 
     *@author latif55 <shabanandoulatif@gmail.com>
     * @return void
     */
    public function getType() {
        return $this->belongsTo('App\Type', 'type', 'id');
    }

    /**
     * return the faculty who publish the document
     *@author latif55
     * @return void
     */
    public function faculty() {
        return $this->belongsTo('App\Faculty', 'id_fac', 'id');
    }

    /**
     * return the teacher who publish the document
     *@author latif55
     * @return void
     */
    public function enseignant() {
        return $this->belongsTo('App\Enseignant', 'idPublisher', 'id');
    }

    public function getAllComments()  {
        
    }
}
