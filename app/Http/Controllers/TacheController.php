<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index(){
        $taches= Tache::all()->sortBy([
            ['status','asc'],
            ['id','desc'],
        ]);
        return view('taches.index',compact('taches'));
    }

    public function addtask(Request $request){
        $tache = new Tache();
        $tache->content = $request->tache;
        $tache->save();
        return redirect(route('index'));
    }

    public function taskState($id){
        $tache = Tache::find($id);
        $tache->status = !$tache->status;
        $tache->save();
        return redirect()->back();
    }
}
