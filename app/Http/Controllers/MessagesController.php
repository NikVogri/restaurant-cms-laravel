<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\UserMessage;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messages.index', [
            'messages' => UserMessage::where('receive_user_id', auth()->user()->id)->get()
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
    public function store(Request $request)
    {
        request()->validate([
            'body' => ['required', 'string', 'max:1024'],
            'title' => ['required', 'string', 'max:255'],
            'select_all' => ['nullable'],
            'users' => ['nullable']
        ]);

        // 1) Create message
        $message = Message::create([
            'from_user_id' => auth()->user()->id,
            'title' => request('title'),
            'body' => request('body'),
        ]);

        if (request('select_all')) {
            // get all users with staff or admin roles
            $users = User::role(['staff', 'admin'])->get();
        } else {
            // get users from array
            $users = User::findMany(request('users'));
        }


        foreach ($users as $user) {
            $user->sendMessage($message->id);
        }

        return redirect(route('messages.index'))->with('message', 'Message Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view(
            'messages.show',
            ['message' => $message]
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
    public function update(Request $request, Message $message)
    {
        //
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
}