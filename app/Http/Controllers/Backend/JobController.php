<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $job = Job::where('talenpools_id',0)->get();
        return view('Backend/job',compact('job'));
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
            if ($request->namecategory) {
                $a = new Job;
                $a->name = $request->namecategory;
                $a->save();
                return response()->json([
                    'type'      => 'success',
                    'content'   => "Thêm thành công"
                ]);
            }else{
                Job::create($request->all());
                return response()->json([
                    'type'      => 'success',
                    'content'   => "Thêm thành công"
                ]);
            }

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
        //return $request;
        if ($request->ajax()) {
            if ($request->cate) {
                Job::find($id)->update($request->all());
                return response()->json([
                    'type'      => 'success',
                    'content'   => "Thêm thành công"
                ]);
            }else{
                Job::find($id)->update($request->all());
                return response()->json([
                    'type'      => 'success',
                    'content'   => "Thêm thành công"
                ]);
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        if ($request->ajax()) {
            Job::find($request->id)->delete();
            return response()->json([
                'type'      => 'success',
                'content'   => "Thêm thành công"
            ]);
        }

    }
}
