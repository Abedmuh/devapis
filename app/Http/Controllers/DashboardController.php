<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
      return view('dashboard');
    }

    public function logcount(Request $request) {
      $logAll = AccessLog::all();

      if (isset($request) ? $request : false) {
        if ($request->time == 'By Month') {
          $logAll = AccessLog::where('timestamp', '>', now()
          ->subDays(30)
          ->endOfDay())
          ->where('route', '!=', 'login_ws')
          ->get();
        }
        if ($request->time == 'By Day') {
          $logAll = AccessLog::where('timestamp', '>', now()
          ->subHour(24))
          ->where('route', '!=', 'login_ws')
          ->get();
        }
      }

      $logApi = $logAll->count();
      $logNull = $logAll->where('code',null)->count() ;
      $logSuccess = $logAll->where('code',200)->count();
      $dataBalik = [
        'countApi' => $logApi,
        'countNull' => $logNull,
        'countSuccess' => $logSuccess,
      ];
      return response()->json($dataBalik);
    }

    public function logaccess(Request $request) {
      $logAll = AccessLog::all();

      if (isset($request) ? $request : false) {
        if ($request->time == 'By Month') {
          $logAll = AccessLog::where('timestamp', '>', now()
          ->subDays(30)
          ->endOfDay())
          ->where('route', '!=', 'login_ws')
          ->get();
        }
        if ($request->time == 'By Day') {
          $logAll = AccessLog::where('timestamp', '>', now()
          ->subHour(24))
          ->where('route', '!=', 'login_ws')
          ->get();
        }
      }
    
      $userValue = array();
      foreach ($logAll->groupBy('username')->sortDesc()->take(10)->toArray() as $value) {
        array_push($userValue,count($value));
      }
      $userList = $logAll->groupBy('username')->sortDesc()->keys()->take(10)->toArray();
      
      $serviceValue = array();
      foreach ($logAll->groupBy('route')->sortDesc()->take(10)->toArray() as $value2) {
        array_push($serviceValue,count($value2));
      }
      $serviceList = $logAll->groupBy('route')->sortDesc()->keys()->take(10)->toArray();
      $dataBalik = [
        'userList' => $userList,
        'userValue' => $userValue,
        'serviceList' => $serviceList,
        'serviceValue' => $serviceValue,
        'log' => $logAll
      ];
      return response()->json($dataBalik);
    }

    public function logtime(Request $request) 
    {
      $logAll = AccessLog::all();

      $timeList = $logAll->groupBy(function($date) {
        return Carbon::parse($date->timestamp)->format('Y-m');
      })
      ->sortBy(function ($item, $key) {
        return Carbon::parse($key)->timestamp;
      })
      ->reverse()
      ->take(12)
      ->reverse();

      if (isset($request) ? $request : false) {
        if ($request->time == 'By Month') {
          $logAll = AccessLog::where('timestamp', '>', now()
          ->subDays(30)
          ->endOfDay())
          ->where('route', '!=', 'login_ws')
          ->get();
        
          $timeList = $logAll->groupBy(function($date) {
            return Carbon::parse($date->timestamp)->format('M-d');
          })
          ->sortBy(function ($item, $key) {
            return Carbon::parse($key)->timestamp;
          })
          ->reverse()
          ->take(24)
          ->reverse();
        }
        if ($request->time == 'By Day') {
          $logAll = AccessLog::where('timestamp', '>', now()
          ->subHour(24))
          ->where('route', '!=', 'login_ws')
          ->get();

          $timeList = $logAll->groupBy(function($date) {
            return Carbon::parse($date->timestamp)->format('H:00');
          })
          ->sortBy(function ($item, $key) {
            return Carbon::parse($key)->timestamp;
          })
          ->reverse()
          ->take(24)
          ->reverse();
        }
      }

      $timeValue = array();
      foreach ($timeList as $count) {
        array_push($timeValue,count($count));
      }
      $dataBalik = [
        'timeList' => $timeList->keys()->toArray(),
        'timeValue' => $timeValue,
        'request' => $request->time
      ];
      return response()->json($dataBalik);
    }
    
}
