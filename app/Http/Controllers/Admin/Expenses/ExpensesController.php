<?php

namespace App\Http\Controllers\Admin\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ExpensesController extends Controller
{
    public function getExpenses(Request $request){
        if (Auth::guard('artists')->check()){
            $expense = ExpenseModel::where('user_id',Auth::guard('artists')->user()->id)->get();
        }else{
            $expense = ExpenseModel::where('user_id',Auth::user()->id)->get();
        }
        return view('admin.expense.index',compact('expense'));
    }

    public function AddexpensesForm(Request $request){
        return view('admin.expense.create');
    }

    public function AddexpensesPost(Request $request){
        $this->validate($request, [
            'note'          => 'required',
            'expense_items'       => 'required',
        ],[
            'note.required' => 'Please enter note',
            'expense_items.required' => 'Please select expense',
        ]);

        if(Auth::guard('artists')->check()){
            $userid = Auth::guard('artists')->user()->id;
        }else{
            $userid = Auth::user()->id;
        }


        $emodel = new ExpenseModel();
            $emodel->user_id                                       = $userid;
            $emodel->date                                          = date('Y-m-d');
            $emodel->note                                          = $request['note'];
            $emodel->expense_items                                 = $request['expense_items'];
        $emodel->save();

        return redirect()->back()->with('message', 'Expense added successfully.');
    }

    public function editexpensesForm(Request $request,$id){
        $expenses = ExpenseModel::where('id',decrypt($id))->first();
        return view('admin.expense.edit',compact('expenses'));
    }

    public function editexpensesPost(Request $request,$id){
        $this->validate($request, [
            'note'          => 'required',
            'expense_items'       => 'required',
        ],[
            'note.required' => 'Please enter note',
            'expense_items.required' => 'Please select expense',
        ]);

        if(Auth::guard('artists')->check()){
            $userid = Auth::guard('artists')->user()->id;
        }else{
            $userid = Auth::user()->id;
        }

        $emodel = ExpenseModel::find(decrypt($id));
            $emodel->user_id                                       = $userid;
            $emodel->note                                          = $request->input('note');
            $emodel->expense_items                                 = $request->input('expense_items');
        $emodel->save();


        return redirect()->back()->with('message', 'Expenses updated successfully.');


    }

    public function deleteexpensesForm(Request $request,$id){
        $emodel = ExpenseModel::find(decrypt($id));
        $emodel->delete();
        return back()->with('msg', 'Record deleted successfully.');
    }
}
