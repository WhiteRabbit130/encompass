console.log('dashboard.js')


console.log(moment().format('MMMM Do YYYY, h:mm:ss a'))


document.addEventListener("DOMContentLoaded", async () => {
    try {
        initOtherCharts();
        initRevenueByMonthChart();
        initStudentEnrollmentChart();
        initLessonsByInstrumentPieChart();
        initInstrumentPopularityPieChart();

        initTeacherAvailabilityRadarChart();
        initLessonCompletionRatePolarAreaChart();

    } catch (e) {
        console.log('Error getting weather')
    }
});

/*Lesson Completion Rate (Polar Area Chart)*/
function initLessonCompletionRatePolarAreaChart() {
    const lessonCompletionRateChart = document.getElementById('lesson-completion-rate-chart');
    const lessonCompletionRateData = {
        labels: ['Completed', 'Not Completed'],
        datasets: [{
            label: 'Lesson Completion Rate',
            data: [60, 40],
            backgroundColor: [
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 99, 132, 0.5)'
            ]
        }]
    };

    new Chart(lessonCompletionRateChart, {
        type: 'polarArea',
        data: lessonCompletionRateData,
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'rgb(255, 99, 132)'
                    }
                }
            }
        }
    });

}

/*Teacher Availability (Radar Chart)*/
function initTeacherAvailabilityRadarChart() {
    const teacherAvailabilityChart = document.getElementById('teacher-availability-chart');
    const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    const availableHours = [8, 9, 7, 8, 6, 4, 3]; // Example hours

    new Chart(teacherAvailabilityChart, {
        type: 'radar',
        data: {
            labels: daysOfWeek,
            datasets: [{
                label: 'Available Hours',
                data: availableHours,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2
            }]
        },
        options: {
            elements: {
                line: {
                    tension: 0.1 // Disables bezier curves
                }
            }
        }
    });

}


/*Instrument Popularity Pie Chart*/
function initInstrumentPopularityPieChart() {
    const instrumentPopularityChart = document.getElementById('instrument-popularity-chart');
    const instruments = ['Guitar', 'Piano', 'Violin', 'Drums', 'Saxophone'];
    const studentCounts = [40, 30, 20, 10, 5];

    new Chart(instrumentPopularityChart, {
        type: 'pie',
        data: {
            labels: instruments,
            datasets: [{
                label: 'Student Count',
                data: studentCounts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ]
            }]
        }
    });

}


function initRevenueByMonthChart() {

    const revenueByMonthChart = document.getElementById('revenue-by-month-chart');
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const monthlyRevenue = [5000, 6000, 5500, 6500, 7000, 7500, 8000, 7500, 7200, 6800, 7000, 7500];

    new Chart(revenueByMonthChart, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Monthly Revenue',
                data: monthlyRevenue,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }

    });


}

