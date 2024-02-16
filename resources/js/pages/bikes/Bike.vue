<script setup></script>

<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Bike</h3>
                    <a to="bike/add" class="btn btn-success float-right btn-sm">
                        Add Bike
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table
                        id="example"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th width="2%">SL</th>
                                <th>Brand</th>
                                <th>Model No</th>
                                <th>Chasis No</th>
                                <th>Engine No</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th width="">Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @foreach($bikes as $bike)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$bike->brand}}</td>
									<td>{{$bike->bike_name}}</td>
									<td>{{$bike->chas_no}}</td>
									<td>{{$bike->engine_no}}</td>
									<td>{{$bike->bquantity}}</td>
									<td>{{$bike->dob}}</td>
									<td><img src="{{asset('/products/'.$bike->image)}}" style="height:150px; width:150px;"/></td>
									<td>
									<div class="d-flex">
										<a href="{{route('bike.edit', $bike->id)}}" class="btn shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

										<form action="{{route('bike.destroy',$bike->id)}}" method="POST">
										@method('DELETE')    
										@csrf
										<button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
										</form>
									</div>
									</td>
									<td><a href="{{route('bike_sale.create', $bike->bike_name)}}" class="btn btn-primary btn-md">Add order</a></td>
								</tr>
							@endforeach  -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
