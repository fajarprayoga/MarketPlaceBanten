<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banten;
use App\Upakara;
use App\Pengayah;
use App\Pembeli;
use App\Order;
use App\Benner;
use Session;
use App\BuktiBayar;
use App\KalenderUpakara;

use Illuminate\Support\Facades\Hash;
use Encore\Admin\Form;



class SiteController extends Controller
{
    public function index()
    {
    	$bantens = Banten::orderBy('id','desc')->get();
    	$upakaras = Upakara::all();
    	$pengayah = Pengayah::limit(3)->get();
        $benners = Benner::where('active',1)->get();

    	return view('welcome',compact('bantens','upakaras','pengayah','benners'));
    }

    public function febanten()
    {
    	$bantens = Banten::all();
    	return view('banten',compact('bantens'));
    }

    public function feregister()
    {
        return view('feregister');
    }

    public function postregister(Request $request)
    {
       
        $ret_status = array(
            'status' => false,
            'data' => array(),
            'message' => 'Post data gagal'

        );
        
        // if($request->ajax()){
        //     $new_data = $request->input('data');
        //     $pembeli = new Pembeli;
        //     $pembeli->name = $new_data["name"];
        //     $pembeli->email = $new_data["email"];
        //     $pembeli->phone_no = $new_data["phone_no"];
        //     $pembeli->address = $new_data["address"];
        //     $pembeli->password = Hash::make($new_data["password"]);
        //     $pembeli->save();

        //     if ($request->hasFile('origin_image')) {
        //         $image = $request->file('origin_image');
        //         $name = time().'.'.$image->getClientOriginalExtension();
        //         $destinationPath = public_path('/images');
        //         $image->move($destinationPath, $name);
                
        //         $pembeli->avatar_image = $name;
        //         $pembeli->save();
        //     }
            
        //     if($pembeli){
        //         $ret_status = array(
        //             'status' => true,
        //             'data' => $pembeli,
        //             'message' => 'Post data berhasil',
        //             'redirect_url' => url('/')

        //         );

        //         session(['pembeli' => $pembeli]);
        //     }

        //     return json_encode($ret_status);
        if($request->pembeli_id == ''){
            // dd($request->all());
            $pembeli = new Pembeli;
            $pembeli->name = $request->name;
            $pembeli->email = $request->email;
            $pembeli->phone_no = $request->phone_no;
            $pembeli->address = $request->address;
            $pembeli->password = Hash::make($request->password);
            $pembeli->save();

           

        }else{
            $pembeli = Pembeli::find($request->pembeli_id);
            $pembeli->name = $request->name;
            $pembeli->email = $request->email;
            $pembeli->phone_no = $request->phone;
            $pembeli->address = $request->address;
            $pembeli->password = Hash::make($request->password);
            $pembeli->update();

        //     if ($request->hasFile('origin_image')) {
        //         $image = $request->file('origin_image');
        //         $name = time().'.'.$image->getClientOriginalExtension();
        //         $destinationPath = public_path('/images');
        //         $image->move($destinationPath, $name);
                
        //         $pembeli->avatar_image = $name;
        //         $pembeli->save();
        //     }

        //     session(['pembeli' => $pembeli]);

        //     return redirect('/');
        }
        if ($request->hasFile('origin_image')) {
            // $image = $request->file('origin_image');
            // $name = time().'.'.$image->getClientOriginalExtension();
            // $destinationPath = public_path('/images');
            // $image->move($destinationPath, $name);

            $images = $request->file('origin_image');
            $old_name = pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($images->getClientOriginalName(), PATHINFO_EXTENSION);
            $new_name = $old_name."-".time().'.'.$images->getClientOriginalExtension();

            $images->move(public_path('images'),$new_name);
            
            $pembeli->origin_image = $new_name;
            $pembeli->save();
        }
        session(['pembeli' => $pembeli]);

        return redirect('/');
        
    }

    public function loginpembeli()
    {
    	return view('loginfe');
    }

