<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Portal;
use App\Models\User;
use App\Models\Rank;

class AmethystAdminCore extends Controller
{
    private $all_status;
    private $all_portals;
    private $all_users;
    private $all_ranks;

    function __construct(){
        $this->all_status = Status::all();
        $this->all_portals = Portal::all();
        $this->all_users = User::all();
        $this->all_ranks = Rank::all();
    }

    //#region VIEWS
    function general_config(){
        return view('config.index');
    }

    function status_config(){

        $status_json = json_encode($this->all_status->toArray());

        if($this->all_status->isEmpty()){
             $this->all_status = null;
        }

        return view('config.status', [
            'status' => $this->all_status,
            'status_json' => $status_json
        ]);
    }

    function portal_config(){

        $portals_json = json_encode($this->all_portals->toArray());

        return view('config.portals',[
            'portal' => $this->all_portals,
            'portal_json' => $portals_json
        ]);
    }

    function user_list_view(){

        if($this->all_users->isEmpty()){
            $this->all_users = null;
        }

        if($this->all_ranks->isEmpty()){
            $this->all_ranks = null;
        }else{
            foreach($this->all_ranks as $ranks){
                $rank_array[$ranks->id] = $ranks->name;
            }
        }

        return view('config.user_list',[
            'users' => $this->all_users,
            'ranks' => $rank_array
        ]);
    }
    //#endregion

    //#region STATUS CRUD
    public function save_status(Request $request)
    {
        $status_array = json_decode($request->statusJson);

        foreach($status_array as $new_status){

            $old_status = Status::get()->where('id', '=', $new_status->id)->first();

            if($new_status->name != $old_status->name || $new_status->color != $old_status->color){
                $old_status->name = $new_status->name;
                $old_status->color = $new_status->color;
                $old_status->save();
            }
        }
        return redirect('/config/status')->with('alert', 'Lista de situações atualizada com sucesso!')->with('type', 'success')->with('aicon', 'check-circle');
    }

    public function delete_status($id)
    {
        $stts = Status::where('id', $id)->first();
        $stts->delete();
        return redirect('/config/status')->with('alert', 'Registro deletado com sucesso!')->with('type', 'danger')->with('aicon', 'trash');
    }

    public function create_status()
    {
        $stts = new Status();
        $stts->name = "Status sem Nome";
        $stts->color = "#000000";
        $stts->save();

        return redirect('/config/status');
    }
    //#endregion

    //#region PORTAL CRUD
    public function save_portal(Request $request)
    {
        $portal_array = json_decode($request->portalJson);

        foreach($portal_array as $new_portals){

            $old_portals = Portal::get()->where('id', '=', $new_portals->id)->first();

            if($new_portals->name != $old_portals->name || $new_portals->base_url != $old_portals->base_url || $new_portals->direct_url != $old_portals->direct_url){
                $old_portals->name = $new_portals->name;
                $old_portals->base_url = $new_portals->base_url;
                $old_portals->direct_url = $new_portals->direct_url;
                $old_portals->save();
            }
        }
        return redirect('/config/portal')->with('alert', 'Lista de situações atualizada com sucesso!')->with('type', 'success')->with('aicon', 'check-circle');
    }

    public function delete_portal($id)
    {
        $portal = Portal::where('id', $id)->first();
        $portal->delete();
        return redirect('/config/portal')->with('alert', 'Registro deletado com sucesso!')->with('type', 'danger')->with('aicon', 'trash');
    }

    public function create_portal()
    {
        $portal = new Portal();
        $portal->name = "";
        $portal->base_url = "";
        $portal->direct_url = "";
        $portal->save();

        return redirect('/config/portal');
    }
    //#endregion

}
