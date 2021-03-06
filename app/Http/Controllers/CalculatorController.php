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

        if (!$calculator) {
            $request->session()->forget('calculator');
        }

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

        if ($calculator->current && $calculator->previous && !$calculator->operandActive) {
            return redirect('calculator/equal')->with('nextOperation', $value);
        }

        $calculator->update([
            'previous' => $calculator->current,
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
        if (!$nextOperation = $request->session()->get('nextOperation')) {
            $nextOperation = '';
        }

        $calculator = Calculator::find($request->session()->get('calculator'));
                
        switch ($calculator->operand) {
            case 'add':
                $current = (float) $calculator->previous + (float) $calculator->current;
                break;
            case 'minus':
                $current = (float) $calculator->previous - (float) $calculator->current;
                break;
            case 'multiply':
                $current = (float) $calculator->previous * (float) $calculator->current;
                break;
            case 'divide':
                if (!$calculator->previous || !$calculator->current) {
                    $current = 0;
                }

                $current = (float) $calculator->previous / (float) $calculator->current;
                break;
            default:
                return redirect('calculator');
                break;
        }

        $calculator->update([
            'current' => $current,
            'previous' => ($nextOperation !== '') ? $current : '',
            'operand' => $nextOperation,
            'operandActive' => ($nextOperation !== '') ? true : false
        ]);

        return redirect('calculator');
    }

    public function updateCurrent(Request $request, $operation)
    {
        $calculator = Calculator::find($request->session()->get('calculator'));

        $current = $calculator->current;

        switch ($operation) {
            case 'percent':
                $current = (float) $calculator->current / 100;
                break;
            case 'sign':
                if (substr($current, 0, 1) === '-') {
                    $current = ltrim($current, '-');
                } else {
                    $current = '-' . $current;
                }
                break;
            case 'point':
                if (strpos($current, '.') === false) {
                    $current .= '.';
                }
                break;
            
            default:
                return redirect('calculator');
                break;
        }

        $calculator->update([ 'current' => $current ]);

        return redirect('calculator');
    }

    public function save(Request $request)
    {
        $calculator = Calculator::find($request->session()->get('calculator'));

        $memory = $calculator->memory;
        $current  = $calculator->current;

        if ($memory == '') {
            $memory = $current;
            $current = '';
        } else {
            $current = $memory;
            $memory = '';
        }

        $calculator->update([
            'memory' => $memory,
            'current' => $current,
        ]);

        return redirect('calculator');
    }
}
