<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Carbon\Carbon;



class DocumentController extends Controller
{

    public function index() {

        $documents = Document::all();
        $users = User::all();
        return view('document_list', compact('documents', 'users'));
    }

    public function show($id) {

        $document = Document::where('id', $id)->get(['content']);
        $document = $document[0]['content'];
        return view('document_view', compact('document'));
    }

    // assign document to users in ( 3 doc per each user )
    public function assignDocument($userId) {

        $unassigned_docs = Document::where('flag', 0)->orderBy('priority', 'DESC')
            ->orderBy('created_at', 'ASC')->get(['id'])->toArray();

        $docs_batch = array_slice($unassigned_docs, 0, 3, true);

        $expired_at = Carbon::now()->addDays(-2);

        foreach ($docs_batch as $item) {
            Document::where('id', $item['id'])->update([
                'user_id' => $userId,
                'flag' => 1,
                'expired_at' => $expired_at
            ]);
        }
        return redirect()->back();
    }

    // Check for Expiration
    public function checkExpiration () {
        $documents = Document::all();
        $today = Carbon::now();

        foreach($documents as $item) {
            if(( $item->expire_at < $today ) && ( $item->status == 0 )) {
                Document::where('id', $item->id)->update([
                    'user_id' => null,
                    'flag' => 0,
                    'expired_at' => null
                ]);
            }
        }

        return redirect()->back();
    }

    // clear all assignments
    public function clearAssignments() {
        Document::where('flag', 1)->update([
            'user_id' => null,
            'flag' => 0,
            'expired_at' => null
        ]);
        return redirect()->back();
    }








    public function create()
    {
        //
    }


    public function store(StoreDocumentRequest $request)
    {
        //
    }




    public function edit(Document $document)
    {
        //
    }


    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }


    public function destroy(Document $document)
    {
        //
    }
}
