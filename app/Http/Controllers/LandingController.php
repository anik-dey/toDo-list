<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class LandingController extends Controller
{
    public function index()
    {

        return view('landing');
    }

    public function saveTask(Request $request)
    {
        //dd(request()->all());
        $validated = $request->validate([
            'task_list' => 'required',
        ]);
        $data= array();
        $data['task_list']= $request->task_list;
        $data['created_at']=Carbon::now();
        $data['updated_at']=Carbon::now();
        DB::table('task')->insert($data);

        $tasks_view= DB::table('task')->latest()->get();
        return view('admin.task_input')->with('tasks_view',$tasks_view);

    }

    public function deleteTask($id)
    {
        DB::table('task')
       ->where('id',$id)
       ->delete();
       $tasks_view= DB::table('task')->latest()->get();
        return view('admin.task_input')->with('tasks_view',$tasks_view);
        //dd($category_view);
        // $tasks_view= DB::table('task')->latest()->get();
        // return view('admin.task_input')->with('tasks_view',$tasks_view);
    }
}
