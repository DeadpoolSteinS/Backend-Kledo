<?php

namespace App\Http\Services;

use App\Models\Setting;

class SettingServices{
  public function changeSetting($request){
    Setting::query()->update(['value' => $request->value]);

    return Setting::where('key', '=', 'overtime_method')->get();
  }
}