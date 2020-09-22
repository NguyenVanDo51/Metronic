@extends('templates.app')

@push('style')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

@endpush

@section('content')
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR -->
                            <div class="page-toolbar">
                                <!-- BEGIN THEME PANEL -->
                                <div class="btn-group btn-theme-panel">
                                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </a>
                                    <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <h3>THEME COLORS</h3>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <ul class="theme-colors">
                                                            <li class="theme-color theme-color-default"
                                                                data-theme="default">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Default</span>
                                                            </li>
                                                            <li class="theme-color theme-color-blue-hoki"
                                                                data-theme="blue-hoki">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Blue Hoki</span>
                                                            </li>
                                                            <li class="theme-color theme-color-blue-steel"
                                                                data-theme="blue-steel">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Blue Steel</span>
                                                            </li>
                                                            <li class="theme-color theme-color-yellow-orange"
                                                                data-theme="yellow-orange">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Orange</span>
                                                            </li>
                                                            <li class="theme-color theme-color-yellow-crusta"
                                                                data-theme="yellow-crusta">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Yellow Crusta</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <ul class="theme-colors">
                                                            <li class="theme-color theme-color-green-haze"
                                                                data-theme="green-haze">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Green Haze</span>
                                                            </li>
                                                            <li class="theme-color theme-color-red-sunglo"
                                                                data-theme="red-sunglo">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Red Sunglo</span>
                                                            </li>
                                                            <li class="theme-color theme-color-red-intense"
                                                                data-theme="red-intense">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Red Intense</span>
                                                            </li>
                                                            <li class="theme-color theme-color-purple-plum"
                                                                data-theme="purple-plum">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Purple Plum</span>
                                                            </li>
                                                            <li class="theme-color theme-color-purple-studio"
                                                                data-theme="purple-studio">
                                                                <span class="theme-color-view"></span>
                                                                <span class="theme-color-name">Purple Studio</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 seperator">
                                                <h3>LAYOUT</h3>
                                                <ul class="theme-settings">
                                                    <li> Theme Style
                                                        <select
                                                            class="theme-setting theme-setting-style form-control input-sm input-small input-inline tooltips"
                                                            data-original-title="Change theme style"
                                                            data-container="body" data-placement="left">
                                                            <option value="boxed" selected="selected">Square corners
                                                            </option>
                                                            <option value="rounded">Rounded corners</option>
                                                        </select>
                                                    </li>
                                                    <li> Layout
                                                        <select
                                                            class="theme-setting theme-setting-layout form-control input-sm input-small input-inline tooltips"
                                                            data-original-title="Change layout type"
                                                            data-container="body" data-placement="left">
                                                            <option value="boxed" selected="selected">Boxed</option>
                                                            <option value="fluid">Fluid</option>
                                                        </select>
                                                    </li>
                                                    <li> Top Menu Style
                                                        <select
                                                            class="theme-setting theme-setting-top-menu-style form-control input-sm input-small input-inline tooltips"
                                                            data-original-title="Change top menu dropdowns style"
                                                            data-container="body"
                                                            data-placement="left">
                                                            <option value="dark" selected="selected">Dark</option>
                                                            <option value="light">Light</option>
                                                        </select>
                                                    </li>
                                                    <li> Top Menu Mode
                                                        <select
                                                            class="theme-setting theme-setting-top-menu-mode form-control input-sm input-small input-inline tooltips"
                                                            data-original-title="Enable fixed(sticky) top menu"
                                                            data-container="body"
                                                            data-placement="left">
                                                            <option value="fixed">Fixed</option>
                                                            <option value="not-fixed" selected="selected">Not Fixed
                                                            </option>
                                                        </select>
                                                    </li>
                                                    <li> Mega Menu Style
                                                        <select
                                                            class="theme-setting theme-setting-mega-menu-style form-control input-sm input-small input-inline tooltips"
                                                            data-original-title="Change mega menu dropdowns style"
                                                            data-container="body"
                                                            data-placement="left">
                                                            <option value="dark" selected="selected">Dark</option>
                                                            <option value="light">Light</option>
                                                        </select>
                                                    </li>
                                                    <li> Mega Menu Mode
                                                        <select
                                                            class="theme-setting theme-setting-mega-menu-mode form-control input-sm input-small input-inline tooltips"
                                                            data-original-title="Enable fixed(sticky) mega menu"
                                                            data-container="body"
                                                            data-placement="left">
                                                            <option value="fixed" selected="selected">Fixed</option>
                                                            <option value="not-fixed">Not Fixed</option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END THEME PANEL -->
                            </div>
                            <!-- END PAGE TOOLBAR -->
                        </div>
                    </div>
                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE BREADCRUMBS -->
                            <ul class="page-breadcrumb breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Advertiser</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Report Canpaign</span>
                                </li>
                            </ul>
                            <!-- END PAGE BREADCRUMBS -->
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('data')}}" method="GET">
                                        <div class="portlet light">
                                        <div class="portlet-body">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date Range</label>
                                                    <input type="hidden" name="start_date" id="start-date"
                                                           value="{{ $param['start_date'] ?? '20/10/2019'}}">
                                                    <input type="hidden" name="end_date" id="end-date"
                                                           value="{{ $param['end_date'] ?? '20/10/2019' }}">
                                                    <input type="text" class="form-control" id="date-range"
                                                           value="{{ $param['start_date'] }} - {{ $param['end_date'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign IDs</label>
                                                    <div class="input-group input-large">
                                                        <input type="text" class="form-control" name="campaign_id"
                                                               placeholder="ID1, ID2,..."
                                                               value="{{ $param['campaign_id'] }}"
                                                        >
                                                    </div>
                                                    <label class="control-label">Advertiser ID</label>
                                                    <div class="input-group input-large date-picker input-daterange">
                                                        <input type="text" class="form-control" name="advertiser_id"
                                                               placeholder="Advertiser ID"
                                                               value="{{ $param['advertiser_id'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Country Code</label>
                                                <select
                                                    class="form-control" name="country">
                                                    <optgroup label="Country">
                                                        <option value="VN" @if($param['country'] == 'VN') selected @endif>Viet
                                                            Nam
                                                        </option>
                                                        <option value="TH" @if($param['country'] == 'TH') selected @endif>TH
                                                        </option>
                                                    </optgroup>
                                                </select>
                                                <label class="control-label">&nbsp;</label>
                                                <div class="input-group input-large date-picker input-daterange">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet light">
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <i class="icon-settings font-dark"></i>
                                                <span class="caption-subject bold uppercase">Report table</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                    <thead>
                                                    <tr>
                                                        <th> Campaign ID</th>
                                                        <th> Advertiser ID</th>
                                                        <th> Time Created</th>
                                                        <th> Time Submitted</th>
                                                        <th> Delivered</th>
                                                        <th> Clicks</th>
                                                        <th> CTR</th>
                                                        <th> Avg CPC</th>
                                                        <th> Cost</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td> Total</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td> 0</td>
                                                        <td> 0</td>
                                                        <td> 0</td>
                                                        <td> 0</td>
                                                        <td> 0</td>
                                                    </tr>
                                                    @foreach($data as $item)
                                                        <tr>
                                                            <td id="id-copy">
                                                                <div style="width: 23rem">
                                                                    <span>{{ $item['_id'] }}</span>
                                                                    <button class="button inline ui-button-icon-only"
                                                                            id="copy-button"
                                                                            data-clipboard-text="{{ $item['_id'] }}"
                                                                            style="border: none;">
                                                                        <img
                                                                            src="{{ asset('assets/pages/img/copy.png') }}"
                                                                            alt="" width="15" height="15"
                                                                            style="border: none;">
                                                                    </button>
                                                                </div>

                                                            </td>
                                                            <td> {{ $item['campaign_info']['advertiser_id'] ?? ''}} </td>
                                                            <td> {{ date('Y-m-d H:i:s',strtotime($item['campaign_info']['created_at'] ?? ''))}} </td>
                                                            <td> {{ date('Y-m-d H:i:s',strtotime($item['campaign_info']['submitted_at'] ?? ''))}} </td>
                                                            <td> {{ number_format($item['displays'] ?? 0) }} </td>
                                                            <td> {{ number_format($item['clicks'] ?? 0) }} </td>
                                                            <td> @if($item['displays'] != 0)
                                                                    {{ round($item['clicks'] / $item['displays'], 3) }}
                                                                @else
                                                                    0
                                                                @endif
                                                            </td> <!-- CTR -->
                                                            <td> @if($item['clicks'] != 0)
                                                                    {{ round($item['cost'] / $item['clicks'], 3) }}
                                                                @else
                                                                    0
                                                                @endif
                                                            </td> <!-- Avg CPC  -->
                                                            <td> {{ $item['cost'] ?? 0}} </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT BODY -->
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END CONTAINER -->
            </div>
        </div>
        @endsection

