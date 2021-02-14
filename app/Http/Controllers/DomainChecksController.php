<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DomainChecksController extends Controller
{
    public function store(Request $request, $domainId)
    {
        $id = DB::table('url_checks')->insertGetId([
            'url_id' => $domainId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $request->session()->flash('flash_message', 'Проверка выполнена!');
        return redirect()->route('domains.show', $domainId);
    }
}
