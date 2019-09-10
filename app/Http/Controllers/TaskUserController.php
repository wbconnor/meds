<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskUser;
use Auth;
use Carbon;
//use Illuminate\Http\Request;

class TaskUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$task_users = TaskUser::all();
        $task_users = TaskUser::all();

        return response()->json($task_users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task_user_create', ['user' => Auth::user() ? Auth::user() : false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $taskUser = [
        'task_id' => $request->id,
        'user_id' => $request->user_id,
        'started_at' => Carbon\Carbon::now()
      ];
        $task_user = TaskUser::create($taskUser);

        return $task_user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $task_user = TaskUser::findOrFail($id);
        $task_user->update(['stopped_at' => Carbon\Carbon::now()]);
        return $task_user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
