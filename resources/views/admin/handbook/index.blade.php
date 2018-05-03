<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 9:31
 */
?>

@extends('layouts.admin.main')
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="card" style="height: 577px;">
            <div class="card-body">
                {!! $grid !!}
            </div>
        </div>
    </div>
</div>