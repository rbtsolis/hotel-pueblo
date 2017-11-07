<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siteKey = "6Lc4XjcUAAAAAGXikJIDedLrmW3qWj554jgvVYBd";
        $secretKey = "6Lc4XjcUAAAAAJbgluRFiMLLi-C802ZG9NHppaud";
        
        $ip = $request -> ip(); //$_SERVER["REMOTE_ADDR"]; // Revisar
        
        $captcha = $request -> input('g-recaptcha-response');
        
        $name = $request -> name;
        $email = $request -> email;
        $children = $request -> children;
        $adults = $request -> adults;
        $message = $request -> message;
        $check_in = $request -> check_in;
        $check_out = $request -> check_out;
        
        $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip");
        
        $json = json_decode($result, true);
        
        if($json['success'] == 1) {
          echo '{ "success" : true }';
        } else {
          echo '{ "success" : false }';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
