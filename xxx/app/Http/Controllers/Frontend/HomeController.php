<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cv;
use App\EmailTemp;
use App\Job;
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
        $job = Job::where([['talenpools_id',"=",0],['status','on']])->get();
        return view("frontend/home",compact('job'));
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
                $linkcv = 'uploads/cv/'.$fileName;
                if(!in_array($extension,$IMGextensions)){
                    $format = true;
                }else{
                    $store = Storage::putFileAs($path , $file , $fileName);
                    if ($store) {
                        $cva = new Cv;
                        $cva->job       =   $request->job_function;
                        $cva->name      = $request->name;
                        $cva->birthday  = $request->birthday;
                        $cva->email     = $request->email;
                        $cva->phone     = $request->number_phone;
                        $cva->exp       = $request->year_of_experience;
                        $cva->description = $request->description;
                        $cva->salary    = $request->salary;
                        $cva->source    = $request->ref;
                        $cva->cv        =  $linkcv;
                        $cva->save();
                        $id = Cv::latest()->first()->id;
                        $a = Cv::find($id);
                        $a->stt = $id*1000;
                        $a->save();
                        $info = [
                            'name'  => $request->name,
                        ];
                        \Mail::to($request->email)->send(new \App\Mail\Tycv($info));
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
