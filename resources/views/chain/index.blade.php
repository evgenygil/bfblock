@php($time_start = microtime(true))
<div style="font-family: 'Courier New'; font-size: 28px">Chain status: {{$errors ? 'Error in blocks: ' . (($block->id)-1) . '->' . $block->id : 'OK'}}</div>
<p style="font-family: 'Courier New'; font-size: 18px">checked in {{round(((microtime(true) - $time_start)*1000),5)}}
    s</p>
<div>

    <form method="post" action="/chain/add" enctype="multipart/form-data">
        <label for="name">name</label><input type="text" name="name" id="name"><br>
        <label for="amount">amount</label><input type="number" name="amount" id="amount"><br>
        <label for="currency">currency</label><input type="text" name="currency" id="currency"><br>
        <label for="todo">todo</label><input type="text" name="todo" id="todo">
        <input type="submit" value="add">
    </form>

</div>
<div>
    <table style="font-size: 12px; font-family: 'Courier New'; border: 1px dashed #ccc; padding: 0; margin: 0">
        <thead>
            <th>id</th>
            <th>value</th>
            <th>hash</th>
            <th>time</th>
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