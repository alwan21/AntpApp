<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\MstPemasukan;
use App\Models\MstPengeluaran;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function index(){
        return view('signin',[
            'title' => 'Login'
        ]);
    }

    public function signin(){
        return view('signin',[
            'title' => 'Login'
        ]);
    }

    public function signup(){
        return view('signup',[
            'title' => 'Signup'
        ]);
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'contact' => 'required|min:10|max:13',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['role'] = 'user';
        $validatedData['status'] = 1;
        // dd($validatedData);
        User::create($validatedData);
        return redirect('/signin')->with('success', 'Registration successfull! Please login!');
    }
    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'email:dns|required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    // public function dashboard(){
    //     return view('dashboard',[
    //         'title' => 'Dashboard'
    //     ]);
    // }

    public function signout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/signin');
    }

    public function dashboard(){

        $pemasukanBulanIni      = MstPemasukan::whereMonth('tanggal', date('m'))
                                ->where('batal', 0)
                                ->get()
                                ->sum('total');
        $pemasukanBulanKemarin  = MstPemasukan::whereMonth('tanggal', date('m', strtotime('-1 month')))
                                ->where('batal', 0)
                                ->get()
                                ->sum('total');
        $pemasukanAll           = MstPemasukan::where('batal',0)->sum('total'); 
        $pengeluaranBulanIni    = MstPengeluaran::whereMonth('tanggal',date('m'))
                                ->where('batal',0)
                                ->get()
                                ->sum('total');
        $pengeluaranBulanKemarin    = MstPengeluaran::whereMonth('tanggal', date('m', strtotime('-1 month')))
                                    ->where('batal',0)
                                    ->get()
                                    ->sum('total');
        $pengeluaranAll = MstPengeluaran::where('batal',0)->sum('total');
        
        $profitBulanIni = number_format($pemasukanBulanIni - $pengeluaranBulanIni,0);
        $profitBulanKemarin = number_format($pemasukanBulanKemarin - $pengeluaranBulanKemarin,0);
        $profitAll = number_format($pemasukanAll - $pengeluaranAll,0);
        return view('dashboard',[
            'title' => 'Dashboard',
            'profitBulanIni' => $profitBulanIni,
            'profitBulanKemarin' => $profitBulanKemarin,
            'profitAll' => $profitAll

        ]);
    }

}


?>