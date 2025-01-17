@extends('Admin.layout.main')
@section('title')
    Userlist
@endsection
@section('mainSection')
    <main class="content">

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3>User List</h3>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i
                                            data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item active"> User List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- Zero Configuration  Starts-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5>Zero Configuration</h5><span>DataTables has most features enabled by default, so all you
                                    need to do to use it with your own tables is to call the construction
                                    function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging
                                    goodness will be immediately added to the table, as shown in this example.</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="basic-1">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>password</th>
                                                <th>date as time</th>                                            
                                            </tr>
                                        </thead>
                                      <tbody>
                                        @foreach ($userlist as $user )
                                        <tr>
                                        <td>{{$user -> id}}</td>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> email}}</td>
                                        <td>{{$user -> mobile}}</td>
                                        <td>{{$user -> password}}</td>
                                        <td>{{$user -> created_at}}</td>  
                                        </tr>                                 
                                        @endforeach                                       
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
@endsection
