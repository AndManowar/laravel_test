<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 03.05.18
 * Time: 12:48
 */

/**
 * @var integer $id
 */

$route = url('/admin/handbook/save-data/' . $id);
?>
@extends('layouts.admin.main')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>

            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form" method="post" id="handbook_data_form" action="{{$route}}"
                          data-action="{{$route}}" data-id="<?= $id ?>">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section"><i class="icon-align-center2"></i> Данные справочника</h4>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Сохранить
                                </button>
                                <a href="{{url('/admin/handbook/form/'.$id)}}" class="btn btn-success">Структура
                                    справочника</a>
                                <a href="" class="btn btn-success pull-right add_new_data_field"><i
                                            class="icon-plus4"></i></a>
                            </div>
                            <div class="row data_fields"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/handbook.js') }}" type="text/javascript"></script>
@stop

