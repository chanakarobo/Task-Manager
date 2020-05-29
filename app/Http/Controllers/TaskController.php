<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request){
          
        $this->validate($request,[
         
         'task'=>'required | max:100 | min:5',



        ]);


        $task=new Task;
        $task->task=$request->task;
        $task->save();

        $data=Task::all();
        //dd($data);

        return view('task')->with('task',$data);
        

       // dd($request->all());
    }
   
    public function updateTaskCompleted($id){

     $task=Task::find($id);
     $task->Iscompleted=1;
     $task->save();
     return redirect()->back();

    }

    public function updateTaskNotCompleted($id){

    $task=Task::find($id);
    $task->Iscompleted=0;
    $task->save();
    return redirect()->back();


    }


}
