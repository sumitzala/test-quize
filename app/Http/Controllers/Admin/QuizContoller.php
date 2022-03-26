<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Quize;
use App\Admin\QuizeAns;

class QuizContoller extends Controller
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
        $quize = Quize::all();
        
        return view('admin.quize.index',compact('quize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quize.create');
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
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'que' =>'required',
                'option' =>'required|array',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $answer                = $request->get('answer');
            $qustion               = new Quize();
            $qustion->que          = $request->input('que');
            if($qustion->save()){
                $options = $request->input('option');
                foreach ($options as $key => $value) {
                    $quizeopt            =  new QuizeAns();
                    $quizeopt->q_id      = $qustion->id;
                    $quizeopt->option    = $value;
                    if($key == $answer){
                        $quizeopt->is_ans    = 1;
                    }
                    $quizeopt->save();
                }
                
            }
            DB::commit();
            return redirect()->route('quize.index')->with('success','Question Added Successfully');

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
        $quize = Quize::findOrFail(decrypt($id));
        return view('admin.quize.edit',compact('quize'));
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
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'que' =>'required',
                'option' =>'required|array',       
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $answer                = $request->get('answer');
            $qustion               =  Quize::findOrFail($id);
            $qustion->que          = $request->input('que');
            if($qustion->save()){
                QuizeAns::where('q_id',$qustion->id)->delete();
                $options = $request->input('option');
                foreach ($options as $key => $value) {
                    $quizeopt            =  new QuizeAns();
                    $quizeopt->q_id      = $qustion->id;
                    $quizeopt->option    = $value;
                    if($key == $answer){
                        $quizeopt->is_ans    = 1;
                    }
                    $quizeopt->save();
                }
                
            }
            DB::commit();
            return redirect()->route('quize.index')->with('success','Question Updated Successfully');

        }catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                DB::beginTransaction();
                $id     = $request->input('id');
                $quize = Quize::findOrFail(decrypt($id));
                if ($quize->delete()) {
                    $response['success'] = true;
                    $response['message'] = 'Question Deleted Successfully';
                } else {
                    $response['message'] = 'Please Try Again..!';
                    $response['success'] = false;
                }
                DB::commit();
                return response()->json($response);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json($e->getMessage());
            }
        } else {
            return abort(404);
        }
    }
    public function chooseAnswer($id){
        try {
                
            $quize = Quize::findOrFail(decrypt($id));
            return view('admin.quize.chhoseans',compact('quize'));
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
     public function answerstore(Request $request)
    {
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'que' =>'required',
                'ans_id' =>'required',
                
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
                $q_id                = $request->input('que_id');
                $setNull             = QuizeAns::where('q_id',$q_id)->update(['is_ans' => null ]);
                $ans_id              = $request->input('ans_id');
                $quizeopt            =  QuizeAns::findOrFail($ans_id);
                $quizeopt->is_ans    = 1;
                $quizeopt->save();
            DB::commit();
            return redirect()->route('quize.index')->with('success','Question Answer Selected Successfully');
        }catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
    }
}
