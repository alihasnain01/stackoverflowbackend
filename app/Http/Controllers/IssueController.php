<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function getIssueById(Request $request)
    {
        $id = $request->query('id');
        $query = $request->query('search');
        $page = $request->query('page') ? $request->query('page') : 1;
        $issues = Issue::with(['user:id,name'])->when($id, function ($q) use ($id) {
            $q->where('topic_id', $id);
        })->when($query, function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%');
        })->latest()->paginate(15, ['*'], 'page', $page);

        return ['status' => true, 'msg' => 'Data fetched successfully', 'data' => $issues];
    }

    public function getSingleIssue($id)
    {
        $issue = Issue::with(['user:id,name', 'solutions'])->find($id);
        return ['status' => true, 'msg' => 'Data fetched successfully', 'data' => $issue];
    }

    public function postSolution(Request $request)
    {
        return ['status' => true];
        dd($request->all());
    }
}
