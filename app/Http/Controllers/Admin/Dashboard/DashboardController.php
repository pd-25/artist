<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index() {
        return view('admin.dashboard.dashboard');
    }

    public function getQuote(){
        if(Auth::guard('artists')->check()){
            $data['quotes'] = Quote::where('artist_id', auth()->guard('artists')->id())->with('normalUser', 'artist')->get();
        }else{
            $data['quotes'] = Quote::with('normalUser', 'artist')->get();
        }
       
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
