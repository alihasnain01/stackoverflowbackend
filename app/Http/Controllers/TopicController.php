<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function getTopics(){
        $topics=Topic::whereStatus(1)->get();
        return ['status'=>true,'msg'=>'Data fetched successfully','data'=>$topics];
    }
}
