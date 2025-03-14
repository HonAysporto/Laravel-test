<?php

namespace App\Http\Controllers;


use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public function index(Request $req) 
    {
        $perPage = $req->input('per_page', 10);

        $items = item::paginate($perPage);

        // return view('index', compact('items', 'perPage'));
        return response()->json($items);
    }

    
}










// namespace App\Http\Controllers;

// use App\Models\Item;
// use Illuminate\Http\Request;

// class ItemController extends Controller
// {
//     // API method for paginated items
//     public function apiIndex(Request $req)
//     {
//         // Get the 'per_page' parameter from the request or default to 10 items per page
//         $perPage = $req->input('per_page', 10);

//         // Paginate the items
//         $items = Item::paginate($perPage);

//         // Return paginated items as JSON
//         return response()->json($items);
//     }
// }

