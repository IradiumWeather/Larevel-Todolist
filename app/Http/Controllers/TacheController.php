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

    public function taskState(Tache $tache){
        $tache->status = !$tache->status;
        $tache->save();
        return redirect()->back();
    }

    public function modifier(Tache $tache){
        return view('taches.modifier',['tache' => $tache]);
    }

    public function update(Request $request,Tache $tache){
        $tache->content=$request->tache;
        $tache->save();
        return redirect(route('index'));
    }

    public function deleteTask(Tache $tache){
        $tache->delete();
        return redirect(route('index'));
    }

}
