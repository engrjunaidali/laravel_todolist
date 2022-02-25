<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $total_todos = Todo::count();
        $complete_todos = Todo::where('completed','LIKE',True)->get()->count();

        $incomplete_todos = Todo::where('completed','LIKE',False)->get()->count();

        // $todos = Todo::where('completed','LIKE',False)->orderBy('tid', 'desc')->get();
        $todos = Todo::all();
        return view('todos',['todos'=>$todos,
                            'total_todos'=>$total_todos,
                            'complete_todos'=>$complete_todos,
                            'incomplete_todos'=>$incomplete_todos]);
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
        $t = new Todo;
        $t->item = $request->todo_item;
        $t->save();
        return redirect()->back();
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

    public function complete(Request $request, $id)
    {
        $t=Todo::find($id);
        $t->completed = True;
        $t->save();
        return redirect('todos');
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
        $t = Todo::find($id);
        $t->delete();
        return redirect('todos');
    }
}
