<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:31
 */
?>

@extends('layouts.admin.main')
@section('content')
    <script src="{{ asset('vendor/leantony/grid/js/grid.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('grid_js')
    <div class="card" style="height: 577px;">
        <div class="card-body">
            {!! $grid !!}
        </div>
    </div>
@endsection