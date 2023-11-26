<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.contact-component');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $contact = new Message([
            'message' => $request->input('message'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        $contact->save();
        return redirect()->back();
    }
}
