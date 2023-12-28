<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
  public function controller()
  {
    $logLastYear = DB::table("access_log")
    ->where('timestamp', '>', now()
    ->subMonth(12)
    ->endOfDay())
    ->get();

    $logLastMonth = $logLastYear->where('timestamp', '>', now()->subDays(30)->endOfDay());
    $logLastDay = $logLastYear->where('timestamp', '>', now()->subHour(24)->endOfDay());

    function userCountList($log,$queryCount) {
      $usercount = array();
      foreach ($log->where('route', '!=', 'login_ws')->groupBy($queryCount)->sortDesc()->take(10)->toArray() as $service) {
        array_push($usercount,count($service));
      }
      return $usercount;
    }

    function userList($user,$queryList) {
      return $user->where('route', '!=', 'login_ws')->groupBy($queryList)->sortDesc()->keys()->take(10)->toArray();
    }

    $yeartimestamp = $logLastYear->groupBy(function($date) {
      return Carbon::parse($date->timestamp)->format('y-m');
    })->reverse()->take(12);
    $monthtimestamp = $logLastYear->groupBy(function($date) {
      return Carbon::parse($date->timestamp)->format('y-m-d');
    })->reverse()->take(24);
    
    $daytimestamp = $logLastYear->groupBy(function($date) {
      return Carbon::parse($date->timestamp)->format('y-m-d H');
    })->reverse()->take(24);

    function filter($counts) {
      $countList = array();
      foreach ($counts as $count) {
        array_push($countList,count($count));
      }
    return $countList;
    }

    $yearTimeList = $yeartimestamp->keys()->toArray();
    $monthTimeList = $monthtimestamp->keys()->toArray();
    $dayTimeList = $daytimestamp->keys()->toArray();

    $yearCountList = filter($yeartimestamp);
    $monthCountList = filter($monthtimestamp);
    $dayCountList = filter($daytimestamp);

    return view('dashboard', [
      'yearUserCount' => userCountList($logLastYear,'username'),
      'monthUserCount' => userCountList($logLastMonth,'username'),
      'dayUserCount' => userCountList($logLastDay,'username'),

      'yearUserlist' => userList($logLastYear,'username'),
      'monthUserlist' => userList($logLastMonth,'username'),
      'dayUserlist' => userList($logLastDay,'username'),

      'yearServiceCount' => userCountList($logLastYear,'route'),
      'monthServiceCount' => userCountList($logLastMonth,'route'),
      'dayServiceCount' => userCountList($logLastDay,'route'),

      'yearServicelist' => userList($logLastYear,'route'),
      'monthServicelist' => userList($logLastMonth,'route'),
      'dayServicelist' => userList($logLastDay,'route'),
      
      'logYear' => $logLastYear,
      'logMonth' => $logLastMonth,
      'logDay' => $logLastDay,

      'yearCountList' => $yearCountList,
      'yearTimeList' => $yearTimeList,

      'monthCountList' => $monthCountList,
      'monthTimeList' => $monthTimeList,
      
      'dayCountList' => $dayCountList,
      'dayTimeList' => $dayTimeList
    ]);
  }
}
