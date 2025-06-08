@extends('layout.template')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header">
            <h4>Data Points</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="pointstable">
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



    <div class="card mt-4">
        <div class="card-header">
            <h4>Data Polylines</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="polylinestable">
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
                    @foreach ($polylines as $p)
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


    <div class="card mt-4">
        <div class="card-header">
            <h4>Data Polygon</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="polygontable">
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
                    @foreach ($polygon as $p)
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

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
<script>
    let tablepoints = new DataTable('#pointstable');
    let tablepolylines = new DataTable('#polylinestable');
    let tablepolygon = new DataTable('#polygontable');
</script>
@endsection
