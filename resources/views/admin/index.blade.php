@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12">
		<h3 style="font-family: KanitExtraLight; " class="mt-3 mb-3">ภาพรวม</h3>
	</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3>{{ $members }}</h3>
					<p>User Registrations</p>
				</div>
				<div class="icon">
					<i class="fas fa-users"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3>{{ $shoppinglist }}</h3>
					<p>Shopping List</p>
				</div>
				<div class="icon">
					<i class="fas fa-tags"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3>{{ $psubmission }}</h3>
					<p>Proposal Submission</p>
				</div>
				<div class="icon">
					<i class="fas fa-file-alt"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>{{ $news }}</h3>
					<p>News</p>
				</div>
				<div class="icon">
					<i class="far fa-newspaper"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</div>
@endsection