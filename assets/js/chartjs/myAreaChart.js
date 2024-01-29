var ctx = document.getElementById("myAreaChart");
new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    'Sudah Dihitung',
    'Belum Dihitung',
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [90, 10],
    backgroundColor: [
      '#198754',
      '#000333'
    ],
    options: {
       maintainAspectRatio: false,
       legend: {
					position: 'bottom',
					labels: {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle: true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
    },
    hoverOffset: 4
  }]
  },
});