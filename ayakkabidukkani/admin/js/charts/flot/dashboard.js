$(function(){

// Statistics
  var d0 = [
    [0,0],[1,0],[2,1],[3,2],[4,15],[5,5],[6,12],[7,10],[8,25],[9,13],[10,25],[11,10],[12,12],[13,6],[14,2],[15,0],[16,0], [20,1], [25,2], [30,2]
  ];
  var d00 = [
    [0,0],[1,0],[2,1],[3,0],[4,1],[5,0],[6,2],[7,0],[8,3],[9,1],[10,0],[11,1],[12,0],[13,2],[14,1],[15,0],[16,0], [20,1], [25,2], [30,2]
  ];
  $("#flot-sp1ine").length && $.plot($("#flot-sp1ine"), [
          d0, d00
      ],
      {
        series: {
            lines: {
                show: false
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
                radius: 0,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#d9dee9",
            borderWidth: 1,
            color: '#d9dee9'
        },
        colors: ["#19b39b", "#644688"],
        xaxis:{
        },
        yaxis: {
          ticks: 4
        },
        tooltip: true,
        tooltipOpts: {
          content: "chart: %x.1 is %y.4",
          defaultTheme: false,
          shifts: {
            x: 0,
            y: 20
          }
        }
      }
  );
 

  // pie
//Analysis
  var da = [
    {
      label: "iPhone5S",
      data: 12
    },    
    {
      label: "iPad Mini",
      data: 10
    },
    {
      label: "iPad Mini Retina",
      data: 20
    },
    {
      label: "iPhone4S",
      data: 12
    },
    {
      label: "iPad Air",
      data: 40
    }
  ];
   
  
  
  $("#flot-pie-donut").length && $.plot($("#flot-pie-donut"), da, {
    series: {
      pie: {
        innerRadius: 0.4,
        show: true,
        stroke: {
          width: 0
        },
        label: {
          show: true,
          threshold: 0.05
        },

      }
    },
    colors: ["#65b5c2","#4da7c1","#3993bb","#2e7bad","#23649e"],
    grid: {
        hoverable: true,
        clickable: false
    },
    tooltip: true,
    tooltipOpts: {
      content: "%s: %p.0%"
    }
  });

  $("#flot-pie").length && $.plot($("#flot-pie"), da, {
    series: {
      pie: {
        combine: {
              color: "#999",
              threshold: 0.05
            },
        show: true
      }
    },    
    colors: ["#65b5c2","#4da7c1","#3993bb","#2e7bad","#23649e"],
    legend: {
      show: false
    },
    grid: {
        hoverable: true,
        clickable: false
    },
    tooltip: true,
    tooltipOpts: {
      content: "%s: %p.0%"
    }
  });

});