/**
 * Theme: Metrica - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Ecommerce Dashboard Js
 */


var options = {
    chart: {
      height: 340,
      type: 'area',
      toolbar: {
        show: false
      },
    },
    colors: ['#2a76f4'],
    dataLabels: {
        enabled: false
    },
    markers: {
      discrete: [{
      seriesIndex: 0,
      dataPointIndex: 7,
      fillColor: '#aeb9db',
      strokeColor: '#aeb9db',
      size: 5
    }, {
        seriesIndex: 2,
        dataPointIndex: 11,
        fillColor: '#aeb9db',
        strokeColor: '#aeb9db',
        size: 4
      }]
    },
    
    stroke: {
        show: true,
        curve: 'smooth',
        width: 2,
        lineCap: 'square'
    },
    series: [{
        name: 'Income',
        data: [0, 160, 100, 210, 145, 400, 155, 210, 120, 275, 110, 200, 100, 90, 220, 100, 180, 140, 315, 130, 105, 165, 120, 160, 100, 210, 145, 400, 155, 210, 120]
    }],
    labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11",
     "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", 
     "24", "25", "26", "27", "28", "29", "30", "31",],
    
    yaxis: {
      labels: {      
        offsetX: -12,
        offsetY: 0,      
      }
    },
    grid: {
      borderColor: '#e0e6ed',
      strokeDashArray: 5,
      xaxis: {
          lines: {
              show: true
          }
      },   
      yaxis: {
          lines: {
              show: false,
          }
      },
    }, 
    legend: {
     show: false
    },
    tooltip: {
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    yaxis: {
        labels: {
            formatter: function (value) {
                return "$" + value ;
            }
        },
    },
    fill: {
        type:"gradient",
        gradient: {
            type: "vertical",
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .28,
            opacityTo: .05,
            stops: [45, 100]
        }
    },
    responsive: [{
      breakpoint: 575,    
    }]
  };
  
  var chart = new ApexCharts(document.querySelector("#Revenu_Status"), options);
  chart.render();

// Bar chart

  var options = {
    chart: {
      height: 100,
      type: 'bar',
      toolbar: {
        show: false
      },
    },
    plotOptions: {
      bar: {
          horizontal: false,
          columnWidth: '50%',
      },
    },
    colors: ['#e5effe'],
    dataLabels: {
        enabled: false
    },
    
    
    stroke: {
        show: true,
        width: 2,
    },
    series: [{
        name: 'Income',
        data: [0, 160, 100, 210, 145, 400, 155, 210, 120, 275, 110, 200, 100, 90, 220, 100, 180, 140, 315, 130, 105, 165, 120, 160, 100, 210, 145, 400, 155, 210, 120]
    }],
    labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11",
     "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", 
     "24", "25", "26", "27", "28", "29", "30", "31",],
    
    xaxis: {
      labels: {  
        show: false,  
      },

      axisTicks: {
        show: false,
      },
    },
    grid: {
      borderColor: '#e5effe',
      strokeDashArray: 2,
      xaxis: {
          lines: {
              show: false,
          },
      },   
      yaxis: {
          lines: {
              show: false,
          },
      },
    }, 
    legend: {
     show: false
    },
    tooltip: {
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    yaxis: {
        labels: {
          show: false,
            formatter: function (value) {
                return "$" + value ;
            },
            offsetX: -12,
            offsetY: 0, 
        },
    },
    fill: {
      opacity: 1,
    },
  };
  
  var chart = new ApexCharts(document.querySelector("#Revenu_Status_bar"), options);
  chart.render();
