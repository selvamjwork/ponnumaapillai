public function castewisereport(Request $request)
{ 
    $caste = caste::orderBy('caste_name','ASC')->get();
    $admin = Subadmin::orderBy('id','ASC')->get();
    $users = [];
    $user = [];
    $usermcount = [];
    $userArr = [];
    foreach ($admin as $key => $value) {
        $users[(int)$key] = User::where('payment_completed','=','1')->where('admin_id',$value->id)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
        });
    }
    foreach ($users as $key => $value) {
        $user[(int)$key] = $value;
    }
    dd($user);
    foreach ($users as $key => $value) {
        $usermcount[(int)$key] = count($value);
    }
    for($i = 1; $i <= 31; $i++){
        if(!empty($usermcount[$i])){
            $userArr[$i] = $usermcount[$i];
        }else{
            $userArr[$i] = 0;    
        }
    }     
    return view('admin.dashboard.castewisereport',compact(['userArr','caste','admin']));
}