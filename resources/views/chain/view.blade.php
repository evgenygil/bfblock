@extends('layouts.app')

@section('content')

    @php($time_start = microtime(true))
    <div>
        <h6>Chain status: {{$errors ? 'Error in blocks: ' . (($block->id)-1) . '->' . $block->id : 'OK'}}</h6>
        <p class="small" style="color: lightgray">checked in {{round(((microtime(true) - $time_start)*1000),5)}} s</p>
    </div>
    <div class="flex-lg-row">
        <h5>Add transaction</h5>
        <div class="col-lg-6">
            @include('chain._trform')
        </div>
        <div class="col-lg-6">
            &nbsp;
        </div>
    </div>
    <div class="flex-lg-row">
        <h5>Chain transactions</h5>
        <div class="col-lg-12">
            <table class="table table-striped small table-condensed">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Value</th>
                    <th>Hash</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @if (count($chain) > 0)
                    @foreach($chain as $chaintr)
                        <tr>
                            <td style="padding: 4px !important; text-align: center">{{$chaintr->id}}</td>
                            <td style="padding: 4px !important;">{{substr($chaintr->value, 0, 60) . ' ... ' . substr($chaintr->value, strlen($chaintr->value)-20, strlen($chaintr->value))}}
                                <br><span style="font-size: 9px; color: grey">{{ $errors ? 'Error uncompression' : gzuncompress(\App\Functions::decrypt($chaintr->value))}}</span>
                            </td>
                            <td style="padding: 4px !important;">{{$chaintr->hash}}</td>
                            <td style="padding: 4px !important;">{{$chaintr->time}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $chain->links() }}
        </div>
    </div>

@stop