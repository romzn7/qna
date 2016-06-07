<?php

namespace App\Http\Controllers\question;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Controllers\Controller;
use App\Question;
use Auth;


class QuestionController extends Controller
{
    public function getIndex(){
        $questions = Question::where('solved', '0')->orderBy('created_at', 'desc')->paginate(4);
        return view('question.index')->with(['questions' => $questions]);
    }

    public function postQuestion(CreateQuestionRequest $request){
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        $question->save();
        return redirect()->route('home')->with(['success' => 'Your question has been posted']);
    }

    public function getSingleQuestion($id){
        $question = Question::where('id', $id)->get()->first();

        return view('question.single', compact('question'));

    }
    
}
