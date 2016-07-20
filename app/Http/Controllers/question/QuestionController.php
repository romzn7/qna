<?php

namespace App\Http\Controllers\question;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Controllers\Controller;
use App\Question;
use Auth;
use App\Answer;


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
        $answer = Answer::where('question_id', $id)->get();
        $question = Question::where('id', $id)->get()->first();
        return view('question.single', compact('question', 'answer'));
    }

    public function getYourQuestion(){
        $user_id = Auth::user()->id;
        $questions = Question::where('user_id', $user_id)->paginate(4);
        //dd($questions);
        return view('question.yourquestion')->with(['questions' => $questions]);
    }

    public function getEditQuestion($id){
        $question = Question::find($id);
        if($question->user_id == Auth::user()->id){

            return view('question.edit')->with(['question' => $question]);
        }else{
            return redirect()->back()->with(['error' => 'This is not your Question']);
        }

    }

    public function postEditQuestion(CreateQuestionRequest $request){
        /*dd($request);*/
        $question = Question::find($request['id']);
        $question->question = $request->question;
        $question->save();
        return redirect()->route('home')->with(['success' => 'Question Edit Successfully']);

    }

}
