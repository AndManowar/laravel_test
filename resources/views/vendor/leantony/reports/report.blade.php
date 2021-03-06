<table class="table">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th scope="col" class="{{ is_callable($column->columnClass) ? call_user_func($column->columnClass) : $column->columnClass }}">
                {{ $column->name }}
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $k => $v)
        <tr>
            @foreach($v as $c)
                <td>
                    {!! $c !!}
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
