<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\fileCourse;
use Illuminate\Http\Request;

class FileCourseController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function indexFile($id)
        {
            //
            $files = fileCourse::where('course_id', $id)->orderBy('created_at', 'desc')->paginate(5);
            $this->authorize('viewAny',fileCourse::class);
            return response()->view('dashboard.file-course.index', compact('files','id'));
        }

        public function createFile($id)
        {
            $cources = Course::all();
            $this->authorize('create',fileCourse::class);

            return response()->view('dashboard.file-course.create', compact('id' , 'cources'));
        }


        public function index(Request $request)
        {
            $files=fileCourse::orderBy('id','desc');
            if ($request->get('search')) {
                $moduleIndex = fileCourse::where('created_at', 'like', '%' . $request->search . '%');
            }

            if ($request->get('fileName')) {
                $files = fileCourse::where('fileName', 'like', '%' . $request->fileName . '%');
            }
            if ($request->get('created_at')) {
                $files = fileCourse::where('created_at', 'like', '%' . $request->created_at . '%');
            }
            if ($request->status != null) {
                $files = fileCourse::where('status', $request->status);
            }
            $files = $files->paginate(10);
            $this->authorize('viewAny',fileCourse::class);

            return response()->view('dashboard.file-course.index',compact('files'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $this->authorize('create',fileCourse::class);

            return response()->view('dashboard.file-course.create');
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
                'file' => ['required','mimes:pdf,docx','max:2048'],

            ]
        );

            if(!$validator->fails()){
            $files = new fileCourse();
            $files->fileName = $request->get('fileName');
            // $files->materials = $request->get('materials');
            if (request()->hasFile('file')) {

                $file = $request->file('file');

                $fileName = time() . 'file.' . $file->getClientOriginalExtension();

                $file->move('storage/files/cources', $fileName);

                $files->file = $fileName;
                }

            $files->course_id = $request->get('course_id');

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
            $files=fileCourse::findOrFail($id);
            $cources = Course::all();
            $this->authorize('update',fileCourse::class);

            return response()->view('dashboard.file-course.edit',compact('files' , 'id' , 'cources'));
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
            $files = fileCourse::findOrFail($id);
            $files->fileName = $request->get('fileName');
            if (request()->hasFile('file')) {

                $file = $request->file('file');

                $fileName = time() . 'file.' . $file->getClientOriginalExtension();

                $file->move('storage/files/cources', $fileName);

                $files->file = $fileName;
                }

            // $files->course_id = $request->get('course_id');

            $isSaved = $files->save();

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
            $files= fileCourse::destroy($id);
            $this->authorize('delete',fileCourse::class);

            return response()->json(['icon' => 'success' , 'title' => $files ? 'تم حذف الملف بنجاح' : ' فشلت عملة حذف الملف'] , $files ? 200 : 400);

        }
}