function initStudentEnrollmentChart() {
    const studentEnrollmentChart = document.getElementById('student-enrollment-chart');
    const ageGroups = ['Under 10', '10-15', '16-20', '21-25', '26-30', 'Over 30'];
    const studentNumbers = [20, 35, 25, 15, 10, 5];

    new Chart(studentEnrollmentChart, {
        type: 'bar',
        data: {
            labels: ageGroups,
            datasets: [{
                label: 'Number of Students',
                data: studentNumbers,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

}


function initLessonsByInstrumentPieChart() {
    const donutChart = document.getElementById('lessons-by-instrument-pie-chart');
    const donutData = [
        {instrument: 'guitar', count: 3, income: 100},
        {instrument: 'drum', count: 2, income: 100},
        {instrument: 'singing', count: 1, income: 100},
        {instrument: 'piano', count: 2, income: 100},
        {instrument: 'violin', count: 1, income: 100},
    ];
    const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];

    const donutLabels = donutData.map(d => d.instrument);
    const donutChartData = donutData.map(d => d.count);
    const backgroundColors = donutData.map((d, i) => colors[i % colors.length]);
    console.log(backgroundColors)
    new Chart(donutChart, {
        type: 'doughnut',
        data: {
            labels: donutLabels,
            datasets: [{
                label: 'Lessons',
                data: donutChartData,
               // backgroundColor: backgroundColors,
                borderColor: '#31D2F2',
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'rgb(255, 99, 132)'
                    }
                }
            },
            scales: {
                y: {
                    display: false
                },
                x: {
                    display: false
                }
            }
        }
    });
}


function initOtherCharts() {

    /*
    * Week Lessons Chart
    * - Shows lessons per day and income per day
    * */
    // const chart = document.getElementById('week-lessons-chart');
    //
    // // todo - make some fake data for the chart
    // //  - 7 days
    // //  - lessons per day and income per day
    // const labels = [];
    // const chartData = [];
    //
    // for (let i = 0; i < 7; i++) {
    //     const l = moment().subtract(i, 'days').format('M/D');
    //     labels.push(l);
    //     chartData.push({
    //         x: l,
    //         y: Math.floor(Math.random() * 10),
    //     });
    // }
    //
    // // Bar charts
    // new Chart(chart, {
    //     type: 'bar',
    //     data: {
    //         datasets: [{
    //             label: 'Lessons',
    //             data: chartData,
    //         }]
    //     },
    //     options: {
    //         // color: '#10dd1f',
    //         borderColor: '#31D2F2',
    //         backgroundColor: '#31D2F2',
    //         plugins: {
    //             // legend: {
    //             //     display: true,
    //             //     labels: {
    //             //         color: 'rgb(255, 99, 132)'
    //             //     }
    //             // }
    //         },
    //         scales: {
    //             y: {
    //                 // beginAtZero: false
    //             },
    //             x: {
    //                 // display: false,
    //             }
    //         }
    //     }
    // });


    /*
    * todo - Guitar lessons chart
    * */

    const guitarChart = document.getElementById('guitar-week-lessons-chart');
    const guitarLabels = [];
    const guitarChartData = [];
    // const guitarData = await fetch('/api/lessons/guitar');
    // todo - fake the data

    // const guitarChartData = [{x: 10, y: 20}, {x: 15, y: null}, {x: 20, y: 10}]

    // const guitarChartData = [ {x: '2021-03-01', y: 3}, {x: '2021-03-02', y: 2}, {x: '2021-03-03', y: 1}, {x: '2021-03-04', y: 2}, {x: '2021-03-05', y: 1}, {x: '2021-03-06', y: 2}, {x: '2021-03-07', y: 1} ]

    // No dates
    // const guitarChartData = [ {x: 3}, {x: 2}, {x: 1}, {x: 2}, {x: 1}, {x: 2}, {x: 1} ]

    const guitarData = [
        {
            date: '2021-03-01',
            count: 3,
            income: 100,
        },
        {
            date: '2021-03-02',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-03',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-04',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-05',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-06',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-07',
            count: 1,
            income: 100,
        },
    ];

    guitarData.forEach((d) => {
        guitarLabels.push(moment(d.date).format('M/D'));
        guitarChartData.push({
            x: moment(d.date).format('M/D'),
            y: d.count,
        });
    });

    new Chart(guitarChart, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Guitar Lessons',
                data: guitarChartData,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            plugins: {
                // legend: {
                //     display: true,
                //     labels: {
                //         color: 'rgb(255, 99, 132)'
                //     }
                // }
            },
            scales: {
                y: {
                    // beginAtZero: false
                },
                x: {
                    // display: false,
                }
            },
        }
    });


    /*
    * todo - Drum lessons chart
    * */
    const drumChart = document.getElementById('drum-week-lessons-chart');
    const drumLabels = [];
    const drumChartData = [];
    // const drumData = await fetch('/api/lessons/drum');
    // todo - fake the data
    const drumData = [
        {
            date: '2021-03-01',
            count: 3,
            income: 100,
        },
        {
            date: '2021-03-02',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-03',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-04',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-05',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-06',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-07',
            count: 1,
            income: 100,
        },
    ];

    drumData.forEach((d) => {
        drumLabels.push(moment(d.date).format('M/D'));
        drumChartData.push({
            x: moment(d.date).format('M/D'),
            y: d.count,
        });
    });

    new Chart(drumChart, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Lessons',
                data: drumChartData,
            }]
        },
        options: {
            // color: '#10dd1f',
            borderColor: '#31D2F2',
            backgroundColor: '#31D2F2',
            plugins: {
                // legend: {
                //     display: true,
                //     labels: {
                //         color: 'rgb(255, 99, 132)'
                //     }
                // }
            },
            scales: {
                y: {
                    // beginAtZero: false
                },
                x: {
                    // display: false,
                }
            }
        }
    });

    /*
    * todo - Singing lessons chart
    * */
    const singingChart = document.getElementById('singing-week-lessons-chart');
    const singingLabels = [];
    const singingChartData = [];
    // const singingData = await fetch('/api/lessons/singing');
    // todo - fake the data
    const singingData = [
        {
            date: '2021-03-01',
            count: 3,
            income: 100,
        },
        {
            date: '2021-03-02',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-03',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-04',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-05',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-06',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-07',
            count: 1,
            income: 100,
        },
    ];

    singingData.forEach((d) => {
        singingLabels.push(moment(d.date).format('M/D'));
        singingChartData.push({
            x: moment(d.date).format('M/D'),
            y: d.count,
        });
    });

    new Chart(singingChart, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Lessons',
                data: singingChartData,
            }]
        },
        options: {
            // color: '#10dd1f',
            borderColor: '#31D2F2',
            backgroundColor: '#31D2F2',
            plugins: {
                // legend: {
                //     display: true,
                //     labels: {
                //         color: 'rgb(255, 99, 132)'
                //     }
                // }
            },
            scales: {
                y: {
                    // beginAtZero: false
                },
                x: {
                    // display: false,
                }
            }
        }
    });

    /*
    * todo - Piano lessons chart
    * */
    const pianoChart = document.getElementById('piano-week-lessons-chart');
    const pianoLabels = [];
    const pianoChartData = [];
    // const pianoData = await fetch('/api/lessons/piano');
    // todo - fake the data
    const pianoData = [
        {
            date: '2021-03-01',
            count: 3,
            income: 100,
        },
        {
            date: '2021-03-02',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-03',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-04',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-05',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-06',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-07',
            count: 1,
            income: 100,
        },
    ];

    pianoData.forEach((d) => {
        pianoLabels.push(moment(d.date).format('M/D'));
        pianoChartData.push({
            x: moment(d.date).format('M/D'),
            y: d.count,
        });
    });

    new Chart(pianoChart, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Lessons',
                data: pianoChartData,
            }]
        },
        options: {
            // color: '#10dd1f',
            borderColor: '#31D2F2',
            backgroundColor: '#31D2F2',
            plugins: {
                // legend: {
                //     display: true,
                //     labels: {
                //         color: 'rgb(255, 99, 132)'
                //     }
                // }
            },
            scales: {
                y: {
                    // beginAtZero: false
                },
                x: {
                    // display: false,
                }
            }
        }
    });

    /*
    * todo - Violin lessons chart
    * */

    const violinChart = document.getElementById('violin-week-lessons-chart');
    const violinLabels = [];
    const violinChartData = [];
    // const violinData = await fetch('/api/lessons/violin');
    // todo - fake the data
    const violinData = [
        {
            date: '2021-03-01',
            count: 3,
            income: 100,
        },
        {
            date: '2021-03-02',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-03',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-04',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-05',
            count: 1,
            income: 100,
        },
        {
            date: '2021-03-06',
            count: 2,
            income: 100,
        },
        {
            date: '2021-03-07',
            count: 1,
            income: 100,
        },
    ];

    violinData.forEach((d) => {
        violinLabels.push(moment(d.date).format('M/D'));
        violinChartData.push({
            x: moment(d.date).format('M/D'),
            y: d.count,
        });
    });

    new Chart(violinChart, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Lessons',
                data: violinChartData,
            }]
        },
        options: {
            // color: '#10dd1f',
            borderColor: '#31D2F2',
            backgroundColor: '#31D2F2',
            plugins: {
                // legend: {
                //     display: true,
                //     labels: {
                //         color: 'rgb(255, 99, 132)'
                //     }
                // }
            },
            scales: {
                y: {
                    // beginAtZero: false
                },
                x: {
                    // display: false,
                }
            }
        }
    });


}


