<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function getIssueById(Request $request){
        $id=$request->query('id');
        $query=$request->query('search');
        $page=$request->query('page') ? $request->query('page') : 1;
        $issues=Issue::when($id,function($q)use($id){
            $q->where('topic_id',$id);
        })->when($query,function($q) use($query){
            $q->where('title','like','%'.$query.'%');
        },function($q){
            $q->latest();
        })->paginate(10, ['*'], 'page', $page);
        
        return ['status'=>true,'msg'=>'Data fetched successfully','data'=>$issues];
    }
}
