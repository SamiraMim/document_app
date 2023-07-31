<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\DocumentRepositoryInterface;

class DocumentController extends Controller
{
    private DocumentRepositoryInterface $documentRepository;
    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
        
    }

    // get list of all documents
    public function index() {
        $documents =  $this->documentRepository->getAllDocuments();
        $users = User::all();
        return view('admin_home', compact('documents', 'users'));
    }

    // get assigned documents
    public function getAssignedDocuments () {
        $documents = $this->documentRepository->getAssignedDocuments();
        return view('assigned_list', compact('documents'));
    }

    // get each document data
    public function documentView ($userId, $id) {
        $document = $this->documentRepository->getDocumentById($id);
        if ($document->user_id == $userId || $document->user_id == 0 ) {
            return view('document_view', compact('document'));
        } else {
            abort(403);
        }
    }


    // assign document to users in ( 3 doc per each user )
    public function assignDocument($userId) {

        $unassigned_docs = $this->documentRepository->getUnassignedDocumentIds()->toArray();

        $docs_batch = array_slice($unassigned_docs, 0, 3, true);

        $expired_at = Carbon::now()->addDays(-3);

        foreach ($docs_batch as $item) {
            $newData = [
                'user_id' => $userId,
                'flag' => 1,
                'expired_at' => $expired_at
            ];

            $this->documentRepository->updateDocument($item['id'], $newData);
        }

        return redirect()->back();
    }

   
    // Check for Expiration
    public function checkExpiration () 
    {
        $documents = $this->documentRepository->getAllDocuments();
        $today = Carbon::now();

        foreach($documents as $item) {
            if(( $item->expired_at < $today ) && ($item->flag == 1) && ($item->status == 0)) {
                $this->documentRepository->clearExpiredAssignment($item->id);
            }
        }

        return redirect()->back();
    }

    // clear all assignments
    public function clearAssignments() 
    {
        $this->documentRepository->clearAssignment();
        return redirect()->back();
    }


    // get user assignments
    public function getUserAssignment ($userId) {
        $documents = $this->documentRepository->getUserAssignments( $userId);
        return view('user_panel', compact('documents'));
    }


    // update document status
    public function updateDocumentStatus (Request $request, $id)  {
        $document = $this->documentRepository->getDocumentById($id);
        $newData = [
            'status' => $request->status
        ];
        $this->documentRepository->updateDocument($id, $newData);

        return redirect()->route('getUserAssignment', $document->user_id );
    }


}
