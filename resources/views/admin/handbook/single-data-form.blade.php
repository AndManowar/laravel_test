<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 03.05.18
 * Time: 15:34
 */

/**
 * @var \App\Components\Handbook\Models\Handbook $handbook
 * @var integer $index
 * @var array $relatedData
 * @var array $additionalFields
 * @var \App\Components\Handbook\Models\HandbookData $data
 */
?>


<div class="col-md-12 data-item">
    <hr>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">#{{$index + 1}}</h4>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a href="" class="remove_data-item" data-id="<?= $data != null ? $data->id : null?>"
                           data-url="{{route('admin.handbook.delete-data-item')}}"
                           data-confirm="Вы уверенны что хотите безвозвратно удалить запись?"><i
                                    class="icon-cross2"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">
                <input type="hidden" name="data[<?= $index ?>][handbook_id]" value="<?= $handbook->id ?>">
                @if($data != null)
                    <input type="hidden" name="data[<?= $index ?>][id]" value="<?= $data->id ?>">
                @endif
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data-<?=$index?>-data_id">ID</label>
                        <input type="text" id="data-<?=$index?>-data_id" class="form-control"
                               placeholder="ID" name="data[<?= $index ?>][data_id]"
                               value="{{$data != null ? $data->data_id : ''}}">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data-<?=$index?>-value">Значение</label>
                        <input type="text" id="data-<?=$index?>-value" class="form-control"
                               placeholder="Значение" name="data[<?= $index ?>][value]"
                               value="{{$data != null ? $data->value : ''}}">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data-<?=$index?>-title">Описание</label>
                        <input type="text" id="data-<?=$index?>-title" class="form-control"
                               placeholder="Описание" name="data[<?= $index ?>][title]"
                               value="{{$data != null ? $data->title : ''}}">
                        <span class="help-block"></span>
                    </div>
                </div>
                @if($relatedData)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="data-<?=$index?>-relation">Родительское значение</label>
                            <select id="data-<?=$index?>-relation" name="data[<?= $index ?>][relation]"
                                    class="form-control"
                                    title="">
                                <option value="" selected>-Родительское значение-</option>
                                @foreach($relatedData as $id => $item)
                                    <option value="{{$id}}" {{ ($data != null ? $data->relation : '') == $id ? 'selected' : ''}} >{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                @endif
                @if($additionalFields)
                    <div class="col-md-12 data-item">
                        <div class="card">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    @foreach($additionalFields as $field)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @php echo $field; @endphp
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>