<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

use App\Models\Preg;
use App\Models\Status;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AmethystCoreController extends Controller
{
    #region FIELDS SETUP
    private $today;
    private $tomorrow;
    private $today_formated;
    private $now;
    #endregion

    #region CONSTRUCTOR
    public function __construct(){
        $this->today = Date('Y-m-d', time());
        $this->tomorrow = date('Y-m-d', strtotime(' +1 day'));
        $this->today_formated = Date('d/m/Y');
        $this->now = Date('H:i');
    }
    #endregion

    #region VIEWS
    public function index(){
        return view('login');
    }

    public function home_view(){

        $pregs_today = count(Preg::all()->where("date", "=", $this->today));
        $pregs_tomorrow = count(Preg::all()->where("date", "=", $this->tomorrow));

        return view('home', ['pregs_today' => $pregs_today, 'pregs_tomorrow' => $pregs_tomorrow]);
    }

    public function manager_view(){

        $fetch_all = DB::table('pregs')->where("date", ">=", $this->today)->paginate(20);
        $fetch_status = Status::all();

        return view('manager', [
            'today_date' => $this->today_formated,
            'time_now' => $this->now,
            'fetch' => $fetch_all,
            'status' => $fetch_status
        ]);
    }

    public function create_view(){
        
        $fetch_status = Status::all();

        return view('create', [
            'today_date' => $this->today_formated,
            'time_now' => $this->now,
            'status' => $fetch_status
        ]);
    }
    #endregion

    #region DATABASE OPERATIONS
    public function preg_create(Request $request){
        $preg = new Preg();
        $preg->uasg = $request->uasg;
        $preg->preg = $request->preg;
        $preg->name = $request->name;
        $preg->type = $request->type;
        $preg->portal = $request->portal;
        $preg->status = $request->status;
        $formated_date = str_replace('/','-',$request->date);
        $formated_date = Carbon::parse($formated_date)->format('Y-m-d');
        $preg->date = $formated_date;
        $preg->time = $request->time;
        $preg->obs = $request->obs;
        $preg->tags = 'disabled';

        $preg->save();
        return redirect('/create')->with('alert', 'Licitação cadastrada com sucesso!');
    }
    #endregion
}
