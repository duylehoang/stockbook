<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;
use App\Contact;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $contacts = Contact::orderBy('id', 'desc');

        if ($request->has('search_box')) {
            if ($request->replied) {
                $contacts = $contacts->where('replied', (int) $request->replied);
            }
            if ($request->search) {
                $txtSearch = $request->search;
                $contacts = $contacts->where(function ($query) use ($txtSearch) {
                    $query->where('name', 'like', '%' . $txtSearch . '%')
                        ->orwhere('email', 'like', '%' . $txtSearch . '%');
                });
            }
        }

        $contacts = $contacts->paginate(20);

        return view('contact.index', [
            'request' => $request,
            'contacts' => $contacts
        ]);
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        if(!$contact) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy contact'
            ]);
        }

        return view('contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);

        if(!$contact) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy contact'
            ]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'replied' => $request->replied,
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            $contact->update($data);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('contact.index')->with([
            'status'=> 'success',
            'message'=> 'Cập nhật contact thành công'
        ]);
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        if(!$contact) {
            return response()->json([
                'status'=> 'error',
                'message'=> 'Không tìm thấy contact'
            ]);
        }

        $contact->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }
}
