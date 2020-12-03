<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;
use App\Cv;
use App\Tag;
use DB;

class OverviewController extends Controller
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
        $pagemax = 0;
        $pass = count(Cv::where('status', '=', 'Pass')->get());
        $invi = count(Cv::where('status', '=', 'Invite')->get());
        $fail = count(Cv::where('status', '=', 'Fail')->get());
        $blac = count(Cv::where('status', '=', 'Blacklist')->get());
        $offe = count(Cv::where('status', '=', 'Offer')->get());
        if (isset($_GET['keyword'])){
            $datapass = Cv::where('status', '=', 'Pass')->where('name','like',"%".$_GET['keyword']."%")->orderBy('stt', "asc")->paginate(40);
            $datafail = Cv::where('status', '=', 'Fail')->where('name','like',"%".$_GET['keyword']."%")->orderBy('stt', "asc")->paginate(40);
            $datablacklist = Cv::where('status', '=', 'Blacklist')->where('name','like',"%".$_GET['keyword']."%")->orderBy('stt', "asc")->paginate(40);
            $dataoffer = Cv::where('status', '=', 'Offer')->where('name','like',"%".$_GET['keyword']."%")->orderBy('stt', "asc")->paginate(40);
            $datainvi = Cv::where('status', '=', 'Invite')->where('name','like',"%".$_GET['keyword']."%")->orderBy('stt', "asc")->paginate(40);
            return view('backend.cvdrop', compact('datapass', 'datafail', 'datablacklist', 'dataoffer', 'datainvi', 'tags'));
        }
        $data = Cv::where('status', '=', 'Pass')->orderBy('stt', "asc")->paginate(40);
        if ($pagemax < $pass) {
            $pagemax = $pass;
            $data = Cv::where('status', '=', 'Pass')->orderBy('stt', "asc")->paginate(40);
        }
        if ($pagemax < $invi) {
            $pagemax = $invi;
            $data = Cv::where('status', '=', 'Invite')->orderBy('stt', "asc")->paginate(40);
        }
        if ($pagemax < $fail) {
            $pagemax = $fail;
            $data = Cv::where('status', '=', 'Fail')->orderBy('stt', "asc")->paginate(40);
        }
        if ($pagemax < $blac) {
            $pagemax = $blac;
            $data = Cv::where('status', '=', 'Blacklist')->orderBy('stt', "asc")->paginate(40);
        }
        if ($pagemax < $offe) {
            $pagemax = $offe;
            $data = Cv::where('status', '=', 'Offer')->orderBy('stt', "asc")->paginate(40);
        }
        $datapass = Cv::where('status', '=', 'Pass')->orderBy('stt', "asc")->paginate(40);
        $datafail = Cv::where('status', '=', 'Fail')->orderBy('stt', "asc")->paginate(40);
        $datablacklist = Cv::where('status', '=', 'Blacklist')->orderBy('stt', "asc")->paginate(40);
        $dataoffer = Cv::where('status', '=', 'Offer')->orderBy('stt', "asc")->paginate(40);
        $datainvi = Cv::where('status', '=', 'Invite')->orderBy('stt', "asc")->paginate(40);
        return view('backend.cvdrop', compact('datapass', 'datafail', 'datablacklist', 'dataoffer', 'datainvi', 'tags', 'data'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $job = Job::where('name', $id)->first()->getjob;
        $tags = Tag::all();
        $pagemax = 0;
        if ($request->jobfilter) {
            $pass = count(Cv::where([['job', $request->jobfilter], ['status', "Pass"]])->get());
            $invi = count(Cv::where([['job', $request->jobfilter], ['status', "Invite"]])->get());
            $fail = count(Cv::where([['job', $request->jobfilter], ['status', "Fail"]])->get());
            $blac = count(Cv::where([['job', $request->jobfilter], ['status', "Blacklist"]])->get());
            $offe = count(Cv::where([['job', $request->jobfilter], ['status', "Offer"]])->get());
            $datapass = Cv::where([['job', $request->jobfilter], ['status', "Pass"]])->orderBy('updated_at', "desc")->paginate(40);
            $datafail = Cv::where([['job', $request->jobfilter], ['status', "Fail"]])->orderBy('updated_at', "desc")->paginate(40);
            $datablacklist = Cv::where([['job', $request->jobfilter], ['status', "Blacklist"]])->orderBy('updated_at', "desc")->paginate(40);
            $dataoffer = Cv::where([['job', $request->jobfilter], ['status', "Offer"]])->orderBy('updated_at', "desc")->paginate(40);
            $datainvi = Cv::where([['job', $request->jobfilter], ['status', "Invite"]])->orderBy('updated_at', "desc")->paginate(40);
            $data = Cv::where([['job', $request->jobfilter], ['status', "Pass"]])->orderBy('updated_at', "desc")->paginate(40);
            if ($pagemax < $pass) {
                $pagemax = $pass;
                $data = Cv::where([['job', $request->jobfilter], ['status', "Pass"]])->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $invi) {
                $pagemax = $invi;
                $data = Cv::where([['job', $request->jobfilter], ['status', "Invite"]])->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $fail) {
                $pagemax = $fail;
                $data = Cv::where([['job', $request->jobfilter], ['status', "Fail"]])->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $blac) {
                $pagemax = $blac;
                $data = Cv::where([['job', $request->jobfilter], ['status', "Blacklist"]])->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $offe) {
                $pagemax = $offe;
                $data = Cv::where([['job', $request->jobfilter], ['status', "Offer"]])->orderBy('updated_at', "desc")->paginate(40);
            }
        } else {
            $pass = count(Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Pass")->get());
            $invi = count(Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Invite")->get());
            $fail = count(Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Fail")->get());
            $blac = count(Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Blacklist")->get());
            $offe = count(Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Offer")->get());
            $datapass = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Pass")->orderBy('updated_at', "desc")->paginate(40);
            $datafail = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Fail")->orderBy('updated_at', "desc")->paginate(40);
            $datablacklist = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Blacklist")->orderBy('updated_at', "desc")->paginate(40);
            $dataoffer = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Offer")->orderBy('updated_at', "desc")->paginate(40);
            $datainvi = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Invite")->orderBy('updated_at', "desc")->paginate(40);
            $data = $data = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Pass")->orderBy('updated_at', "desc")->paginate(40);
            if ($pagemax < $pass) {
                $pagemax = $pass;
                $data = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Pass")->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $invi) {
                $pagemax = $invi;
                $data = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Invite")->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $fail) {
                $pagemax = $fail;
                $data = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Fail")->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $blac) {
                $pagemax = $blac;
                $data = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Blacklist")->orderBy('updated_at', "desc")->paginate(40);
            }
            if ($pagemax < $offe) {
                $pagemax = $offe;
                $data = Job::select("cvs.*")->where('talenpools_id', Job::where('name', $id)->first()->id)->join("cvs", "cvs.job", "=", "jobs.name")->where("cvs.status", "Offer")->orderBy('updated_at', "desc")->paginate(40);
            }
        }
        return view('backend.talenpool', compact('job', 'id', 'datapass', 'datafail', 'datablacklist', 'dataoffer', 'datainvi', 'tags', 'data'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
