<?php
namespace App\Repositories;

use App\Interfaces\DocumentRepositoryInterface;
use App\Models\Document;

class DocumentRepository implements DocumentRepositoryInterface {
    public function getAllDocuments () {
        return Document::all();
    }

    public function getDocumentById ($docId) {
        return Document::findOrFail($docId);
    }

    public function getAssignedDocuments () {
        return Document::where('flag', 1)->get();
    }

    public function getUnassignedDocumentIds () {
        return Document::where('flag', 0)->orderBy('priority', 'DESC')
            ->orderBy('created_at', 'ASC')->get(['id']);
    }

    public function updateDocument ($docId, array $newData) {
        return Document::whereId($docId)->update($newData);
    }

    public function clearExpiredAssignment ($docId) {
        $newData = [
            'user_id' => null,
            'flag' => 0,
            'status' => 0,
            'expired_at' => null
        ];
        return Document::whereId($docId)->update($newData);
    }

    public function clearAssignment () {
        $newData = [
            'user_id' => null,
            'flag' => 0,
            'status' => 0,
            'expired_at' => null
        ];
        return Document::where('flag', 1)->update($newData);
    }

    public function getUserAssignments ( $userId) {
        return Document::where('user_id', $userId)->where('status', '!=', 3)->get();
    }
}