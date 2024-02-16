<script setup></script>

<template>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Category</h3>
                <Link
                    to="categories/add"
                    class="btn btn-success float-right btn-sm"
                >
                    <i class="fa fa-plus-circle"></i> Add Category
                </Link>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="7%">Serial</th>
                            <th>Name</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @foreach($categories as $category)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$category->cat_name}}</td>
								
									<td>
									<div class="d-flex">
										<a href="{{route('category.edit', $category->id)}}" class="btn shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

										<form action="{{route('category.destroy',$category->id)}}" method="POST">
										@method('DELETE')    
										@csrf
										<button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
										</form>
									</div>
									</td>
								
							</tr>
							@endforeach  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
