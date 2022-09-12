<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\Tasks as Tasks;

class TasksController extends Controller
{
    // public function listmanager(){
    //     $tasks = Tasks::all();
    //     return view('tasks', [
    //     'tasks' => $tasks
    //     ]);
    // }

    public function listmanager(){
        $tasks = Tasks::where('user_id', Auth::id())->paginate(50);
        return view('tasks', [
        'tasks' => $tasks
        ]);
    }

    public function newtask(){
        return redirect('newtask');
    }
    

    public function store(Request $request){
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task = new Tasks();
        $task->user_id = Auth::id();
        $task->description = $request->name;
        $task->created_at = utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task->updated_at = utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task->state = $request->state;
        $task->status = 0;
        $task->save();
        return redirect('tasks')
            ->with('flash_notification.message', 'Tâche crée')
            ->with('flash_notification.level', 'success');
    }

    public function delete(Request $request){
        $task = Tasks::findOrFail($request->id);
        $task->delete();
        return redirect('tasks')
            ->with('flash_notification.message', 'Tâche supprimé')
            ->with('flash_notification.level', 'success');
    }

    public function finish(Request $request){
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task = Tasks::findOrFail($request->id);
        $task->status = 1;
        $task->updated_at = utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task->save();
        return redirect('tasks')
        ->with('flash_notification.message', 'Tâche terminé')
        ->with('flash_notification.level', 'success'); 
    }

    public function progress(Request $request){
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task = Tasks::findOrFail($request->id);
        $task->status = 0;
        $task->updated_at = utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task->save();
        return redirect('tasks')
            ->with('flash_notification.message', 'Tâche remis en attente')
            ->with('flash_notification.level', 'success');
    }

    public function edit($task){
        $task = Tasks::find($task);
       return view('taskedit',[
        'task'=>$task
        ]);
    }

    public function taskedit(Request $request){
        $task = Tasks::find($request->id);
        return view('taskedit',[
        'task'=>$task
        ]);
    }
    
    public function update(Request $request)
    { 
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task = Tasks::findOrFail($request->id);
        $task->description = $request->name;
        $task->state = $request->state;
        $task->updated_at = utf8_encode(strftime('%A %d %B %Y, %H:%M'));
        $task->save();
 
        return redirect('tasks')
            ->with('flash_notification.message', 'Tâche modifié')
            ->with('flash_notification.level', 'success');
    }
}