// function initLessonsByInstrumentPieChart() {
//
//     /*
//     * Create simple Donut chart
//     *  - Shows total lessons per instrument
//     * */
//     const donutChart = document.getElementById('lessons-by-instrument-pie-chart');
//     const donutLabels = [];
//     const donutChartData = [];
//     // const donutData = await fetch('/api/lessons');
//     // todo - fake the data
//
//     const donutData = [
//         {
//             instrument: 'guitar',
//             count: 3,
//             income: 100,
//         },
//         {
//             instrument: 'drum',
//             count: 2,
//             income: 100,
//         },
//         {
//             instrument: 'singing',
//             count: 1,
//             income: 100,
//         },
//         {
//             instrument: 'piano',
//             count: 2,
//             income: 100,
//         },
//         {
//             instrument: 'violin',
//             count: 1,
//             income: 100,
//         },
//     ];
//     const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']; // Example colors
//
//     // donutData.forEach((item, index) => {
//     //     item.color = colors[index % colors.length];
//     // });
//     //
//
//     donutData.forEach((d, i) => {
//         donutLabels.push(d.instrument);
//         donutChartData.push(d.count);
//
//         d.color = colors[i % colors.length];
//     });
//
//     new Chart(donutChart, {
//         type: 'doughnut',
//         data: {
//             labels: donutLabels,
//             datasets: [{
//                 label: 'Lessons',
//                 data: donutChartData,
//             }]
//         },
//         options: {
//             // color: '#10dd1f',
//             borderColor: '#31D2F2',
//             backgroundColor: '#31D2F2',
//             plugins: {
//                 // legend: {
//                 //     display: true,
//                 //     labels: {
//                 //         color: 'rgb(255, 99, 132)'
//                 //     }
//                 // }
//             },
//             scales: {
//                 y: {
//                     // beginAtZero: false
//                 },
//                 x: {
//                     // display: false,
//                 }
//             }
//         }
//     });
//
//
// }
