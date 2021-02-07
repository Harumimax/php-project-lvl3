<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = DB::table('domains')->paginate(10);

        return view('domain.index', compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$domain = new Domain();
        //return view('domain.create', compact('domain'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return view('domain.show', compact('domain'));
    }

    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
