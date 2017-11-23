<?php

namespace App\Http\Controllers\Shop;

use App\Models\BeansLog;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.beans.index', [
            'beansLogs' => BeansLog::whereCustomerId(session('med_user')['id'])
                ->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.beans.exchange', [
            'projects' => Project::whereStatus(1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BeansLog::exchange([
            'project_id' => $request->input('project_id'),
            'integral' => $request->input('integral')
        ]);
        return redirect(route('beans.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('shop.beans.detail', [
            'beansLog' => BeansLog::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function month($month)
    {
        return view('shop.beans.month', [
            'month' => $month,
            'exchange_sum' => BeansLog::whereCustomerId(session('med_user')['id'])
                ->whereBetween('created_at', [date('Y-m-d h:i:s', strtotime($month)), date('Y-m-d h:i:s', strtotime($month . " +1 month"))])
                ->whereType(1)->sum('beans'),
            'used_sum' => BeansLog::whereCustomerId(session('med_user')['id'])
                ->whereBetween('created_at', [date('Y-m-d h:i:s', strtotime($month)), date('Y-m-d h:i:s', strtotime($month . " +1 month"))])
                ->whereType(2)->sum('beans'),
            'beansLogs' => BeansLog::whereCustomerId(session('med_user')['id'])
                ->whereBetween('created_at', [date('Y-m-d h:i:s', strtotime($month)), date('Y-m-d h:i:s', strtotime($month . " +1 month"))])
                ->get()
        ]);
    }
}
