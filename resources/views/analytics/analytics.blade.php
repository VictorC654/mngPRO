@extends('layout.layout')
@section('style')
    <style>
        .pageControl
        {
            margin-top:-8.5em;
            width:140vh;
            margin-bottom:4em;
            border-bottom:.2em solid rgb(34, 40, 49);
            box-shadow: rgb(34, 40, 49);
            color:white;
            padding:1em;
            display:flex;
            flex-direction: row;
            align-items: center;
        }
    </style>
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <!-- <div style="width: 500px;"><canvas id="dimensions"></canvas></div><br/> -->
    <div class="pageControl">
        <div style="margin-right:1.4em;padding:1.2em;border-right:.2em solid rgb(34, 40, 49);">
            <div style="font-size:1.3em;font-weight:bold;">
                ANALYTICS
            </div>
            <div style="font-size:.7em;letter-spacing:.2em;color:lightgray;">
                TRACK YOUR PROGRESS
            </div>
        </div>
    </div>
    <div style="display:flex;flex-direction:row;margin-top:3em;color:lightgray;font-size:3em;letter-spacing:.1em;font-style:italic;">
{{--        <div style="width:70vh;padding:2em;background-color:rgb(34, 40, 49);border-radius:.5em;height:25em;">--}}
{{--            <canvas id="profitChart"></canvas>--}}
{{--            <script>--}}
{{--                document.addEventListener('DOMContentLoaded', function () {--}}
{{--                    var date = {!! json_encode($dates, JSON_HEX_TAG) !!};--}}
{{--                    var profit = {!! json_encode($profits, JSON_HEX_TAG) !!};--}}
{{--                    const ctx = document.getElementById('profitChart');--}}
{{--                    ctx.style.backgroundColor = 'rgb(34, 40, 49)';--}}
{{--                    new Chart(ctx, {--}}
{{--                        type: 'line',--}}
{{--                        backgroundColor:'rgb(75, 192, 192)',--}}
{{--                        data: {--}}
{{--                            labels: date,--}}
{{--                            borderColor : "#fffff",--}}
{{--                            datasets: [{--}}
{{--                                borderColor : "#85BB65",--}}
{{--                                label: 'Profit',--}}
{{--                                data: profit,--}}
{{--                                backgroundColor: 'transparent',--}}
{{--                            }],--}}
{{--                        },--}}
{{--                    });--}}
{{--                }, true);--}}
{{--            </script>--}}
{{--        </div>--}}
{{--        <div style="padding:1em;margin-left:10vh;width:60vh;background-color:rgb(34, 40, 49);border-radius:.5em;">--}}
{{--            <div class="text-warning mt-3" style="font-weight:bold;display:flex;justify-content: center;letter-spacing:.3em;font-size:.8em;">--}}
{{--                STATISTICS--}}
{{--            </div>--}}
{{--            <div style="display:flex;flex-direction:row;padding:.8em;align-items:center;">--}}
{{--                <div class="bg-success" style="font-style:italic;font-size:1em;color:white;font-weight:bold;padding:.5em;border-radius:.5em;">--}}
{{--                    {{ $totalProfit }} MDL--}}
{{--                </div>--}}
{{--                <div style="color:white;font-size:1.1em;margin-left:1em;">--}}
{{--                   - Total revenue earned this month.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        Coming soon...
    </div>
@endsection
