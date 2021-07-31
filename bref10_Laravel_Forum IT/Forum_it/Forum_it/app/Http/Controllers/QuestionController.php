<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $questiont =DB::table('questions')      
         ->join('users', 'users.id', '=', 'questions.user_id')
         ->select('users.name as name','questions.description as description','questions.title as title','questions.id as id')->get();
         return view("admin",['questiont'=>$questiont]);

    }



    public function indexhome()
    {
      
       

        $questiont =DB::table('questions')      
        ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('users.name as name','questions.description as description','questions.title as title','questions.id as id','questions.created_at as created_at')->get();
        return view("home",['questiont'=>$questiont]);
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
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $question = new Question([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => $request->get('user_id')
        ]);
        $question->save();
        return back()->with('success', 'Question ajouter avec succee');
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
        $questions = Question::find($id);
        return view('adminedit', compact('questions')); 
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
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $questions = Question::find($id);
        $questions->title =  $request->title;
        $questions->description = $request->description;
        $questions->user_id = $request->user_id;

        $questions->save();
        // session()->flash('success', 'The workshop has been updated');

        return redirect('admin')->with('success', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Question = Question::find($id);
        $Question->delete();
        return back()->with('success', 'la supprition avec succee');

        // return redirect('/admin')->with('success', 'Question deleted!');
    }

    // function joinadmin(Request $request)
    // {
     
    //  $id=$request->get('user_id');
    // //  die(print_r($id));
    //  $datax =DB::table('users')      
    //  ->join('questions', 'users.id', '=', 'questions.user_id')
    //  ->where('questions.user_id','=',1)
    //  ->select('name')->get();
    //  return view('admin', compact('datax'));
    // }

}
