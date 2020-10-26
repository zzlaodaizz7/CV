<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cv;
use App\Tag;
use App\Tag_Cv;
use App\EmailTemp;
use App\Job;
use DB;
use Validator;
class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tags = Tag::all();
        if ($request->keyword){
            $data = Cv::where('status','=','fail')->where("name","like","%".$request->keyword."%")->orwhere("email","like","%".$request->keyword."%")->orderBy("created_at","ASC")->paginate(40);
//            return $data;
            return view('backend.cv',compact('data','tags'));
        }

        $data = Cv::where('status','=','default')->orderBy("created_at","ASC")->paginate(40);
        return view('backend.cv',compact('data','tags'));

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
        if ($request->ajax()) {
            foreach ($request->tag as $value) {
            $cv_tag = new Tag_Cv;
            $cv_tag->tags_id    = $value;
            $cv_tag->cvs_id     = $request->idcv;
            $cv_tag->tags_name  = Tag::find($value)->name;
            $cv_tag->save();
            }
            return response()->json([
                'type'      => 'success',
                'title'     => 'Thất bại!',
                'content'   => "Thành công"
            ]);
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
    public function updateStatus(Request $request){

        if($request->timeinvi){
            $validator = Validator::make($request->all(), [
                'people'            => 'required',
                'website'           => 'required',
                'descrip'       => 'required',
                'timeinvi'        => 'required',
                'location'          => 'required',
            ],
            [
                'people.required'               => 'Chưa chọn người đón tiếp',
                'website.required'              => 'Chưa nhập website',
                'descrip.required'          => 'Chưa nhập mô tả',
                'timeinvi.required'           => 'Chưa nhập thời gian mời',
                'location.required'             => 'Chưa chọn địa điểm',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'content' => $validator->errors()->all()[0],
                ],402);
            }
            $cv = Cv::find($request->id);
            $info = [
                    'title'         => "APPOTA - Thư mời phỏng vấn vị trí ".$request->job,
                    'timeinvite'    => $request->timeinvi,
                    'location'      => $request->location,
                    'people'        => $request->people,
                    'website'       => $request->website,
                    'description'   => $request->descrip,
                    'job'           => $request->job,
                    'name'          => $request->name,
                ];
            $cv->timeinvite     =   $request->timeinvi;
            $cv->status         =   $request->status;
            $cv->save();
            \Mail::to($request->email)->send(new \App\Mail\EmailTemplate($info));
            return response()->json([
                'type'      => 'success',
                'content'   => "Đã gửi email và đổi status thành Invite"
            ]);
        }else if($request->fail){
            $cv = Cv::find($request->id);
            $info = [
                    'name'          => $request->name,
                ];
            $cv->status         =   $request->status;
            $cv->save();
            \Mail::to($request->email)->send(new \App\Mail\Fail($info));
            return response()->json([
                'type'      => 'success',
                'content'   => "Đã gửi email và đổi status thành Fail"
            ]);

        }else{
            $cv = Cv::find($request->id);
            $cv->status    = $request->status;
            $cv->save();
            return response()->json([
                'type'      => 'success',
                'content'   => "Update thành công thành ". $request->status ." cho ". $cv->name,
            ]);
        }

    }
    public function deleteTag(Request $request){
        Tag_Cv::find($request->id)->delete();
        return response()->json([
            'type'      => 'success',
            'title'     => 'Thất bại!',
            'content'   => "Xóa thành công"
        ]);
    }
}