    public function loginpembeli_auth(Request $request)
    {
    	
    	$username = $request->uname;
    	$pwd = $request->pswd;

    	$user = Pembeli::where('email',$username)->first();

    	if(!$user){
			return redirect()->back()->with('msg','User tidak terdaftar');
		}else{
			// dd(Hash::check($request->pin, $user->pin));
			if(!Hash::check($pwd, $user->password)){
				return redirect()->back()->with('msg','User atau password tidak cocok');
			}
		}

		session(['pembeli' => $user]);

		return redirect()->route('fe.order');

    }

    public function logoutpembeli(Request $request)
    {
    	$usersession = session()->get('pembeli');
    	if($usersession){
    		session()->forget('pembeli');
    		return redirect('/');
    	}
    }

    public function editpembeli(Request $request)
    {
        $sessionpembeli = session()->get('pembeli');
        // dd($sessionpembeli);

        return view('editpembeli',compact('sessionpembeli'));
    }

    public function setDateBanten(Request $request)
    {
        $data_date = $request->data;
        $new_datadate = array();
        foreach ((array) $data_date as $ddate) {
           $new_datadate[$ddate['banten_id']] = $ddate['tgl_upakara'];
        }
        
        session(['order_date' => $new_datadate]);

        return true;
    }

    public function feorder($banten_id = null,$pembeli = null)
    {
    	if($banten_id){
            $cek_banten_sess = session()->get('bantens');
            if($cek_banten_sess){
                array_push($cek_banten_sess, $banten_id);
            }else{
                $cek_banten_sess = array($banten_id);
            }
            $order_date = session()->get('order_date');
            $order_bantens = Banten::whereIn('id',$cek_banten_sess)->get();
            // dd($order_bantens); 
            $bantens = array();
            foreach ($order_bantens as $banten) {

               $banten['tgl_upakara'] = (isset($order_date[$banten->id]) ? $order_date[$banten->id] : '');
               array_push($bantens, $banten);
            }
            //set banten baru di session
            session(['bantens' => $cek_banten_sess]);

            return view('feorder',compact('bantens'));
        }

        // if($pembeli){
        //     $list_order = Order::where('pembeli_id',$pembeli)->get();
        //     dd($list_order);
        //     return view('feorder',compact('list_order'));
        // }


        $list_order = array();
        $bukti_bayar = array();
        $pembeli = session()->get('pembeli');
        $history_order = array();
        if(!$pembeli){
            return redirect(route('fe.loginform'));
        }else{
            $list_order = Order::where('pembeli_id',$pembeli->id)
                        // ->where('tgl_upakara','<>',now()->format('Y-m-d'))
                        ->where('status','!=','finish')
                        ->get(); 
            // dd($list_order);
            if($list_order){
                foreach ($list_order as $order) {
                   $cek_image = BuktiBayar::where('order_ids','like','%'.$order->id.'%')->get();
                   if($cek_image){
                    $bukti_bayar = $cek_image->first();
                    break;
                   }
                }
            }

            $history_order = Order::where('pembeli_id',$pembeli->id)->get();
        }


        return view('feorder', compact('list_order','bukti_bayar','history_order'));
    }

    public function fe_postorder(Request $request)
    {
        $ret_status = array(
            'status' => false,
            'data' => array(),
            'message' => 'Post data gagal'

        );
       
        $data_banten = $request->data["bantens"];
        $notes = $request->data["notes"];
        $pembeli = $request->data["pembeli"];

        if($data_banten){

            foreach ($data_banten as $banten) {
                $harga = Banten::find($banten["banten_id"])->harga;
                $order = new Order;
                $order->tgl_order = now()->format('Y-m-d');
                $order->tgl_upakara = $banten["tgl_upakara"];
                $order->tgl_pengambilan = $banten["tgl_pengambilan"];
                $order->banten_id = $banten["banten_id"];
                $order->pembeli_id = $pembeli;
                $order->pengayah = '';
                $order->harga = $harga;
                $order->qty = $banten["qty"];
                $order->notes = $notes;
                $order->status = 'draft';
                $order->save(); 
            }
            session()->forget('bantens');
            $ret_status = array(
                'status' => true,
                'datapembeli' => $pembeli,
                'message' => 'Post berhasil',
                'redirect_url' => route('fe.order',[0,$pembeli])
            );
        }

        return json_encode($ret_status);
    }

