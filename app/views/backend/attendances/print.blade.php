<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Attendance Report | Trackr</title>
	<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
	{{ HTML::style('assets/css/bootstrap.min.css') }}

	<style>
	table th, table td {
    text-align: center;
}
	</style>
</head>
<body onload="window.print();">
	<!-- <nav class="navbar square navbar-default hidden-print" role="navigation">
	  <div class="container-fluid">
		Brand and toggle get grouped for better mobile display
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#fakelink">Print Attendance Report</a>
		</div>

		Collect the nav links, forms, and other content for toggling
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <form class="navbar-form navbar-right" role="search">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="From">
			</div>
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="To">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		  </form>

		</div>/.navbar-collapse
	  </div>/.container-fluid
	</nav> -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				{{ HTML::image('assets/img/hsl_logo.png', 'HSL LOGO', ['width' => '300px']) }}
				<h4>Attendance Report</h4>
				<h4>of</h4>
				<h4>Aysi Balmadres</h4>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th width="20%">Date</th>
						<th width="40%">Remarks</th>
						<th width="10%">Status</th>
						<th width="30%">Total Hours</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listOfAttendances as $attendance)
					<tr>
						<td>{{ date('F j, Y', strtotime($attendance['created_at'])) }}</td>
						<td class="text-left">{{ $attendance['remarks'] }}</td>
						<td>{{ $attendance['status'] }}</td>
						<td class="text-center">{{ $attendance['total_hours'] }}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="3" class="text-right">
							<strong>Total Hours</strong>
						</td>
						<td class="text-danger">
							<strong>{{ $accumulatedHours }}</strong>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>