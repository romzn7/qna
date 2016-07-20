<?php

namespace App\Http\Controllers\answer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Answer;
use App\Http\Requests\CreateAnswerRequest;
use Auth;

class AnswerController extends Controller
{
    public function postAnswerSubmit(CreateAnswerRequest $request){
        if(!Auth::check()){
            return redirect()->route('login')->with(['error' => 'Login First']);
        }else{
            $answer = new Answer();
            $answer->user_id = Auth::user()->id;
            $answer->question_id = $request->question_id;
            $answer->answer = $request->answer;
            $answer->save();
            return redirect()->route('home')->with(['success' => 'Answered Successfully']);
        }

    }
}
