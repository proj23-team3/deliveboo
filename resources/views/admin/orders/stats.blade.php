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
//    console.dir(Date);
    
    $.get(`/api/orders?user_id=${apId}`, function(response) {
        //console.log(response);
        var genTot = [];
        var febTot = [];
        var marTot = [];
        var aprTot = [];
        var magTot = [];
        var giuTot = [];
        var lugTot = [];
        var agoTot = [];
        var setTot = [];
        var ottTot = [];
        var novTot = [];
        var dicTot = [];
        var apiDati = response;
        var month = ["gen", "feb", "mar", "apr", "mag", "giu", "lug", "ago", "set", "ott", "nov", "dic"];
        var monthAmount = [];
        var primiAmountMese = [];
        var tot = 0;
        var orderAmount = [];
        var ref = {};
        apiDati.forEach((order,i) =>{
                
            // Change order.delivery_date format with Date Function
            var newData = new Date(order.delivery_date);

            // impostare l'ascisse indicando l'abbreviazione dei giorni della settimana
            // var monthName = newData.toString().split(' ')[0];
            
            // impostare l'ascisse indicando l'abbreviazione dei mesi
            var monthName = newData.toLocaleString("default", { month: "short" });

            
            if (monthName == "gen"){
                genTot.push(order.amount);    
            }else if (monthName == "feb"){
                febTot.push(order.amount);
            }else if (monthName == "mar"){
                marTot.push(order.amount);
            }else if (monthName == "apr"){
                aprTot.push(order.amount);
            }else if (monthName == "mag"){
                magTot.push(order.amount);
            }else if (monthName == "giu"){
                giuTot.push(order.amount);
            }else if (monthName == "lug"){
                lugTot.push(order.amount);
            }else if (monthName == "ago"){
                agoTot.push(order.amount);
            }else if (monthName == "set"){
                setTot.push(order.amount);
            }else if (monthName == "ott"){
                ottTot.push(order.amount);
            }else if (monthName == "nov"){
                novTot.push(order.amount);
            }else if (monthName == "dic"){
                dicTot.push(order.amount);
            }
        });
        
        genTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var genSum = genTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(genSum);     

        febTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var febSum = febTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(febSum);     

        marTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var marSum = marTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(marSum);     

        aprTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var aprSum = aprTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(aprSum);     

        magTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var magSum = magTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(magSum);     

        giuTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var giuSum = giuTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(giuSum);     

        lugTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var lugSum = lugTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(lugSum);     

        agoTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var agoSum = agoTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(agoSum);     

        setTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var setSum = setTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(setSum);     

        ottTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var ottSum = ottTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(ottSum);     

        novTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var novSum = novTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(novSum);     

        dicTot.reduce( (accumulator, currentValue) => accumulator + currentValue, 0 );
        var dicSum = dicTot.reduce(function (accumulator, currentValue) {
        return accumulator + currentValue;
        }, 0);
        monthAmount.push(dicSum);     
        
        console.log(monthAmount);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: month,
                datasets: [{
                    label: '€',
                    data: monthAmount,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        ], 
                        borderWidth: 10   
                }]
            },
            options: {
                tooltips: {
                    mode: 'nearest'
                },
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