<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quize;
use App\Admin\QuizeAns;

class QuizeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $questions = Quize::all()->take(10);
        return view('quiz.quizer.index',compact('questions'));
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
        try{
            $questionAnser  = $request->input('que');
            $count = 0;
            $skipPoint  = $request->input('skip_point') * 0.5;
            foreach ($questionAnser as $key => $value) {
                $find   = QuizeAns::findOrFail($value);
                if($find->is_ans == 1){
                    $count++;
                }else{

                } 
            }
            $resource['skipPoint'] = $skipPoint;
            $resource['minusPoint'] = $count - $skipPoint;
            $resource['total'] = $count;
            dd($resource);
            // $result = array_sum();

            // dd($result);

        }catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
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
