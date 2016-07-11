@extends('power-management.common.admin')

@section('module-title', 'User')
@section('module-subtitle', 'The website\'s user manage')
@section('module-breadcrumb', 'User')

@section('module-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>

                    <div class="box-tools">
                        <form action="{{ route('power-m.admin.member.user.index') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ $request->query('search') }}">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th width="75px">ID</th>
                            <th>Name</th>
                            <th width="200px">Email</th>
                            <th width="120px">Created At</th>
                            <th width="180px">Action</th>
                        </tr>
                        @forelse($collection as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                            <td><a class="btn btn-xs btn-primary">edit</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; font-weight: bold; font-style: italic;">No data</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
                <!-- /.box-body -->
                @if(!$collection->isEmpty() && $collection->count() > \ActLoudBur\PowerManagement\Http\BaseController::PER_PAGE)
                <div class="box-footer clearfix">
                    {!! $collection->render() !!}
                </div>
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection