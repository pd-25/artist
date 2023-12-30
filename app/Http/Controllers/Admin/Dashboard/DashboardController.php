<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Tattoform;
use PDF;
use Illuminate\Support\Facades\Storage;
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

    function SendLink(Request $request){
        //$data['artist_id'] = request()->segment(2);
        //return view('admin.sendlink.index', $data);

        //$toemail = Auth::user()->email;

        // GET User Details
        $user = User::where('id', $request->userid)->first();
        $toemail =$user->email;
        Mail::send('admin.email.sendlink', ["useremail"=>$user->email,"user_id"=>$user->id,"artist_id"=>$request->artistid], function($message) use ($toemail){
            $message->to($toemail);
            //$message->bcc('test@salesanta.com');
            $message->subject('TATTOO INFORMED CONSENT & MEDICAL HISTORY');
        });

        Quote::where('id', $request->dbid)
        ->update([
            'link_send_status' => '1'
         ]);

        echo "emailsend";

    }

     public function formlinkurl(Request $request){
         $data['user_id'] = request()->segment(2);
         $data['artist_id'] = request()->segment(3);
         return view('admin.sendlink.index',$data);
     }

    public function userformsubmit(Request $request){
        /*
        $this->validate($request, [
            'any_history_of_or_current_conditions_of' => 'required',
            'signature' => 'required|image|mimes:jpeg,png,jpg,gif',
            'driving_licence_front' => 'required|image|mimes:jpeg,png,jpg,gif',
            'driving_licence_back' => 'required|image|mimes:jpeg,png,jpg,gif'
        ],[
            'banner_order.required' => 'Please enter banner order',
            'banner_text_top.required' => 'Please enter banner top text',
            'banner_text_middle.required' => 'Please enter banner middle text',
            'banner_text_buttom.required' => 'Please enter banner buttom text',
            'banner_url.required' => 'Please enter banner url',
            'image.required' => 'Please enter banner image',
        ]);
        */

        // $imageurl = '';
        // if($request->image){
        //     $filename = $request->file('image')->hashname();
        //     $imagelarge = Image::make($request->file('image'))->resize(812, 490);
        //     Storage::disk('s3')->put('banner/image/'.$filename, $imagelarge->stream(), 'public');
        //     $imageurl = Storage::disk('s3')->url('banner/image/'.$filename);
        // }

    	$tatto = new Tattoform();
            $tatto->user_id                                       = $request['user_id'];
            $tatto->artist_id                                     = $request['artist_id'];
			$tatto->general_good_health                           = $request['general_good_health'];
			$tatto->you_under_any_medical_treatment               = $request['you_under_any_medical_treatment'];
			$tatto->you_currently_taking_any_drugs                = $request['you_currently_taking_any_drugs'];
			$tatto->you_have_a_history_of_medication              = $request['you_have_a_history_of_medication'];
			$tatto->you_have_a_history_of_fainting                = $request['you_have_a_history_of_fainting'];
			$tatto->are_you_allergic_to_latex                     = $request['are_you_allergic_to_latex'];
            $tatto->have_any_wounds_healed_slowly                 = $request['have_any_wounds_healed_slowly'];
            $tatto->are_you_allergic_to_any_know_materials        = $request['are_you_allergic_to_any_know_materials'];
            $tatto->any_risk_factors_from_work_or_lifestyle       = $request['any_risk_factors_from_work_or_lifestyle'];
            $tatto->are_you_pregnant_or_nursing                   = $request['are_you_pregnant_or_nursing'];
            $tatto->cardiac_valve_disease                         = $request['cardiac_valve_disease'];
            $tatto->high_blood_pressure                           = $request['high_blood_pressure'];
            $tatto->respiratory_disease                           = $request['respiratory_disease'];
            $tatto->diabetes                                      = $request['diabetes'];
            $tatto->tumors_or_growths                             = $request['tumors_or_growths'];
            $tatto->hemophilia                                    = $request['hemophilia'];
            $tatto->liver_disease                                 = $request['liver_disease'];
            $tatto->bleeding_disorder                             = $request['bleeding_disorder'];
            $tatto->kidney_disease                                = $request['kidney_disease'];
            $tatto->epilepsy                                      = $request['epilepsy'];
            $tatto->jaundice                                      = $request['jaundice'];
            $tatto->exposure_to_aids                              = $request['exposure_to_aids'];
            $tatto->hepatitis                                     = $request['hepatitis'];
            $tatto->venereal_disease                              = $request['venereal_disease'];
            $tatto->herpes_infection_at_proposed_procedure_site   = $request['herpes_infection_at_proposed_procedure_site'];
            $tatto->name                                          = $request['name'];
            $tatto->todaysdate                                    = $request['todaysdate'];
            $tatto->birthdate                                     = $request['birthdate'];
            $tatto->phone                                         = $request['phone'];
            $tatto->address                                       = $request['address'];
            $tatto->stateid                                       = $request['stateid'];
            $tatto->signature                                     = $request['signature'];
            $tatto->driving_licence_front                         = $request['driving_licence_front'];
            $tatto->driving_licence_back                          = $request['driving_licence_back'];
		$tatto->save();

        $data['tattodata'] = Tattoform::where('id', $tatto->id)->first();

        // GET User Details
        $user = User::where('id', $request['user_id'])->first();

        $pdf = PDF::loadView('admin.email.tatto-submited-form', $data);

        //return $pdf->stream('tattoform.pdf'); die;
        $content = $pdf->download()->getOriginalContent();
        $pdfname = time().'.pdf';
        Storage::put('public/tattopdf/'.$pdfname,$content);
        //$path =  Storage::url('public/tattopdf/'.$pdfname);
        $path = asset('storage/tattopdf/'.$pdfname);

        $toemail =$user->email;
        Mail::send('admin.email.view-tatto', ['fullpath'=>$path], function($message) use ($toemail){
            //$message->to($toemail);
            $message->to('biswajitmaityniit@gmail.com');
            //$message->bcc('test@salesanta.com');
            $message->subject('User Tattoo Submitted Data.');
        });


        return redirect()->back()->with('message', 'Tatto added successfully.');
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
