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

    public function showTable(Request $request)
    {
      $logAll = AccessLog::all()->take(10000);
      if ($request->kunci == ''){
        $logtable = $logAll;
      } else {
        $logtable = $logAll->where($request->kategori, 'like', $request->kunci);
      }
      
      return DataTables::of($logtable)->make(true);
    }
}
