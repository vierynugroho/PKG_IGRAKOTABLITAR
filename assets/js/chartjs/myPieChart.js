var ctx = document.getElementById("myPieChart");
new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Amat Baik", "Baik", "Cukup", "Kurang"],
    datasets: [{
      data: [55, 30, 5, 30],
      backgroundColor: ['#198754', '#0dcaf0', '#ffc107', '#dc3545'],
      hoverBackgroundColor: [ '#17a673', '#2c9faf','#ffc120','#dc3500'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 90,
  },
});
