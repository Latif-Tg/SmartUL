<?php

namespace App\Http\Controllers;

use Alert;
#use RealRashid\SweetAlert\Facades\Alert;
use Hashids\Hashids;
use App\Type;
use App\Domaine;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    /**
     * 
     * CRUD for the documents
     */
    public function index() {
        $documents = Document::all();
        return view('admin.pages.documents.publish',compact('documents'));
    }
    //
    public function create() {
        $types = Type::all();
        $domaines = Domaine::all();
        $document = new Document();
        return view('admin.pages.documents.document',compact('document','types','domaines'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required','string'],
            'author' => ['required', 'string'],
            'summary' => ['nullable', 'string'],
            'director' => ['nullable', 'string'],
            'year' => ['required', 'date'],
            'type' => ['required', 'numeric'],
            'domaine' => ['required', 'numeric'],
            'isPrivate' => ['required', 'boolean'],
            'isEnable' => ['nullable','boolean'],
            'file' => ['required', 'mimes:pdf,doc,docx'],
        ]);
        
        if ($validator->fails()) {
            return back()->withError($validator->errors()->all()[0])->withInput();
        }

        $document = new Document();
        $document->title = $request->title;
        $document->author = $request->author;
        $document->summary = $request->summary;
        $document->director = $request->director;
        $document->year = $request->year;
        $document->type = $request->type;
        $document->domaine = $request->domaine;
        $document->publisher = Auth::id();
        $document->isPrivate = $request->isPrivate;
        $document->isEnable = $request->isEnable;

        if($request->file != null) {
            $extension = $request->file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $request->file->move('storage/documents/',$filename);
            $document->doc_path = 'documents/'.$filename;
        }

        $type = Type::where('id',$_POST['type'])->get()[0]->libelle;
        $domaine = Domaine::where('id',$_POST['domaine'])->get()[0]->libelle;
        #Génération de la valeur du keyword
        $document->keyword = ''.$_POST['title'].'_'.$type.'_'.$domaine.'_'.$_POST['author'];
        #Sauvegarde
        
        $document->save();
        
        return redirect()->route('document.index')->with('sucess',"Enregistrement du nouveau document bien effectué");
    }

    public function show($hashedId) {
        $hash = new Hashids('',6);
        $id = $hash->decode($hashedId)[0];
        $document = Document::findOrFail($id);
        return view('admin.pages.documents.show_document',compact('document'));
    }

}
