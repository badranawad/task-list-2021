<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->get();
        return view('tasks/index', compact('tasks'));
    }

    public function store(Request $request){
        DB::table('tasks')->insert([
            'name' => $request->name
        ]);

        return redirect()->back();
    }

    public function delete($id){
        DB::table('tasks')->where('id',$id)->delete();

        return redirect()->back();
    }

    public function edit($id){
        $tasks = DB::table('tasks')->get();
        $task = DB::table('tasks')->find($id);

        return view('tasks/index', compact('task', 'tasks'));
    }

    public function update(Request $request, $id){
        $task = DB::table('tasks')->where('id',$id)->update([
            'name' => $request->name
        ]);

        return redirect('tasks');
    }
}
