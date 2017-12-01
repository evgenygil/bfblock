@extends('layouts.app')

@section('content')

@php($time_start = microtime(true))
<h4>Chain status: {{$errors ? 'Error in blocks: ' . (($block->id)-1) . '->' . $block->id : 'OK'}}</h4>
<p class="small" style="color: lightgray">checked in {{round(((microtime(true) - $time_start)*1000),5)}} s</p>
<div>
    <h5>Add transaction</h5>
    <div class="col-lg-2">
    <form method="post" action="/chain/add" class="form-group small" enctype="multipart/form-data">
        <label for="name">Name</label><input type="text" class="form-control form-control-sm" name="name" id="name">
        <label for="amount">Amount</label><input type="number" class="form-control form-control-sm" name="amount" id="amount" step="0.01" min="0" max="100000">
        <label for="currency">Currency</label>
        <select class="custom-select form-control form-control-sm" name="currency" id="currency">
            <option>RUB</option>
            <option>USD</option>
            <option>EUR</option>
            <option>CNY</option>
        </select>
        <label for="memo">Memo</label><input type="text" class="form-control  form-control-sm" name="memo" id="memo"><br>
        <input type="submit" class="btn btn-primary btn-sm" style="cursor: pointer" value="Add">
    </form>
    </div>
    <h5>Chain transactions</h5>
<div class="col-lg-12">
    <table class="table small">
        <thead>
            <th>Id</th>
            <th>Value</th>
            <th>Hash</th>
            <th>Time</th>
        </thead>
        @if (count($chain) > 0)
            @foreach($chain as $chaintr)
                <tr>
                    <td>{{$chaintr->id}}</td>
                    <td>{{$chaintr->value}}<br><span style="font-size: 9px; color: grey">{{ $errors ? 'Error uncompression' : gzuncompress(\App\Functions::decrypt($chaintr->value))}}</span></td>
                    <td>{{$chaintr->hash}}</td>
                    <td>{{$chaintr->time}}</td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
</div>

    @stop