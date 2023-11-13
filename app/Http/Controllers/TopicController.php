<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function getTopics()
    {
        $topics = Topic::whereStatus(1)->get();
        return ['status' => true, 'msg' => 'Data fetched successfully', 'data' => $topics];
    }

    public function getCategories()
    {
        $pageNo = request('page') ? request('page') : 1;
        $search = request('search') ? request('search') : null;
        $categories = Topic::withCount([
            'issues as total_issues',
            'issues as today_issues' => fn ($q) => $q->whereDate('created_at', now())
        ])->when($search, fn ($q) => $q->where('name', 'like', '%' . $search . '%'))->whereStatus(1)->paginate(10, ['*'], 'page', $pageNo);
        return ['status' => true, 'msg' => 'Data fetched successfully', 'data' => $categories];
    }
}
