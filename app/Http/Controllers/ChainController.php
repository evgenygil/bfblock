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
use Illuminate\Pagination;

class ChainController extends Controller
{

    public function checkFile()
    {

        $f = 'fdp/chain.bfb';

        $block = null;
        $errors = null;

        $file_handle = fopen($f, "r");
        $n = 1;
        $prev = null;

        while (!feof($file_handle)) {
            $line = fgets($file_handle);

            $cryptedcurhash = json_decode(gzuncompress(Functions::decrypt(preg_split("/;/", $line)[0])))->lunit;
            echo "Current line hash: " . $cryptedcurhash ."<br>";

            if ($prev) {
//                echo "Previous line : " . $prev . "<br><br><br>";
                var_dump("Previos line hash" . preg_split("/;/", $prev));
                echo "<br><br><br>";
            } else echo "Previous line : transaction is first <br><br><br>";


            $prev = $line;
        }

        fclose($file_handle);

    }

    public function view()
    {

        $chain = Chain::all(); // full chain
        $errors = null;        // errors count
        $block = null;         // error block

        for ($i = 1; $i < $chain->count(); $i++) {
            try {
                $cryptedcurhash = json_decode(gzuncompress(Functions::decrypt($chain[$i]->value)))->lunit;
            } catch (\ErrorException $e) {
                $cryptedcurhash = 0;
                $block = $chain[$i];
            }
            if ($cryptedcurhash != $chain[$i - 1]->hash) {
                $block = $chain[$i];
                $errors++;
            }
        }

        return view('chain.view', ['chain' => Chain::OrderBy('Time', 'desc')->paginate(10), 'errors' => $errors, 'block' => $block]);

    }

    public function index()
    {
//        $this->view();

        return view('chain.index');
    }

    public function addtransaction(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'amount' => 'required:number',
                'currency' => 'required',
                'memo' => 'required',
            ]);

            $last = Chain::orderBy('time', 'desc')->first();

            $hash = isset($last) ? $last->hash : '3e0bc5c84f25c3da6697cde2a05ed695';

            $line = '{
                "action": "Transfer",
                "currency": "' . $request->currency . '",
                "value": ' . $request->amount . ',
                "sender": "' . $request->name . '",
                "reciever": "Initial",
                "memo": "' . $request->memo . '",
                "lunit": "' . $hash . '"
            }';

            $crypted = Functions::encrypt(gzcompress($line));

            $options = [
                'cost' => 12,
            ];

            $chain = new Chain();
            $chain->value = $crypted;
            $chain->hash = password_hash($crypted, PASSWORD_BCRYPT, $options);
            $chain->save();

            if (file_exists('./fdp/chain.bfb')) {
                $fp = fopen('./fdp/chain.bfb', 'a');
                fwrite($fp, $crypted . ";" . $chain->hash . "\r\n");
                fclose($fp);
            } else echo "<script type='text/javascript'>alert('Transaction added, but backup chain file not found!');</script>";

        }

        return redirect('chain/view');
    }
}