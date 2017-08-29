<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

	public function upperCase($hey)
	{
		$data['hey'] = strtoupper($hey);
		return view('uppercase',$data);
	}

	public function lowerCase($yo)
	{
		$data['yo'] = strtolower($yo);
		return view('lowercase',$data);
	}

	public function increment($numb)
	{
		$data['numb'] = ++$numb;
		return view('increment',$data);
	}

}