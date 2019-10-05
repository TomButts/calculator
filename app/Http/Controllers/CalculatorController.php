<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculator;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('calculator')) {
            $calculator = Calculator::create([
                'current' => '',
                'previous' => '',
                'operand' => '',
                'memory' => ''
            ]);

            $request->session()->put('calculator', $calculator->id);
        }

        $calculator = Calculator::find($request->session()->get('calculator'));

        // if (!$calculator) {
        //     $request->session()->forget('calculator');
        // }

        return view('calculator', [ 'current' => $calculator->current ]);
    }

    public function append(Request $request, $value)
    {
        $calculator = Calculator::find($request->session()->get('calculator'));
        
        $fields = [
            'current' => $calculator->current . $value
        ];

        if ($calculator->operandActive) {
            $fields = [
                'operandActive' => false,
                'current' => $value
            ];
        }

        $calculator->update($fields);

        return redirect('calculator');
    }

    public function operand(Request $request, $value)
    {
        $calculator = Calculator::find($request->session()->get('calculator'));

        $previous = $calculator->current;

        $calculator->update([
            'previous' => $previous,
            'operand' => $value,
            'operandActive' => true,
        ]);

        return redirect('calculator');
    }

    public function clear(Request $request)
    {
        $calculator = Calculator::find($request->session()->get('calculator'));

        $calculator->update([
            'current' => '',
            'previous' => '',
            'operand' => '',
            'operandActive' => false
        ]);

        return redirect('calculator');
    }

    public function equal(Request $request)
    {
        $calculator = Calculator::find($request->session()->get('calculator'));

        switch ($calculator->operand) {
            case 'add':
                $current = (float) $calculator->previous + (float) $calculator->current;
                break;
            
            default:
                return redirect('calculator');
                break;
        }

        $calculator->update([
            'current' => $current,
            'previous' => '',
            'operand' => '',
            'operandActive' => false
        ]);

        return redirect('calculator');
    }
}
