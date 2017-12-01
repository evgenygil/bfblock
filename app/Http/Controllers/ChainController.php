<?php
/**
 * Created by PhpStorm.
 * User: GilEO
 * Date: 30.11.2017
 * Time: 17:27
 */

namespace App\Http\Controllers;

use App\Chain;
use App\Functions;
use Illuminate\Http\Request;

class ChainController extends Controller
{
    public function index()
    {
        $chain = Chain::all();
        $errors = null;
        $block = null;
        for ($i=1; $i<$chain->count(); $i++) {
            try {
                $cryptedcurhash = json_decode(gzuncompress(Functions::decrypt($chain[$i]->value)))->lunit;
            } catch (\ErrorException $e) {
                $cryptedcurhash = 0;
                $block = $chain[$i];
            }
            if ($cryptedcurhash != $chain[$i-1]->hash) {
                $block = $chain[$i];
                $errors++;
            }
        }
        return view('chain.index', ['chain' => $chain, 'errors' => $errors, 'block' => $block]);
    }

    public function addtransaction(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'amount' => 'required:number',
                'currency' => 'required',
                'todo' => 'required',
            ]);

            $last = Chain::orderBy('time', 'desc')->first();

            $line = '{
                "action": "'.$request->todo.'",
                "currency": "'.$request->currency.'",
                "value": '.$request->amount.',
                "sender": "'.$request->name.'",
                "reciever": "Initial",
                "memo": "simple memo",
                "lunit": "'.$last->hash.'"
            }';
            $crypted = Functions::encrypt(gzcompress($line));

            $chain = new Chain();
            $chain->value = $crypted;
            $chain->hash = md5($crypted);
            $chain->save();

        }

        return redirect('chain');
    }
}