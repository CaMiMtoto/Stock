@extends('layouts.master')
@section('title','Reports')
@section('content')
    <section class="content-header">
        <h1>
            Reports
            <small>Main reports</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-info flat">
                    <div class="box-header with-border">
                        <p class=" h3 box-title">Expense report</p>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('expensesReports') }}" target="_blank" class="form-horizontal">
                        <div class="box-body" style="display: block">
                            <div class="col-xs-12">
                                @include('layouts._reportDates')
                            </div>

                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary">
                                <i class="fa fa-print"></i>
                                Generate Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('.mn-reports').addClass('active');
    </script>
@endsection