<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cv;
use App\EmailTemp;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("frontend/home");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        if ($request->hasFile('file')) {
                //đường dẫn lưu file
            $path = "public/uploads/cv";
            $file = $request->file('file');
            $format = false;
            $IMGextensions = array('doc', 'docx', 'pdf', 'xls', 'xlsx');
            // Xác thực tải lên thành công  
            if ($file->isValid()) {
                $fileName = time() . '-' . str_replace(" ","",$file->getClientOriginalName());
                $extension = $file->getClientOriginalExtension();
                $linkcv = $path.'/'.$fileName;
                if(!in_array($extension,$IMGextensions)){
                    $format = true;
                }else{
                    $store = Storage::putFileAs($path , $file , $fileName . '.' . $extension);
                    if ($store) {
                        $cva = new Cv;
                        $cva->job   =   $request->job_function;
                        $cva->name = $request->name; 
                        $cva->birthday = $request->birthday;
                        $cva->email = $request->email; 
                        $cva->phone = $request->number_phone;
                        $cva->exp = $request->year_of_experience;
                        $cva->description = $request->description;   
                        $cva->salary = $request->salary;        
                        $cva->source = $request->ref;    
                        $cva->cv  =  $linkcv;
                        $cva->save();
                        // $name = $request->name;
                        $info = [
                            'title' =>  EmailTemp::first()->title,
                            'name'  => $request->name,
                            'email' => $request->email,
                            'job'   => $request->job_function,
                            'birthday' => $request->birthday,
                            'phone' => $request->number_phone,
                            'exp'   => $request->year_of_experience,
                            'description' => $request->description,  
                            'salary' => $request->salary,
                            'source' => $request->ref,
                            'body'  => EmailTemp::first()->content,
                        ];
                        \Mail::to($request->email)->send(new \App\Mail\EmailTemplate($info));
                        return redirect('/')->with('status', 'Nộp CV thành công!');
                    }
                }
            }
            if ($format==true) {
                return response()->json([
                        'type'      => 'error',
                        'title'     => 'Thất bại!',
                        'content'   => "Không thể upload file khác định dạng 'doc', 'docx', 'pdf', 'xls', 'xlsx'!!",
                    ]);
            }
        }else{
            return redirect('/')->with('statusFail', 'Nộp CV thất bại!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