    public function upload_bukti(Request $request)
    {
        $retmsg = 'upload bukti bayar gagal';

        // dd($request->all());
        $this->validate($request,[
            'bukti_bayar' => 'required',
            'bukti_bayar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->hasfile('bukti_bayar')){
            $images = $request->file('bukti_bayar');
            $old_name = pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($images->getClientOriginalName(), PATHINFO_EXTENSION);
            $new_name = $old_name."-".time().'.'.$images->getClientOriginalExtension();

            $images->move(public_path('uploads'),$new_name);

            //save data to db
            $bukti_bayar = new BuktiBayar;
            $bukti_bayar->order_ids = $request->input('ids_order');
            $bukti_bayar->images = $new_name;
            $bukti_bayar->save();

            

            $retmsg = 'upload bukti bayar berhasil';
        }


        return redirect()->back()->withErrors(['msg', $retmsg]);
    }

    public function upload_bukti_perrow(Request $request)
    {
        $retmsg = 'upload bukti bayar gagal';

        // dd($request->all());
        $this->validate($request,[
            'bukti_bayar_row' => 'required',
            'bukti_bayar_row.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->hasfile('bukti_bayar_row')){
            $images = $request->file('bukti_bayar_row');
            $old_name = pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($images->getClientOriginalName(), PATHINFO_EXTENSION);
            $new_name = $old_name."-".time().'.'.$images->getClientOriginalExtension();

            $images->move(public_path('uploads'),$new_name);

            $order_row = Order::find($request->order_id);
            if($order_row){
                if($order_row->bukti_bayar != '' || !is_null($order_row->bukti_bayar)){
                    $old_image = public_path('uploads')."\\".$order_row->bukti_bayar;
                    unlink($old_image);
                }
                $order_row->bukti_bayar = $new_name;
                $order_row->save();
            }
            

            $retmsg = 'upload bukti bayar berhasil';
        }


        return redirect()->back()->withErrors(['msg', $retmsg]);
    }

    public function upload_image_pembeli(Request $request)
    {
        $retmsg = 'upload bukti bayar gagal';

        // dd($request->all());
        $this->validate($request,[
            'original_image' => 'required',
            'original_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->hasfile('original_image')){
            $images = $request->file('original_image');
            $old_name = pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($images->getClientOriginalName(), PATHINFO_EXTENSION);
            $new_name = $old_name."-".time().'.'.$images->getClientOriginalExtension();

            $images->move(public_path('uploads'),$new_name);

            //save data to db
            $bukti_bayar = new BuktiBayar;
            $bukti_bayar->order_ids = $request->input('ids_order');
            $bukti_bayar->images = $new_name;
            $bukti_bayar->save();

            

            $retmsg = 'upload bukti bayar berhasil';
        }


        return redirect()->back()->withErrors(['msg', $retmsg]);
    }

    public function fekalender()
    {
        $kalenderupakara = KalenderUpakara::all();
        $eventupakara = array();

        if($kalenderupakara){
            foreach ($kalenderupakara as $event) {
                $newevent = array(
                    'title' => $event->nama_upakara,
                    'start' => $event->tgl_mulai,
                    'end' => $event->tgl_selesai
                );
                array_push($eventupakara, $newevent);
            }
        }
        // dd($eventupakara);
    	return view('kalender',compact('eventupakara'));
    }

    public function viewbanten($banten_id)
    {
        $banten = Banten::find($banten_id);
        return view('view-banten',compact('banten'));
    }

    public function feupakara()
    {
        $upakaras = Upakara::all();
        return view('upakara',compact('upakaras'));
    }

    public function viewupakara($upakara_id)
    {
        $upakara = Upakara::find($upakara_id);
        return view('view-upakara',compact('upakara'));
    }
}
