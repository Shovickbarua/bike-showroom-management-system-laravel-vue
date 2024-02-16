<script setup></script>

<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Income</h3>
                    <Link
                        to="income/add"
                        class="btn btn-success float-right btn-sm"
                        >Add Income</Link
                    >
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table
                        id="example1"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th width="7%">Serial</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th width="17%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @foreach($incomes as $income)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$income->in_name}}</td>
									<td>{{$income->amount}}</td>
									<td>{{$income->dob}}</td>
									<td>
                  				<div class="d-flex">
									<a href="{{route('income.edit', $income->id)}}" class="btn shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
									<form action="{{route('income.destroy',$income->id)}}" method="POST">
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
    </div>
</template>
