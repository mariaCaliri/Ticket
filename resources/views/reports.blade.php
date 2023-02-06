@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TicketSystem</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>

    #aside {

        height: 94vh;
    }

    /*.highcharts-figure,*/
    /*.highcharts-data-table table {*/
    /*    min-width: 320px;*/
    /*    max-width: 660px;*/
    /*    margin: 1em auto;*/
    /*}*/

    /*.highcharts-data-table table {*/
    /*    font-family: Verdana, sans-serif;*/
    /*    border-collapse: collapse;*/
    /*    border: 1px solid #ebebeb;*/
    /*    margin: 10px auto;*/
    /*    text-align: center;*/
    /*    width: 50%;*/
    /*    max-width: 500px;*/
    /*}*/

</style>

    <script>
         document.addEventListener('DOMContentLoaded', () => {
            const chart = Highcharts.chart('container-chart', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Ticket Risolti'
                },
                xAxis: {
                    categories: ['Aperti', 'Chiusi', 'In attesa']
                },
                yAxis: {
                    title: {
                        text: 'Ultimo mese'
                    }
                },
                series: [{
                    name: 'In attesa',
                    data: [1, 0, 4]
                }, {
                    name: 'Risolti',
                    data: [5, 7, 3]
                }]
            });
            // Data retrieved from https://netmarketshare.com/
// Build the chart
//             Highcharts.chart('container', {
//                 chart: {
//                     plotBackgroundColor: null,
//                     plotBorderWidth: null,
//                     plotShadow: false,
//                     type: 'pie'
//                 },
//                 title: {
//                     text: 'Ticket aperti nel 2022',
//                     align: 'left'
//                 },
//                 tooltip: {
//                     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//                 },
//                 accessibility: {
//                     point: {
//                         valueSuffix: '%'
//                     }
//                 },
//                 plotOptions: {
//                     pie: {
//                         allowPointSelect: true,
//                         cursor: 'pointer',
//                         dataLabels: {
//                             enabled: false
//                         },
//                         showInLegend: true
//                     }
//                 },
//                 series: [{
//                     name: 'Chiusi',
//                     colorByPoint: true,
//                     data: [{
//                         name: 'Chiusi entro 1 settimana',
//                         y: 74.77,
//                         sliced: true,
//                         selected: true
//                     },  {
//                         name: 'Chiusi entro un mese',
//                         y: 12.82
//                     },  {
//                         name: 'Chiusi entro un giorno',
//                         y: 4.63
//                     }, {
//                         name: 'Pendenti',
//                         y: 2.44
//                     }]
//                 }]
//             });
        });
    </script>
</head>
<body>
<div style="padding: 0" id="container" class="container is-fluid">
    <div class="columns">
        <!--barra di navigazione laterale-->
        <div id="aside" class="column is-2 has-background-grey-dark">

            <div class="has-text-centered mt-2">
                <img style="width: 75px; margin-bottom: 50px" src="/img/admin2.png">
            </div>

            <div class="menu">
                <ul class="menu-list has-text-white ">
                    <li style="color: lightsteelblue"><a style="color: lightsteelblue;margin-top: 20px"
                                                         class="has-text-white" href="{{ route('admin.home') }}">
                            <span style="color: lightsteelblue"><i class="fa-solid fa-house-user fa-xl"></i></span style="color: lightsteelblue">
                            Home</a></li>
                    <li>
                    <li>
                        <a style="color: lightsteelblue;"href="{{ route('admin.utente.index') }}"><span class="icon"> <i class=" icon fa-solid fa-users fa-xl"></i></span><span class="name ml-4">Utenti</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;" href="{{ route('admin.operatore.index') }}"><span class="icon"><i class="icon fa-solid fa-users-line  fa-xl"></i> </span><span class="name ml-4">Operatori</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;" href="{{ route('categories.index') }}"><span class="icon"> <i class="icon fa-regular fa-rectangle-list  fa-xl"></i></span><span class="name ml-4">Categorie</span>
                        </a>
                    </li>
                    <li>
                        <a style="color: lightsteelblue;margin-bottom: 20px" href="{{ route('feedback') }}"> <i class="fa-regular fa-comment-dots fa-xl"></i> <span class="name ml-4">Feedback</span></a>
                    </li>



                    <li><a style="color: lightsteelblue;" > <i class="fa-solid fa-gear icon fa-xl"></i><span class="name ml-4">Settings</span></a>
                    </li>
                    <li><a style="color: lightsteelblue;" href="{{ route('reports') }}"> <i class="icon fa-solid fa-chart-line fa-xl"></i><span class="name ml-4">Reports</span>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="column is-10">
        <!-- diagramma-->
        <div class="mt-5" id="container-chart" style="width:100%; height:400px;"></div>
{{--        <div--}}
{{--           id="diagram" style="width: 50%;">--}}
{{--            <figure class="highcharts-figure">--}}
{{--                <div id="container"></div>--}}
{{--                <p class="highcharts-description">--}}
{{--                    Report di risoluzione dei ticket--}}
{{--                </p>--}}
{{--            </figure>--}}
{{--        </div>--}}
        </div>
    </div>
</div>

</body>
</html>
@endsection
