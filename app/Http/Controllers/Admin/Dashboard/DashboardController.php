<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.dashboard.dashboard');
    }

    public function getQuote(){
        $data['quotes'] = Quote::with('normalUser', 'artist')->get();
        return view('admin.quote', $data);
    }

    public function deleteQuote($id) {
        $find =  Quote::where('id', decrypt($id))->first();
        if($find) {
            $find->delete();
            return back()->with('msg', 'Quote deleted successfully');
        }
        return back()->with('msg', 'No Quote found');

    }
}
