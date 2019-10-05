<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculator;

class CalculatorController extends Controller
{
    public function __construct(Request $request) {
        
    }

    public function index(Request $request)
    {
        if (!$request->session()->has('calculator')) {
            $calculator = Calculator::create([
                'current' => '',
                'previous' => '',
                'operand' => ''
            ]);

            $request->session()->put('calculator', $calculator->id);
        }

        $calculator = Calculator::find($request->session()->get('calculator'));

        return view('calculator', [
            'calculator' => $calculator->id,
            'current' => $calculator->current
        ]);
    }
}
