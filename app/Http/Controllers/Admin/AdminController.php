<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Type;
use Hashids\Hashids;
use App\Domaine;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function home() {
        $name = Auth::user()->title;
        alert()->success("Dashboard <span class='text-danger'>$name</span>")->toHtml();
        return view('admin.home');
        #return redirect()->route('welcome_page')->withInfo('Dashboard En développement...');
    }
    
    public function index() {
        $documents = Document::where('publisherRole', "faculty")
        ->where('idPublisher', Auth::id())
        ->get();
        return view('admin.pages.documents.publish',compact('documents'));
    }
    //
    public function create() {
        $types = Type::all();
        $domaines = Domaine::all();
        $document = new Document();
        #alert()->info("**Les champs \"Directeurs mémoire/thèse\" et \"Année Scolaire\" concernent juste les mémoires, thèse ou autre documents de ce genre");
        return view('admin.pages.documents.document',compact('document','types','domaines'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required','string'],
            'author' => ['required', 'string'],
            'summary' => ['nullable', 'string'],
            'directors' => ['nullable', 'string'],
            'year' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'domaine' => ['required', 'numeric'],
            'isPrivate' => ['required', 'boolean'],
            'file' => ['required', 'mimes:pdf,doc,docx'],
        ]);

        if ($validator->fails()) {
            return back()->withError($validator->errors()->all()[0])->withInput();
        }

        $document = new Document();
        $document->title = $request->title;
        $document->author = $request->author;
        $document->summary = $request->summary;
        $document->directors = $request->director;
        $document->year = $request->year;
        $document->type = $request->type;
        $document->domaine = $request->domaine;
        $document->idPublisher = Auth::id();
        $document->publisherRole = "faculty";
        $document->isPrivate = $request->isPrivate;
        
        if($request->file != null) {
            $extension = $request->file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $request->file->move('storage/documents/',$filename);
            $document->doc_path = 'documents/'.$filename;
        }

        $type = Type::find($request->type);
        $domaine = Domaine::find($request->domaine);
        #Génération de la valeur du keyword
        $document->keyword = ''.$request->title.'_'.$type->title.'_'.$domaine->title.'_'.$request->author;
        #Sauvegarde
        $document->save();
        
        return redirect()->route('document.admin.index')->withSuccess("Enregistrement du nouveau document bien effectué");
    }

    public function show($hashedId) {
        $hash = new Hashids('',6);
        $id = $hash->decode($hashedId)[0];
        $document = Document::findOrFail($id);
        return view('admin.pages.documents.show_document',compact('document'));
    }

    public function edit($hashedId) {
        $hash = new Hashids('',6);
        $id = $hash->decode($hashedId)[0];
        $document = Document::findOrFail($id);
        $types = Type::all();
        $domaines = Domaine::all();
        return view('admin.pages.documents.edit_document',compact('document','types','domaines'));
    }

    public function update($hashedId, Request $request) {
        $hash = new Hashids('',6);
        $id = $hash->decode($hashedId)[0];
        $document = Document::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => ['required','string'],
            'author' => ['required', 'string'],
            'summary' => ['nullable', 'string'],
            'directors' => ['nullable', 'string'],
            'year' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'domaine' => ['required', 'numeric'],
            'isPrivate' => ['nullable', 'boolean'],
            'file' => ['nullable', 'mimes:pdf,doc,docx'],
        ]);

        if ($validator->fails()) {
            return back()->withError($validator->errors()->all()[0])->withInput();
        }

        $document->title = $request->title;
        $document->author = $request->author;
        $document->summary = $request->summary;
        $document->directors = $request->director;
        $document->year = $request->year;
        $document->type = $request->type;
        $document->domaine = $request->domaine;
        $document->idPublisher = Auth::id();
        $document->publisherRole = "faculty";
        if($request->isPrivate  != null) {
            $document->isPrivate = $request->isPrivate;
        }
        
        if($request->file != null) {
            $extension = $request->file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $request->file->move('storage/documents/',$filename);
            $document->doc_path = 'documents/'.$filename;
        }

        $type = Type::find($request->type);
        $domaine = Domaine::find($request->domaine);
        #Génération de la valeur du keyword
        $document->keyword = ''.$request->title.'_'.$type->title.'_'.$domaine->title.'_'.$request->author;
        #Sauvegarde
        $document->save();
        return redirect()->route('document.admin.index')->withSuccess("Mise à jour de la publication bien effectuée");
    }

    public function destroy($hashedId) {
        $hash = new Hashids('',6);
        $id = $hash->decode($hashedId)[0];
        $document = Document::findOrFail($id);

        Storage::delete($document->doc_path);
        $document->delete();
        return redirect()->route('document.admin.index')->withSuccess("Suppression de la publication");
    }
    
    public function getAllDomaines() {
        $infos = Domaine::all();
        return view('pages.infos',compact('infos'));
    }

    public function getAllTypes() {
        $infos = Type::all();
        return view('pages.infos',compact('infos'));
    }

    /**
     * Store a domaine
     *
     * @return void
     */
    public function storeDomaine(Request $request) 
    {
        
        
        $nbr = 0;
        /**Validation step */
        $validator = Validator::make($request->all(), [
            'title' => ['required','max:100','min:2'],
        ]);
        
        if ($validator->fails()) {
            return back()->withError($validator->errors()->all()[0])->withInput();
        }
        /**Verify domaine existance step */
        $nbr = Domaine::where('title',$request->title)->count();

        if($nbr == 0)
        {
            /**Creation domaine */
            $domaine = new Domaine();
            $domaine->title = $request->title;
            $domaine->save();
            return back()->withSuccess('Nouveau domaine enrégistré');
        }
        /**Echec création */
        else
        {
            return back()->withWarning('Ce domaine existe déjà');
        }
    }
    /**
     * Store a type
     *
     * @return void
     */
    public function storeType(Request $request) 
    {
        
        $nbr = 0;
        /**Validation step */
        $validator = Validator::make($request->all(), [
            'title' => ['required','max:100','min:2'],
        ]);
        
        if ($validator->fails()) {
            return back()->withError($validator->errors()->all()[0])->withInput();
        }
        /**Verify type existance step */
        $nbr = Type::where('title',$request->title)->count();
        if($nbr == 0){
            /**Creation type */
            $type = new Type();
            $type->title = $request->title;
            $type->save();
            return back()->withSuccess('Nouveau type enrégistré');
        }
        else
        {
            return back()->withWarning('Ce type existe déjà');
        }
    }

    public static function NumberOfDocumentsStore() {
        $numberDoc = Document::where('idPublisher',Auth::id())       
        ->count();
        return $numberDoc;
    }

    public static function NumberOfDomainesStore() {
        $numberDoc = Domaine::all()
        ->count();
        return $numberDoc;
    }

    public static function NumberOfTypesStore() {
        $numberDoc = Type::all()
        ->count();
        return $numberDoc;
    }
}
