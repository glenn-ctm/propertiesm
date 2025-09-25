@extends('layouts.plain', [ 'title' => 'PDF' ])

@push('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@endpush

@push('css')
    <style type="text/css">
        .page-break {
            page-break-after: always;
        }
        .text-center {
            text-align: center;
        }
        table {
            padding-top: 12px;
            width: 100%;
        }
        .header {
            border-bottom: 1px solid #4786e5;
            color: #4786e5;
            padding: 10px 0 5px;
            font-size: 1.3rem;
        }
        .semibold {
            font-weight: 500;
            width: 30%;
        }
        .title {
            border-bottom: 1px solid #4786e5;
            border-top: 2px solid #4786e5;
            color: #4786e5;
            padding: 3px 0 5px;
        }
        td {
            padding: 8px;
        }
        tr:nth-child(odd) {
            background-color: #f2f2f296;
        }
    </style>

@endpush

@section('body')
    <div class="text-center">
        <img src="{{ $logoSource }}">
        <h2 class="title">Request Details</h2>
    </div>
    <table>
        <tr>
            <td class="semibold">Full Name:</td>
            <td>{{ $repairRequest->user->name }}</td>
        </tr>
        <tr>
            <td class="semibold">PIN:</td>
            <td>{{ $repairRequest->user->pin }}</td>
        </tr>
        <tr>
            <td class="semibold">Contact No.:</td>
            <td>{{ $repairRequest->contact_number }}</td>
        </tr>
        <tr>
            <td class="semibold">Date/Time:</td>
            <td>{{ $repairRequest->created_at->format('m/d/Y - h:i A') }}</td>
        </tr>
        <tr>
            <td class="semibold">Email:</td>
            <td>{{ $repairRequest->user->email }}</td>
        </tr>
        <tr>
            <td class="semibold">Address:</td>
            <td>{{ $repairRequest->address }}</td>
        </tr>
        <tr>
            <td class="semibold">Status:</td>
            <td>{{ $repairRequest->status }}</td>
        </tr>
        <tr>
            <td class="semibold">Further Information:</td>
            <td>{{ $repairRequest->remarks }}</td>
        </tr>
        @if ($admin_comment = $repairRequest->comment)
            <tr>
                <td class="semibold">Admin Comment/s:</td>
                <td>{{ $admin_comment }}</td>
            </tr>
        @endif
    </table>

    @if ( $repairRequest->user->is_property_owner() )
        <div>
            <h3 class="header">Project/Job Description</h3>
        </div>
        <table>
            <tr>
                <td class="semibold">Maintenance:</td>
                <td>{{ is_array($repairRequest->maintenance) ? join(", ", $repairRequest->maintenance) : $repairRequest->maintenance }}</td>
            </tr>
            <tr>
                <td class="semibold">Landscaping:</td>
                <td>{{ is_array($repairRequest->landscaping) ? join(", ", $repairRequest->landscaping) : $repairRequest->landscaping }}</td>
            </tr>
            <tr>
                <td class="semibold">Management Needs:</td>
                <td>{{ is_array($repairRequest->management_needs) ? join(", ", $repairRequest->management_needs) : $repairRequest->management_needs }}</td>
            </tr>
            <tr>
                <td class="semibold">Inspections:</td>
                <td>{{ is_array($repairRequest->inspections) ? join(", ", $repairRequest->inspections) : $repairRequest->inspections }}</td>
            </tr>

        </table>
    @endif

@endsection

