@extends('layouts.plain', [ 'title' => 'PDF' ])

@push('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@endpush

@push('css')
<style>
    table {
        border-collapse: collapse;
        font-size: 14px;
    }

    .text-left {
        text-align: left;
        padding-left: 5px;
    }

    .pl-5 {
        padding-left: 5px;
    }

    .property-info td {
        width: 400px;
    }

    .font-bold {
        font-weight: 600;
    }

    .py-8 {
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .with-border table,
    .with-border th,
    .with-border td {
        border: 0.7px solid #5d5d5d;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .w-full {
        width: 100%;
    }

    .text-center {
        text-align: center;
    }
</style>
@endpush

@section('body')
<table class="property-info">
    <tr>
        <td><span class="font-bold">Property Address:</span> {{$sheet->property_address}}</td>
        <td><span class="font-bold">MM/YYYY:</span> {{$sheet->date->format("m/Y")}}</td>
        <td><span class="font-bold">PIN:</span> {{$user->pin}}</td>
    </tr>
</table>
<div class="with-border" style="margin-top: 30px">
    <table class="w-full text-center">
        <tr style="background-color: #a4cafe;">
            <th rowspan="2">UNIT</th>
            <th colspan="3">RENT</th>
            <th rowspan="2">REPAIRS</th>
            <th rowspan="2">T.L</th>
            <th rowspan="2">SUBC</th>
            <th rowspan="2">COST</th>
            <th colspan="5">INSPECTION</th>
            <th colspan="6">NEW OCCUPANT</th>
            <th colspan="6">EVICTION</th>
        </tr>
        <tr style="background-color: #a4cafe;">
            <th>AMT</th>
            <th>REC</th>
            <th>DELQ</th>
            <th>LCKS</th>
            <th>LEKS</th>
            <th>SEAL</th>
            <th>S.D.</th>
            <th>EXTERM</th>
            <th colspan="6">MM/DD/YYYY</th>
            <th colspan="6">MM/DD/YYYY</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->unit }}</td>
            <td>{{ $item->rents['amt'] }}</td>
            <td>{{ $item->rents['rec'] }}</td>
            <td>{{ $item->rents['delq'] }}</td>
            <td>{{ $item->repairs }}</td>
            <td>{{ $item->tl ? '/' : '' }}</td>
            <td>{{ $item->subc ? '/' : '' }}</td>
            <td>{{ $item->cost }}</td>
            <td>{{ $item->inspection['lcks'] }}</td>
            <td>{{ $item->inspection['leks'] }}</td>
            <td>{{ $item->inspection['seal'] }}</td>
            <td>{{ $item->inspection['sd'] }}</td>
            <td>{{ $item->inspection['extern'] }}</td>
            <td colspan="6">{{ isset($item->new_occupant) ? $item->new_occupant->format('m/d/Y') : '' }}</td>
            <td colspan="6">{{ isset($item->eviction) ? $item->eviction->format('m/d/Y') : '' }}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="3" style="background-color: #0e9f6e; color: #fff">${{ $total['rents'] }}</td>
            <td colspan="4" style="text-align: right;">${{ $total['costs'] }}</td>
            <td colspan="5">${{ $total['inspections'] }}</td>
            <td>LS</td>
            @foreach (['WK', 'WK', 'WK', 'WK'] as $index => $value)
            <td @isset($sheet->ls_per_week[$index]) style="color: #f05252;text-decoration: line-through;" @endisset
                >{{ $value }}</td>
            @endforeach
            <td style="color: #c81e1e">{{ $total['ls_per_week'] }}</td>
            <td>S.C</td>
            @foreach (['WK', 'WK', 'WK', 'WK'] as $index => $value)
            <td @isset($sheet->sc_per_week[$index]) style="color: #f05252;text-decoration: line-through;" @endisset
                >{{ $value }}</td>
            @endforeach
            <td style="color: #c81e1e">{{ $total['sc_per_week'] }}</td>
        </tr>
        <tr class="py-8">
            <td colspan="12" class="text-left pl-5">{{ $sheet->comment }}</td>
            <td colspan="13" class="text-left pl-5">
                <span style="padding-right: 10px; padding-right: 150px">Total</span>
                <span>${{ $all_total }}</span>
            </td>
        </tr>
    </table>
</div>
@endsection
