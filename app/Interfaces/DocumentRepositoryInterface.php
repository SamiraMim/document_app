<?php

namespace App\Interfaces;

interface DocumentRepositoryInterface {
    public function getAllDocuments ();
    public function getDocumentById ($docId);
    public function getAssignedDocuments ();
    public function getUnassignedDocumentIds ();
    public function getUserAssignments ( $userId );
    public function updateDocument ($docId, array $newData);
    public function clearExpiredAssignment ($docId);
    public function clearAssignment ();
}