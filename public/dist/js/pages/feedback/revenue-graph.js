$(function () {
    'use strict'
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true

    window.graphDataList.forEach(({ graph, chartId }) => {
      const ctx = document.getElementById(chartId).getContext('2d');
      if (!ctx) return;

      new Chart(ctx, {
        type: 'line',
        data: {
            labels: graph.date,
            datasets: [
                {
                  label               : 'Digital Goods',
                  backgroundColor     : 'rgba(60,141,188,0.9)',
                  borderColor         : 'rgba(60,141,188,0.8)',
                  pointRadius          : false,
                  pointColor          : '#3b8bba',
                  pointStrokeColor    : 'rgba(60,141,188,1)',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data                : graph.how_was_exercise
                },
                {
                  label               : 'Electronics',
                  backgroundColor     : 'rgba(210, 214, 222, 1)',
                  borderColor         : 'rgba(210, 214, 222, 1)',
                  pointRadius         : false,
                  pointColor          : 'rgba(210, 214, 222, 1)',
                  pointStrokeColor    : '#c1c7d1',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data                : graph.how_was_exercise
                },
                {
                  label               : 'Electronics New',
                  backgroundColor     : 'rgba(210, 214, 222, 3)',
                  borderColor         : 'rgba(210, 214, 222, 3)',
                  pointRadius         : false,
                  pointColor          : 'rgba(210, 214, 222, 3)',
                  pointStrokeColor    : '#c1c7d1',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,3)',
                  data                : graph.pain_after_exercise
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'index',
                intersect: true
            },
            responsive : true,
            legend: {
              display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: true,
                        
                    },
                    ticks: Object.assign({
                        beginAtZero : true,
                        suggestedMax: 10
                    }, ticksStyle)
                }],
                xAxes: [{
                    gridLines: {
                        display: true
                    },
                    ticks: ticksStyle
                }]
            }
        }
    });
  });
})
  