@push('script')
    <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"
            type="text/javascript"></script>

    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"
            type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script>

    $('#date-range').daterangepicker({
        startDate: $('#start-date').val(),
        endDate: $('#end-date').val(),
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, function (start, end) {
        $('#start-date').val(start.format('YYYY-MM-DD'))
        $('#end-date').val(end.format('YYYY-MM-DD'))
    });

    (function () {
        new Clipboard('#copy-button');
    })();

    // Mac dinh sort theo submited
    $('#sample_1').dataTable({
        buttons: [
            {extend: "csv", className: "btn yellow-casablanca", text: 'Export'},
            {
                extend: 'collection',
                className: "btn yellow-casablanca",
                text: 'custom',
                buttons: [
                    {extend: 'columnToggle', columns: 0 },
                    {extend: 'columnToggle', columns: 1 },
                    {extend: 'columnToggle', columns: 2 },
                    {extend: 'columnToggle', columns: 3 },
                    {extend: 'columnToggle', columns: 4 },
                    {extend: 'columnToggle', columns: 5 },
                    {extend: 'columnToggle', columns: 6 },
                    {extend: 'columnToggle', columns: 7 },
                    {extend: 'columnToggle', columns: 8 },
                    {extend: 'columnToggle', text: 'All' },
                ]
            }
            ],
        order: [[3, "asc"]],  // cot dc sap xep mac dinh
        lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
        pageLength: 10,  // so rows tren 1 trang
        //
        dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
    })



    </script>
@endpush

