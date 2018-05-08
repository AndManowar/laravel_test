<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 03.05.18
 * Time: 12:48
 */

/**
 * @var \App\Components\handbook\Models\Handbook $handbook
 * @var array $handbookData
 * @var array $relatedData
 */
$route = route('admin.handbook.save-data', ['id' => $handbook->id]);?>
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
                          data-action="{{$route}}" data-id="<?= $handbook->id ?>" data-url="">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section"><i class="icon-align-center2"></i> Данные справочника</h4>
                            <div class="form-actions">
                                <button type="submit"
                                        class="submit_data_btn btn btn-primary <?= empty($handbookData) ? 'hidden' : '' ?>">
                                    <i class="icon-check2"></i> Сохранить
                                </button>
                                <a href="{{route('admin.handbook.form', ['id' => $handbook->id])}}"
                                   class="btn btn-success">Структура
                                    справочника</a>
                                <a href="" class="btn btn-success pull-right add_new_data_field"><i
                                            class="icon-plus4"></i></a>
                            </div>
                            <div class="row data_fields">
                                @forelse ($handbookData as $index => $dataItem)
                                    @php
                                        echo view('admin.handbook.single-data-form', [
                                        'handbook' => $handbook,
                                        'index' => $index,
                                        'data' => $dataItem,
                                        'relatedData' => $relatedData,
                                        'additionalFields' => (new \App\Components\handbook\Repositories\HandbookRepository())
                                        ->getAdditionalFields($handbook, $index, (array)$dataItem->getDecodedData())
                                        ])
                                    @endphp
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/handbook/handbook.js') }}" type="text/javascript"></script>
@stop

