<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessagesRequest;
use App\Message;
use App\User;

use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class MessagesController extends Controller
{


    public function __construct()
    {
        $this->middleware(['role:admin'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messages.index', [
            'messages' => auth()->user()->messages()->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create', [
            'users' => User::role(['staff', 'admin'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessagesRequest $request)
    {
        $users =  request('select_all') ?
            User::role(['staff', 'admin'])->get() :
            User::findMany(request('users'));

        $this->sendMessages($users, $request);

        return redirect(route('messages.index'))->with('message', 'Message Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show($messageId)
    {
        $message = current_user()->messages()->find($messageId);
        return view(
            'messages.show',
            compact('message')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Message $message)
    {
        $message->update(['read' => true]);
        return redirect(route('messages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    protected function sendMessages($users, $request)
    {
        $users->each(function ($user) use ($request) {
            $user->messages()->create([
                'author_id' => auth()->user()->id,
                'title' => $request->title,
                'body' => $request->body,
            ]);
        });
    }
}