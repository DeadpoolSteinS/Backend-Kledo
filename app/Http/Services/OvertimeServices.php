<?php

namespace App\Http\Services;

use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Reference;
use App\Models\Setting;

class OvertimeServices{
  // ini fungsi jika ref merupakan tabel yang dinamis
    public function getAmountRef($total, $salary){
      $setting = Setting::first()->value;
      $references = Reference::findOrFail($setting)->name;
      $amount = 0;

      switch ($references) {
        case "Salary / 173":
          // bulatkan ke bilangan bulat
          $amount = (int)($salary / 173 * $total);
          break;
        case "Fixed":
          $amount = 10000 * $total;
          break;
        default:
          break;
      }
      return $amount;
    }

    // saya mengatur expression berdasarkan setting.value karena table
    // references tidak akan berubah, namun jika references dapat berubah
    // saya sudah membuatkan fungsi yang lain diatas fungsi ini
    public function getAmount($total, $salary){
      $setting = Setting::first()->value;
      $amount = 0;

      switch ($setting) {
        case 1:
          // bulatkan ke bilangan bulat
          $amount = (int)($salary / 173 * $total);
          break;
        case 2:
          $amount = 10000 * $total;
          break;
        default:
          break;
      }
      return $amount;
    }

    // mengurangkan ended_time dengan started_time dengan pembulatan kebawah
    public function getOvertimeHour($a, $b){
      if((int)substr($a, 3, 2) <= (int)substr($b, 3, 2)){
        return (int)substr($b, 0, 2) - (int)substr($a, 0, 2);
      }
      else{
        return (int)substr($b, 0, 2) - (int)substr($a, 0, 2) - 1;
      }
    }

    public function getCalculateOvertime($month){
      $employees = Employee::all();

        for($i = 0; $i < count($employees); $i++){
          $data = Overtime::where([['employee_id', '=', $employees[$i]->id], ['date', 'like', $month . '%']])->get(['id', 'date', 'time_started', 'time_ended']);

          $total = 0;
          for($j = 0; $j < count($data); $j++){
            $data[$j]->overtime_duration = $this->getOvertimeHour($data[$j]->time_started, $data[$j]->time_ended);
            $total += $data[$j]->overtime_duration;
          }

          $employees[$i]->overtimes = $data;
          $employees[$i]->overtime_duration_total = $total;
          $employees[$i]->amount = $this->getAmount($total, $employees[$i]->salary);
        }
      return $employees;
    }

    public function createOvertime($request){
      $employee = Overtime::create([
          'employee_id'  => $request->employee_id,
          'date'         => $request->date,
          'time_started' => $request->time_started,
          'time_ended'   => $request->time_ended
        ]);

        return Overtime::where('id', '=', $employee->id)->get();
    }
}