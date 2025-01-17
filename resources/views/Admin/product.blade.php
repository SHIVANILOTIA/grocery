@extends('Admin.layout.main')
@section('title')
    Product List
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
                                <li class="breadcrumb-item"> <a class="home-item" href="index.html">
                                    <i data-feather="home"></i></a></li>
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add_product
                                </button><br><br>
                                <form method="get" action="">
                                    @csrf
                                    <div class="btn-group">
                                        <button type="submit" name="status" value="" class="btn btn-primary">All</button>
                                        <button type="submit" name="status" value="0" class="btn btn-warning">Pending</button>
                                        <button type="submit" name="status" value="1" class="btn btn-success">Active</button>
                                        <button type="submit" name="status" value="2" class="btn btn-danger">Inactive</button>
                                    </div>
                                </form>
                                
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="basic-1">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>sailing</th>
                                                <th>discount</th>
                                                <th>rating</th>
                                                <th>description</th>
                                                <th>status</th>
                                                <th>date as time</th>  
                                                <th>Action</th>                                          
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($showlist as $list)
                                                <tr>                                                                                  
                                                    <td>{{$list->id}}</td>                                  
                                                    <td>{{$list->name}}</td>                                  
                                                    <td>{{$list->category}}</td>                                  
                                                    <td><img src="{{$list->image}}" style="width: 80px; height: auto;"></td> 
                                                    <td>{{$list->sailing}}</td>  
                                                    <td>{{$list->discount}}</td>  
                                                    <td>{{$list->rating}}</td>  
                                                    <td>{{$list->description}}</td>                                                                                                                                                                                                                                               
                                                    <td>@if($list->status == 0)
                                                        Pending
                                                    @elseif ($list->status == 1)
                                                        Active
                                                    @elseif($list->status == 2) 
                                                        Inactive
                                                    @endif   
                                                    </td>                                                                                                                                                                                                                                    
                                                    <td>{{$list->created_at}}</td>  
                                                    <td>                                                       
                                                        @if($list->status == 0)

                                                            <a href="{{url('Active')}}/{{$list->id}}">
                                                                <button class="btn btn-success">Active</button>
                                                            </a>
                                                            
                                                            <a href="{{url('InActive')}}/{{$list->id}}">
                                                                <button class="btn btn-danger">InActive</button>
                                                            </a>
                                                        @elseif ($list->status == 1)
                                                            <a href="{{url('InActive')}}/{{$list->id}}">
                                                                <button class="btn btn-danger">InActive</button>
                                                            </a>
                                                        @elseif ($list->status == 2)
                                                            <a href="{{url('Active')}}/{{$list->id}}">
                                                                <button class="btn btn-success">Active</button>
                                                            </a>
                                                        @endif

                                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatemodel" onclick="edit({{ $list->id }})">Edit</button>
                                                        <a href="{{url('delete')}}/{{$list->id}}" class="btn btn-primary btn-sm">Delete</a>
                                                    </td>                                                                                                                                                                                                                                             
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

        {{-- add product model form--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add_product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- action="{{url('Addproduct')}}" --}}
                    <div class="modal-body">
                        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="addproduct">
                            
                            <label for="product-name">Product Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter product name" class="form-control">
                           
                            <label class="mt-2" for="product-name">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option value="">Select</option>
                                <option value="vagetables">vagetables</option>
                                <option value="seafood">seafood</option>
                                <option value="dairyfarm">dairy farm</option>
                                <option value="fruits">fruits</option>
                                <option value="dietfood">diet food</option>
                                <option value="fastfood">fast food</option>
                                <option value="drinks">drinks</option>
                                <option value="meats">meats</option>
                                <option value="dryfruits">dry fruits</option>
                                <option value="fishes">fishes</option>
                            </select>

                            <label class="mt-2" for="product-name">Product Image</label>
                            <input type="file" id="image" name="image" class="form-control"  accept="image/jpeg, image/png, image/jpg, image/gif">

                            
                        <label class="mt-2" for="product-name">Sailing Price</label>
                        <input type="text" id="sailing" name="sailing" class="form-control" >

                        <label class="mt-2" for="product-name">Discount Price</label>
                        <input type="text" id="discount" name="discount" class="form-control" >

                        <label class="mt-2" for="product-name">Rating</label>
                        <input type="text" id="rating" name="rating" class="form-control" >

                        <label class="mt-2" for="product-name">Description</label>
                        <textarea  type="text" id="description" name="description" class="form-control"  ></textarea>

                            <button   type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


  
        <!-- Modal -->
        <div class="modal fade" id="updatemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('updateproduct')}}" method="POST" enctype="multipart/form-data" id="">
                        @csrf

                        <input type="hidden" id="idfield" name="idfield"  class="form-control">
                        <label for="product-name">Product Name</label>
                        <input type="text" id="Editname" name="Editname" placeholder="Enter product name" class="form-control">
                    
                        <label class="mt-2" for="product-name">Category</label>
                        <select id="category" name="category" class="form-control">
                           
                            <option value="">Select</option>
                            <option value="vagetables">vagetables</option>
                            <option value="seafood">seafood</option>
                            <option value="dairyfarm">dairyfarm</option>
                            <option value="fruits">fruits</option>
                            <option value="dietfood">dietfood</option>
                            <option value="fastfood">fastfood</option>
                            <option value="drinks">drinks</option>
                            <option value="meats">meats</option>
                            <option value="dryfruits">dryfruits</option>
                            <option value="fishes">fishes</option>
                        </select>

                        <label class="mt-2" for="product-name">Product Image</label>
                        <input type="file" id="image" name="image" class="form-control"  accept="image/jpeg, image/png, image/jpg, image/gif">
                    
                        <label class="mt-2" for="product-name">Sailing Price</label>
                        <input type="text" id="sailing" name="sailing" class="form-control" >

                        <label class="mt-2" for="product-name">Discount Price</label>
                        <input type="text" id="discount" name="discount" class="form-control" >

                        <label class="mt-2" for="product-name">Rating</label>
                        <input type="text" id="rating" name="rating" class="form-control" >

                        <label class="mt-2" for="product-name">Description</label>
                        <textarea  type="text" id="description" name="description" class="form-control"  ></textarea>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        
    </main>
