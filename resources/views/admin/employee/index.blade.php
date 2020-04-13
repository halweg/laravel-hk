@extends('admin.main.layouts')

@section('css')
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>員工列表</h5>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>賬號</th>
                            <th>創建時間</th>
                            <th>上次登錄</th>
                            <th>裝態</th>
                            <th>編輯</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $employees as $key => $employee)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $employee->username }}</td>
                                <td>{{ $employee->created_at }}</td>
                                <td>{{ $employee->last_activity }}</td>
                                <td>{{ $employee->status }}</td>
                                <td>comming soon</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $employees->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
