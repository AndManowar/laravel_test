<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 03.05.18
 * Time: 15:34
 */

/**
 * @var integer $id
 * @var integer $index
 * @var array $relatedData
 * @var array $additionalFields
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
                    <li><a href="" class="remove_data-item"><i class="icon-cross2"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">
                <input type="hidden" name="data[<?= $index ?>][handbook_id]" value="<?= $id ?>">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data-<?=$index?>-value">Значение</label>
                        <input type="text" id="data-<?=$index?>-value" class="form-control"
                               placeholder="Значение" name="data[<?= $index ?>][value]"
                               value="">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data-<?=$index?>-title">Описание</label>
                        <input type="text" id="data-<?=$index?>-title" class="form-control"
                               placeholder="Описание" name="data[<?= $index ?>][title]"
                               value="">
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
                                @foreach($relatedData as $item)
                                    <option value="{{$item->data_id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                @endif
                @if($additionalFields)
                    @php $count = round(12/count($additionalFields)); @endphp
                    <div class="col-md-12 data-item">
                        <div class="card">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    @foreach($additionalFields as $field)
                                        <div class="col-md-<?= $count ?>">
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