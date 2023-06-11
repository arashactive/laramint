@extends('layouts.admin')


@section("content")


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

<div>
    <div class="card">
        <div class="card-header">
            <h3>@lang('Student Documents')</h3>
        </div>
    </div>
    <div class="row mt-4 mb-4">

        <div class="col-12">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    
		<div class="card">
			<div class="card-body">
				<div class="chart-container">
    <div class="pie-chart-container">
      <canvas id="pie-chart"></canvas>
    </div>
  </div>
			</div>
		</div>
	
                    @if($total_applications > 0)
                    <div class="m-1">
                        <span class="badge badge-pill badge-default"> {{ $total_applications }}</span>
                    </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('department.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                        {{ __('Total Applications') }}
                    </a>
                </div>
            </div>
        </div>



        

        




    </div>


    
    </div>
</div>





<script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Mobile/Email Registered",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>
@endsection