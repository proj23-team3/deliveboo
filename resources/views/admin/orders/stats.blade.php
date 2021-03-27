@extends('layouts.admin')
@section('chartStat')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('scriptChart')
   <div style="width:1500px;">
       <canvas id="myChart" ></canvas>
   </div>
   
   <script>
    //    Variable apId pass through HomeController@stats
       var apId = {{ $apId }};
       
        $.get('{{ route('orders.index') }}', function(response) {
            //console.log(response);
            var apiDati = response;
            var mesi = [];
            var orderAmount = [];
            apiDati.forEach(order =>{
                if(order.user_id == apId){
                    console.log(order.amount);
                    var newData = new Date(order.delivery_date);
                    // impostare l'ascise indicando l'abbreviazione dei giorni della settimana
                    var monthName = newData.toString().split(' ')[0];

                    // impostare l'ascise indicando l'abbreviazione dei mesi
                    // var monthName = newData.toLocaleString("default", { month: "short" });

                    mesi.push(monthName);
                    
                    var tot = order.amount;
                    orderAmount.push(tot);
                }
                
            });


            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: mesi,
                    datasets: [{
                        label: '€',
                        data: orderAmount,
                        
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            
        });
    
    
    </script>
    @endsection

