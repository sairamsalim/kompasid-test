@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
    rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Live Accounts</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">3,897</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>+3.3%</span>
                                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Processed Accounts</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">35,084</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-danger">
                                        <span>-2.8%</span>
                                        <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Approved Accounts</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">89.87%</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>+2.8%</span>
                                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Failed Accounts</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">89.87%</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>+2.8%</span>
                                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                    <h6 class="card-title mb-0">Daily New Approved Accounts</h6>
                </div>
                <div class="row align-items-start mb-2">
                    <div class="col-md-7">
                        <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business has from its
                            normal business activities, usually from the sale of goods and services to customers.</p>
                    </div>
                </div>
                <div id="revenueChart"></div>
            </div>
        </div>
    </div>
</div> <!-- row -->

<div class="row">
    <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Monthly Successful Deposits</h6>
                </div>
                <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in
                    a given time period.</p>
                <div id="monthlySalesChart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Cloud storage</h6>
                    <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                                    class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                        </div>
                    </div>
                </div>
                <div id="storageChart"></div>
                <div class="row mb-3">
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <label
                                class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total
                                storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                            <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                    class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                            <h5 class="fw-bolder mb-0">~5TB</h5>
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary">Upgrade storage</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->
@endsection

@push('plugin-scripts')
<script src="{{ asset('public/assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('public/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('public/assets/js/datepicker.js') }}"></script>
@endpush
