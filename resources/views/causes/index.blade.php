@extends('layouts.fronted')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> All causes</h4>
                </div>
                <div class="gaadiex-list">
                    @forelse($causes as $cause)
                        <div class="gaadiex-list-item border-b-1">
                            <img style="max-height: 200px" src="{{ asset('/images/causes') . '/' . $cause->featured_image }}">
                            <div class="gaadiex-list-item-text">
                                <h3><a href="/causes/{{ $cause->slug }}"> {{ $cause->title }}</a></h3>
                                <p>Posted on: {{ $cause->created_at->diffForHumans() }}</p>
    {{--                            <h4>Brunch this weekend?</h4>--}}
                                <p>  {{ $cause->description }}</p>
                            </div>
                        </div>
                        <hr />
                    @empty
                        <div class="gaadiex-list-item border-b-1">
                            <p>No causes yet</p>
                        </div>
                    @endforelse
                </div>
                {!! $causes->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
