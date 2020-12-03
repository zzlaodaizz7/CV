<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::where('talenpools_id', 0)->get();
        return view('backend.job', compact('job'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        if (!$request->ajax()) {
            return response()->json([
                'type' => 'error',
                'content' => "Have a error"
            ]);
        }

        if ($request->namecategory) {
            $a = new Job;
            $a->name = $request->namecategory;
            $a->save();
            return response()->json([
                'type' => 'success',
                'content' => "Thêm thành công"
            ]);
        } else {
            Job::create($request->all());
            return response()->json([
                'type' => 'success',
                'content' => "Thêm thành công"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        //return $request;
        if (!$request->ajax()) return response()->json([
            'type' => 'error',
            'content' => 'Have a error'
        ]);
        if ($request->cate) {
            Job::find($id)->update($request->all());
            return response()->json([
                'type' => 'success',
                'content' => "Thêm thành công"
            ]);
        } else {
            Job::find($id)->update($request->all());
            return response()->json([
                'type' => 'success',
                'content' => "Thêm thành công"
            ]);
        }
    }


    public function destroy(Request $request, $id)
    {
        if (!$request->ajax()) return response()->json([
            'type' => 'error',
            'content' => "Thêm thành công"
        ]);

        Job::find($request->id)->delete();
        return response()->json([
            'type' => 'success',
            'content' => "Thêm thành công"
        ]);
    }
}
