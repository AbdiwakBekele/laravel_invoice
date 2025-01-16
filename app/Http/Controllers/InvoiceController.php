<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function getInvoices() {
        $counters = Counter::all();
        return response()->json($counters);
    }

    public function searchInvoice(Request $request) {
        $search = $request->get('s');
        if ($search != null) {
            $counters = Counter::where('key', 'LIKE', "%$search%")->get();
            return response()->json($counters);
        } else {
            return $this->getInvoices();
        }
    }
}