@endsection


{{-- ================== footer section ============================================= --}}
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastify JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

<script>
    $(document).ready(function() {
        $('#updateproduct').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
    
            var url = "{{ route('Admin.updateproduct') }}";
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(result) {
                    if (result.status_code === 1) {
                        $('#newexampleModal').modal('hide');
                        $('#updateproduct').trigger("reset");
                       
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",   
                            position: "right",
                            className: "bg-success",
                        }).showToast();
                        // window.location.reload();
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    } else if (result.status_code === 2) {
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            className: "bg-warning",
                        }).showToast();
                    } else {
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            className: "bg-danger",
                        }).showToast();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    Toastify({
                        text: 'An error occurred. Please try again.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        className: "bg-danger",
                    }).showToast();
                }
            });
        });
    });
</script>
{{-- addproduct model  script --}}
<script>
    $(document).ready(function() {
        $('#addproduct').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
    
            var url = "{{ route('Admin.Addproduct') }}";
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(result) {
                    if (result.status_code === 1) {
                        $('#exampleModal').modal('hide');
                        $('#addproduct').trigger("reset");
                       
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",   
                            position: "right",
                            className: "bg-success",
                        }).showToast();
                        // window.location.reload();
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    } else if (result.status_code === 2) {
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            className: "bg-warning",
                        }).showToast();
                    } else {
                        Toastify({
                            text: result.massage,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            className: "bg-danger",
                        }).showToast();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    Toastify({
                        text: 'An error occurred. Please try again.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        className: "bg-danger",
                    }).showToast();
                }
            });
        });
    });
</script>

<script>
    function edit(id)
    {
    $.ajax({
        type:'POST',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('EditProduct') }}",
        data:{ id:id },
        dataType:'json',

        
        success:function(result)
        {   

        var record = result.data;
        $('#idfield').val(record.id);
        $('#Editname').val(record.name);
        $('#category').val(record.category); 

        },
    });
    }
</script>

@endsection
