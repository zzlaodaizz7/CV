<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
use App\Cv;
use Carbon\Carbon;
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
        $job = Job::where([['talenpools_id','!=',0],['status','on']])->orderBy("updated_at","DESC")->with("getjob")->paginate(5);
        $new = Cv::where("status",'default')->whereDate('created_at',">=",Carbon::now()->subDays(7))->orderBy('created_at','desc')->paginate(5);
//        $job = Job::where([['talenpools_id','!=',0],['status','on']])->paginate(3);
        $new = Cv::where("status",'default')->whereDate('created_at',">=",Carbon::now()->subDays(7))->orderBy('created_at','desc')->take(19)->get();
        $today = count(Cv::where('status','default')->whereDate('created_at',Carbon::today()->toDateString())->get());
        $day7 = count(Cv::where('status','default')->whereDate('created_at',">=",Carbon::now()->subDays(7))->get());
        $day30 = count(Cv::where('status','default')->whereDate('created_at',">=",Carbon::now()->subDays(30))->get());
        return view('backend.home',compact('job','new','day30','day7','today'));
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
