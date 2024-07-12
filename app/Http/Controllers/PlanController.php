<?php

namespace App\Http\Controllers;
use App\Models\Plan;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::select('id', 'todo', 'created_at')
        ->where('flg',0)->get();

        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        return view('plans.create');
    }

    public function store(Request $request)
    {
        if(is_null($request['todo'])){
            session()->flash('flash_message', '追加する作業がありません');
        } else {
            Plan::create([
            'todo' => $request->todo
        ]);
        }

        return to_route('plans.index');
    }

    public function edit($id)
    {
        $plans = Plan::find($id);
        
        return view('plans.edit',compact('plans'));
    }

    public function update(Request $request, $id)
    {
        $plans = Plan::find($id);
        $plans->todo = $request->todo;
        $plans->save();

        return to_route('plans.index');
    }

    public function delete($id)
    {
        $plans = Plan::find($id);
        $plans->delete();

        return to_route('plans.index');
    }

    public function finish($id)
    {
        $plans = Plan::find($id);
        $plans->flg = 1;
        $plans->save();

        return to_route('plans.complete');
    }

    public function complete(Request $request)
    {

        $sort = $request->sort;
        $order = $request->order;

        if(is_null($sort) && is_null($order)){
            $sort = 'id';
            $order = 'desc';
        }

        //検索対応
        $search = $request->search;
        $query = Plan::search($search);

        $plans = $query->select('id', 'todo', 'created_at')
        ->where('flg',1)->orderBy($sort, $order)->paginate(5);

        return view('plans.complete',compact('plans'));
    }

    public function restore($id)
    {
        $plans = Plan::find($id);
        $plans->flg = 0;
        $plans->save();

        return to_route('plans.index');
    }

}
