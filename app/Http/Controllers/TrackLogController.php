<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrackLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $logAll = AccessLog::all();
      if (request('search')) {
        $logtable = $logAll->where(request('kategori'), 'like', request('search'));
        $loglist = $logtable->groupBy('username')->sortDesc()->keys()->take(10)->toArray();
        $loglistcount = array();
        foreach ($logtable->groupBy('username')->sortDesc()->take(10)->toArray() as $value) {
          array_push($loglistcount,count($value));
        }
      } else {
        $logtable = $logAll;
        $loglist = $logAll->groupBy('route')->sortDesc()->keys()->take(10)->toArray();
        $loglistcount = array();
        foreach ($logAll->where('route', '!=', 'login_ws')->groupBy('route')->sortDesc()->take(10)->toArray() as $value) {
          array_push($loglistcount,count($value));
        }
      }
      
      return view('tracklog',[
        'logtable' => $logtable,
        'loglist' => $loglist,
        'loglistcount' => $loglistcount
      ]);
    }
    
    // showing the tracklog route
    public function index2()
    {
      return view('tracklog');
    }

    // chart table show
    public function showChart(Request $request) {
      $logAll = AccessLog::all();
      $logtable = $logAll->where($request->kategori, 'like', $request->kunci);
      $loglist = $logtable->groupBy($request->alterkategori)->sortDesc()->keys()->take(10)->toArray();
      $loglistcount = array();
      foreach ($logtable->groupBy($request->alterkategori)->sortDesc()->take(10)->toArray() as $value) {
        array_push($loglistcount,count($value));
      }
      $databalik = [
        'list' => $loglist,
        'value' => $loglistcount
      ];
      return response()->json($databalik);
    }
    /**
     * Display the specified resource.
     */
    public function allLog()
    {
      $data = AccessLog::all();
      return response()->json($data);
    }


    public function showTable(Request $request)
    {
      $logAll = AccessLog::all()->take(100);
      if ($request->kunci == ''){
        $logtable = $logAll;
      } else {
        $logtable = $logAll->where($request->kategori, 'like', $request->kunci);
      }
      
      return DataTables::of($logtable)->make(true);
    }

    // chart on tracklog
    public function showfew()
    {
      $data = AccessLog::all()->take(100);
      return response()->json($data);
    }
    
}
