@extends('layout.template')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($points as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->description}}</td>
                        <td>
                            <img src="{{ asset('storage/images/'.$p->image) }}" alt="" width="200" tittle="{{$p->image}}">
                        </td>
                        <td>{{$p->created_at}}</td>
                        <td>{{$p->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
