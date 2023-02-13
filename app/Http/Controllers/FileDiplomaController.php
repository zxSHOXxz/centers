<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\fileDiploma;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class FileDiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFile($id , Request $request)
    {
        //
        // $files = fileDiploma::where('diploma_id', $id)->orderBy('created_at', 'desc')->paginate(5);

        $files=fileDiploma::where('diploma_id', $id)->orderBy('id','desc');
        // if ($request->get('search')) {
        //     $moduleIndex = fileDiploma::where('created_at', 'like', '%' . $request->search . '%');
        // }

        if ($request->get('fileName')) {
            $files = fileDiploma::where('fileName', 'like', '%' . $request->fileName . '%');
        }
        if ($request->get('created_at')) {
            $files = fileDiploma::where('created_at', 'like', '%' . $request->created_at . '%');
        }

        $files = $files->paginate(10);
        $this->authorize('viewAny',fileDiploma::class);
        return response()->view('dashboard.file-diploma.index', compact('files','id'));
    }

    public function createFile($id)
    {
        $diplomas = Diploma::all();
        $this->authorize('create',fileDiploma::class);

        return response()->view('dashboard.file-diploma.create', compact('id' , 'diplomas'));
    }

    public function download()
    {


       $file = fileDiploma::all();
        return ("{{ asset('storage/files/diploma'. $file->file)");
    }
    public function index(Request $request)
    {
        $files=fileDiploma::orderBy('id','desc');
        if ($request->get('search')) {
            $moduleIndex = fileDiploma::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('fileName')) {
            $files = fileDiploma::where('fileName', 'like', '%' . $request->fileName . '%');
        }
        if ($request->get('created_at')) {
            $files = fileDiploma::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        if ($request->status != null) {
            $files = fileDiploma::where('status', $request->status);
        }
        $files = $files->paginate(10);
        $this->authorize('viewAny',fileDiploma::class);

        return response()->view('dashboard.file-diploma.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',fileDiploma::class);

        return response()->view('dashboard.file-diploma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(),[
            // 'outlienes' => 'string|min:3|max:20',
            // 'materials' => 'string',

        ]
    );

        if(!$validator->fails()){
        $files = new fileDiploma();
        $files->fileName = $request->get('fileName');
        // $files->materials = $request->get('materials');
        if (request()->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time() . 'file.' . $file->getClientOriginalExtension();

            $file->move('storage/files/diploma', $fileName);

            $files->file = $fileName;
            }

        $files->diploma_id = $request->get('diploma_id');

        $isSaved = $files->save();

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الملف بنجاح'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية الاضافة الملف'] , 400);
        }
    }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files=fileDiploma::findOrFail($id);
        $diplomas = Diploma::all();
        $this->authorize('update',fileDiploma::class);

        return response()->view('dashboard.file-diploma.edit',compact('files' , 'id' , 'diplomas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator($request->all(),[

        ]
    );

        if(!$validator->fails()){
        $fileDiploma = fileDiploma::findOrFail($id);
        $fileDiploma->fileName = $request->get('fileName');

        if (request()->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time() . 'file.' . $file->getClientOriginalExtension();

            $file->move('storage/files/cources', $fileName);

            $fileDiploma->file = $fileName;
            }


        $isSaved = $fileDiploma->save();
        return ['redirect'=>route('diplomas.index')];

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الملف بنجاح'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية إضافة الملف'] , 400);
        }
    }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files= fileDiploma::destroy($id);
        $this->authorize('delete',fileDiploma::class);

        return response()->json(['icon' => 'success' , 'title' => $files ? 'تم حذف الملف بنجاح' : ' فشلت عملة حذف الملف'] , $files ? 200 : 400);

    }
}
