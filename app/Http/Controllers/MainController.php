<?php

namespace App\Http\Controllers;
use App\Type;
use App\Domaine;
use App\Document;
use App\Comment;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function __construct() {
    }

    public function getHome() {
        return view('pages.index');
    }

    /**
     * Choose an option of login
     *
     * @return void
     */
    public static function getLoginChoice() {
        //return back()->withQuestion('Login check');->showConfirmButton("<a href=\"/professionnal/login\">Professional</a>",'yellow')->toHtml()
        alert()
        ->question('Vous disposez d\'un compte: ',
        '<a class="btn btn-dark mr-1" href="/login">Etudiant</a>
        <a class="btn btn-warning mr-1" href="/faculty/login">Etablissement</a>
        <a class="btn btn-danger" href="/professionnal/login">Enseignant</a>')
        ->toHtml()->showCloseButton();
        return back();
    }

    /**
     * Contact us
     *
     * @return void
     */
    public function contact_us() {
        //Alert::success('Success Title', 'Success Message');
        return back()->withError('En cours de dévéloppement...');
        // example:
        // example:
        //alert()->success('Post Created', '<strong>Successfully</strong>')->toHtml();
        //return back();
        //return back()->withHtml('<a href="{{route(\'login\'}}">Etudiant ?</a>');
    }
    /**
     * Users navigations routes
     */
    public function getAllDocuments() {
        $documents = Document::paginate(5);
        $types = Type::limit(3)->get();
        $domaines = Domaine::limit(3)->get();
        $years = DB::table('documents')
            ->select('year')
            ->distinct()
            ->limit(5)
            ->get();
        return view('pages.documents',compact('documents','types','domaines','years'));
    }

    public function getMoreType() {
        $moretypes = Type::all();
        return response($moretypes);
    }

    public function getMoreDomaine() {
        $moredomaines = Domaine::all();
        return response($moredomaines);
    }

    public function getDocByCriteria($lib_typ, $lib_dom, $year) {
        if($lib_typ != "Type" and $lib_dom != "Domaine" and $year != "Année") {
            
            $type = Type::where('title','LIKE', $lib_typ)->first();
            $domaine = Domaine::where('title','LIKE',$lib_dom)->first();
            $documents = Document::where('type',$type->id)
            ->where('domaine', $domaine->id)
            ->where('year','<=',$year)
            ->get();
            
            return response($documents);
        }
        
        $type = Type::where('title','LIKE', $lib_typ)->first();
        $domaine = Domaine::where('title','LIKE',$lib_dom)->first();

        if($year != "Année") {
            if($type == null and $domaine == null) {
                $documents = Document::where('year','<=', $year)->get();
                $count = $documents->count();
                return response($documents);
            }
            elseif($type != null and $domaine == null) {
                $documents = Document::where('type',$type->id)
                ->where('year','<=',$year)
                ->get();
                
                return response($documents);
            }
            elseif($type == null and $domaine != null) {
                $documents = Document::where('domaine', $domaine->id)
                ->where('year','<=',$year)
                ->get();
                
                return response($documents);
            }
            else {
                $documents = Document::where('type',$type->id)
                ->where('domaine', $domaine->id)
                ->where('year','<=',$year)
                ->get();
                
                return response($documents);
            }
        }
        else {
            if($type == null and $domaine == null) {
                $documents = Document::paginate(10);
                return response($documents);
            }
            elseif($type != null and $domaine == null) {
                $documents = Document::where('type',$type->id)
                ->get();
                
                return response($documents);
            }
            elseif($type == null and $domaine != null) {
                $documents = Document::where('domaine', $domaine->id)
                ->get();
                
                return response($documents);
            }
            else {
                $documents = Document::where('type',$type->id)
                ->where('domaine', $domaine->id)
                ->get();
                
                return response($documents);
            }
        }
        
    }

    public function getDocumentDetails($documentKey) {
        /*
        $hash = new Hashids('',6);
        $id = $hash->decode($documentKey)[0];*/
        $document = Document::findOrFail($documentKey);
        $comments = Comment::where('document',$documentKey)->get();
        $document->views++;
        $document->save();
        return view('pages.documentDetails',compact('document','comments'));
    }

   
    /*
    public function memories() {
        $memoires = Document::where('type_id','1')->get();
        return view('pages.memories_consult',compact('memoires'));
    }

    public function theses() {
        $theses = Document::where('type_id','2')->get();
        return view('pages.theses_consult',compact('theses'));
    }

    public function others() {
        $cpt = 0;
        $all_types = Type::where('id','>','2')->get();
        foreach ($all_types as $type) {
            if(Document::where('type_id',$type->id)->count() != 0 ) 
            {
                $others[$cpt] = Document::where('type_id',$type->id)->get();
                $types[$cpt] = Type::where('id',$type->id)->get()[0];
                $cpt++;
            }
        }
        return view('pages.others_consult',compact('others','types'));
    }

    public function find() {
        request()->validate([
            "search" => "required"
        ]);
        $search = request('search');
        $liste = Document::where('keyword','LIKE',"%$search%")->orderBy('created_at','desc')->get();
        return view('pages.research',compact('liste','search'));
    }
    */
}