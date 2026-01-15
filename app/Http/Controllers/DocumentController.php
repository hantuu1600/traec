<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function DocumentView() {
        return view('pages.admin.document-request', ['title' => 'Document Requests']);
    }

}