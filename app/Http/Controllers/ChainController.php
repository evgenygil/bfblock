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

//        $block = null;
        $errors = 0;

        $file_handle = fopen($f, "r");
        $n = 1;
        $prev = null;

        while (!feof($file_handle)) {

            $line = fgets($file_handle);

            if (count($line) > 0) {
                try {
                    $cryptedcurhash = json_decode(gzuncompress(Functions::decrypt(explode("-^-", $line)[0])))->lunit;
                } catch (\ErrorException $e) {
                    $cryptedcurhash = 0;
                }

                if ($prev != null) {
                    if (strcmp($cryptedcurhash, trim((explode("-^-", $prev)[1]), "\r\n")) != 0) {
                        $errors++;
                    }
                }

                $prev = $line;

                $n++;

            }
        }

        fclose($file_handle);

        return $errors;

    }

    public function filltrans() {

        for ($i=0; $i<100; $i++) {
            $last = Chain::orderBy('time', 'desc')->first();

            $hash = isset($last) ? $last->hash : '3e0bc5c84f25c3da6697cde2a05ed695';

            $line = '{
                "action": "Transfer",
                "currency": "RUB",
                "value": ' . rand(1, 20000) . ',
                "sender": "' . rand(1, 50) . '",
                "reciever": "Initial",
                "memo": "' . rand(1, 5000) . '",
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
                fwrite($fp, "\r\n" . $crypted . "-^-" . $chain->hash);
                fclose($fp);
            };

            $i++;
            sleep(2);
        }
    }


    public function view()
    {

        $chain = Chain::all(); // full chain
        $errors = null;        // errors count
        $block = null;         // error block
        $transactions_cnt = $chain->count();

        $start = microtime(true);

        for ($i = 1; $i < $transactions_cnt; $i++) {
            try {
                $cryptedcurhash = json_decode(gzuncompress(Functions::decrypt($chain[$i]->value)))->lunit;
            } catch (\ErrorException $e) {
                $cryptedcurhash = 0;
                $block = $chain[$i];
            }
            if (strcmp($cryptedcurhash, $chain[$i - 1]->hash) != 0) {
                $block = $chain[$i];
                $errors++;
            }
        }

        $filerrors = $this->checkFile();

        $end_time = round(microtime(true) - $start, 4);

        return view('chain.view', ['chain' => Chain::OrderBy('Time', 'desc')->paginate(50), 'errors' => $errors, 'block' => $block, 'time' => $end_time, 'filerrors' => $filerrors, 'count' => $transactions_cnt]);

    }

    public function index()
    {
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
                fwrite($fp, "\r\n" . $crypted . "-^-" . $chain->hash);
                fclose($fp);
            } else echo "<script type='text/javascript'>alert('Transaction added, but backup chain file not found!');</script>";

        }

        return redirect('chain/view');
    }
}