$(function () {
    'use strict'
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true

    window.graphDataList.forEach(({ graph, chartId }) => {
      const ctx = document.getElementById(chartId);
      if (!ctx) return;

      new Chart(ctx, {
          type: 'line',
          data: {
              labels: graph.date,
              datasets: [
                  {
                      type: 'line',
                      data: graph.how_was_exercise,
                      backgroundColor: 'transparent',
                      borderColor: '#008000',
                      pointBorderColor: '#008000',
                      pointBackgroundColor: '#008000',
                      fill: false
                  },
                  {
                      type: 'line',
                      data: graph.pain_before_exercise,
                      backgroundColor: 'transparent',
                      borderColor: '#6c757d',
                      pointBorderColor: '#6c757d',
                      pointBackgroundColor: '#6c757d',
                      fill: false
                  },
                  {
                      type: 'line',
                      data: graph.pain_after_exercise,
                      backgroundColor: 'transparent',
                      borderColor: '#007bff',
                      pointBorderColor: '#007bff',
                      pointBackgroundColor: '#007bff',
                      fill: false
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
              legend: {
                  display: false
              },
              scales: {
                  yAxes: [{
                      gridLines: {
                          display: true,
                          lineWidth: '4px',
                          color: 'rgba(0, 0, 0, .2)',
                          zeroLineColor: 'transparent'
                      },
                      ticks: Object.assign({
                          beginAtZero : true,
                          suggestedMax: 10
                      }, ticksStyle)
                  }],
                  xAxes: [{
                      gridLines: {
                          display: false
                      },
                      ticks: ticksStyle
                  }]
              }
          }
      });
  });
})
  