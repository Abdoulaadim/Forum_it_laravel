<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $questionts =DB::table('questions')      
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->where('questions.id','=', $id)
        ->select('users.name as name','questions.description as description','questions.title as title','questions.id as id','questions.created_at as created_at')->get();

         $questiont =DB::table('questions')      
        ->join('reponses', 'reponses.question_id', '=', 'questions.id')
        ->join('users', 'reponses.user_id', '=', 'users.id')
        ->where('questions.id','=', $id)
        ->select('users.name as name' ,'reponses.commentaire as commentaire','reponses.created_at as created_at')->get();
        return view("reponse",['questiont'=>$questiont],['questionts'=>$questionts]);
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
            'commentaire'=>'required',
        ]);

        $reponse = new Reponse([
            'commentaire' => $request->get('commentaire'),
            'user_id' => $request->get('user_id'),
            'question_id' => $request->get('question_id')
        ]);
        $reponse->save();
        return back()->with('success', 'reponse ajouter avec succee');
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
