@extends('admin.default')

@section('page-header')
    Causes <small>Management</small>
@endsection


@section('content')

    <div class="mB-20">
        <a href="{{ url('/causes') }}" class="btn btn-primary">
            Browse Causes
        </a>
        @can('onlyAdmin', auth()->user())
            <a href="{{ url('/admin/causes/add') }}" class="btn btn-info">
                Add
            </a>
        @endcan
    </div>

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Title</th>
                <th>Target Amount</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Title</th>
                <th>Target Amount</th>
                <th>Actions</th>
            </tr>
            </tfoot>

            <tbody>
            @foreach ($causes as $cause)
                <tr>
                    <td>{{ $cause->title }}</td>
                    <td>{{ $cause->target_amount }}</td>
                    <td>
                        <a href="{{ url('/causes', $cause->slug) }}" class="btn btn-outline-primary">View </a>
                        @can('onlyAdmin', auth()->user())
                            <form action="{{ url('/admin/causes/',$cause->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection
