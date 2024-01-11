<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class PaymentController extends Controller
{
    public function getAcceptPayment(Request $request){
        if (Auth::guard('artists')->check()){
            $payments = PaymentModel::where('user_id',Auth::guard('artists')->user()->id)->get();
        }else{
            $payments = PaymentModel::where('user_id',Auth::user()->id)->get();
        }
        return view('admin.payment.index',compact('payments'));
    }

    public function AddpaymentForm(Request $request){
        return view('admin.payment.create');
    }

    public function AddpaymentPost(Request $request){
        $this->validate($request, [
            'artist_name'          => 'required',
            'customers_name'       => 'required',
            'design'               => 'required',
            'price'                => 'required',
            'bill_image'           => 'required|image|mimes:jpeg,png,jpg,gif'
        ],[
            'artist_name.required' => 'Please enter artist name',
            'customers_name.required' => 'Please enter customer name',
            'design.required' => 'Please enter Design',
            'price.required' => 'Please enter price',
            'banner_url.required' => 'Please enter banner url',
            'bill_image.required' => 'Please upload Bill Document',
        ]);

        if(Auth::guard('artists')->check()){
            $userid = Auth::guard('artists')->user()->id;
        }else{
            $userid = Auth::user()->id;
        }

        if ($request->hasFile('bill_image')) {
            // $path = Storage::disk('local')->put($request->file('photo')->getClientOriginalName(),$request->file('photo')->get());
            //$path = $request->file('bill_image')->store('/DepositSlip/1/smalls');
            $file = $request->file('bill_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/DepositSlip/',$filename);
            $path =  Storage::url('public/DepositSlip/'.$filename);

        }else{
            $path = '';
        }

        $pmodel = new PaymentModel();
            $pmodel->user_id                                       = $userid;
            $pmodel->date                                          = date('Y-m-d');
            $pmodel->artist_name                                   = $request['artist_name'];
            $pmodel->customers_name                                = $request['customers_name'];
            $pmodel->design                                        = $request['design'];
            $pmodel->placement                                     = $request['placement'];
            $pmodel->price                                         = $request['price'];
            $pmodel->deposit                                       = $request['deposit'];
            $pmodel->tips                                          = $request['tips'];
            $pmodel->fees                                          = $request['fees'];
            $pmodel->total_due                                     = $request['total_due'];
            $pmodel->payment_method                                = $request['payment_method'];
            $pmodel->bill_image                                    = $path;
        $pmodel->save();

        return redirect()->back()->with('message', 'Tatto added successfully.');
    }

    public function editpaymentForm(Request $request,$id){
        $payments = PaymentModel::where('id',decrypt($id))->first();
        return view('admin.payment.edit',compact('payments'));
    }

    public function editpaymentPost(Request $request,$id){
        $this->validate($request, [
            'artist_name'          => 'required',
            'customers_name'       => 'required',
            'design'               => 'required',
            'price'                => 'required'
        ],[
            'artist_name.required' => 'Please enter artist name',
            'customers_name.required' => 'Please enter customer name',
            'design.required' => 'Please enter Design',
            'price.required' => 'Please enter price',
            'banner_url.required' => 'Please enter banner url'
        ]);

        if(Auth::guard('artists')->check()){
            $userid = Auth::guard('artists')->user()->id;
        }else{
            $userid = Auth::user()->id;
        }


        if ($request->hasFile('bill_image')) {
            $file = $request->file('bill_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/DepositSlip/',$filename);
            $path =  Storage::url('public/DepositSlip/'.$filename);
        }else{
            if($request->old_image_path !=''){
                $path = $request->old_image_path;
            }else{
                $path = '';
            }
        }

        $pmodel = PaymentModel::find(decrypt($id));
            $pmodel->user_id                                       = $userid;
            $pmodel->date                                          = date('Y-m-d');
            $pmodel->artist_name                                   = $request->input('artist_name');
            $pmodel->customers_name                                = $request->input('customers_name');
            $pmodel->design                                        = $request->input('design');
            $pmodel->placement                                     = $request->input('placement');
            $pmodel->price                                         = $request->input('price');
            $pmodel->deposit                                       = $request->input('deposit');
            $pmodel->tips                                          = $request->input('tips');
            $pmodel->fees                                          = $request->input('fees');
            $pmodel->total_due                                     = $request->input('total_due');
            $pmodel->payment_method                                = $request->input('payment_method');
            $pmodel->bill_image                                    = $path;
        $pmodel->save();
        return redirect()->back()->with('message', 'Payment updated successfully.');


    }

    public function deletepaymentForm(Request $request,$id){
        $pmodel = PaymentModel::find(decrypt($id));
        $pmodel->delete();
        return back()->with('msg', 'Record deleted successfully.');
    }


}
