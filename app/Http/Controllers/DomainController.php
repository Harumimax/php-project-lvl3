<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = DB::table('domains')->paginate(10);

        return view('domain.index', compact('domains'));
    }

    public function store(Request $request)
    {
        $chekingDomainName = $request->validate([
            'domain.name' => 'required|url'
        ]);

        $domainFromForm = $request->input('domain.name');
        $domain = strtolower(parse_url($domainFromForm, PHP_URL_HOST));

        $domainExist = DB::table('domains')->where('name', $domain)->first();

        if ($domainExist) {
            $request->session()->flash('flash_message', 'Сайт уже есть в базе данных');

            return redirect()->route('domains.show', $domainExist->id);
        }

        $id = DB::table('domains')->insertGetId([
            'name' => $domain,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        $request->session()->flash('flash_message', 'Сайт проверен, беач!');
        return redirect()->route('domains.show', $id);
    }

    public function show($id)
    {
        $domain = DB::table('domains')->find($id);

        abort_unless($domain, 404);

        $checks = DB::table('url_checks')->where('url_id', $id)->get();

        return view('domain.show', compact('domain'), compact('checks'));
    }
}
