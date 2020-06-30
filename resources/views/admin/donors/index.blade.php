@extends('admin.default')

@section('page-header')
    Causes <small>Management</small>
@endsection


@section('content')
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>NID</th>
                <th>Location</th>
                <th>Phone No</th>
                <th>Action</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>NID</th>
                <th>Location</th>
                <th>Phone No</th>
                <th>Action</th>
            </tr>
            </tfoot>

            <tbody>
            @foreach ($donors as $donor)
                <tr>
                    <td>{{ $donor->name }}</td>
                    <td>{{ $donor->email }}</td>
                    <td>{{ $donor->nid }}</td>
                    <td>{{ $donor->location }}</td>
                    <td>{{ $donor->phone_no }}</td>
                    <td>
                        <form action="{{ route('admin.donors.delete', $donor->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection
