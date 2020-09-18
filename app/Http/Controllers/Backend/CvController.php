<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cv;
use App\Tag;
use App\Tag_Cv;
use DB;
class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        $data = Cv::where('status','!=','Fail')->groupBy(['email'])->get();
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
            $cv = Cv::find($request->id);
            $cv->timeinvite=$request->timeinvi;
            $cv->status    = $request->status;
            $cv->save();
            return response()->json([
                'type'      => 'success',
                'title'     => 'Thất bại!',
                'content'   => "Update thành công"
            ]);
        }else{
            $cv = Cv::find($request->id);
            $cv->status    = $request->status;
            $cv->save();
            return response()->json([
                'type'      => 'success',
                'title'     => 'Thất bại!',
                'content'   => "Update thành công"
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
