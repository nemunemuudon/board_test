<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class BbsController extends Controller
{
    //
    public function index() {
        $bbs_data = Message::where('is_delete',0) -> orderBy('id','desc') -> paginate(5);
        return view('bbs',compact('bbs_data'));
    }

    public function add(Request $request) {
        $request -> validate([
            'name' => 'required|max:10',
            'message' => 'required|max:30',
        ]);

        $name = $request -> name;
        $message = $request -> message;

        $data = [
            'view_name' => $name,
            'message' => $message
        ];

        Message::insert($data);

        return redirect('bbs');
    }

    public function delete($id) {
        Message::where('id',$id)
            -> update([
                'is_delete' => 1,
                'updated_at' => now()
            ]);
            return redirect('bbs');
    }
}
