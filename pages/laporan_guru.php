<?php
$id_periode = get_tahun_ajar_id();
if (isset($_GET['idta'])) {
    $id_periode = mysqli_real_escape_string($con, htmlspecialchars($_GET['idta']));
}

$nip_user = $_SESSION[md5('user')]; //'2012091200113504';


$sql = "SELECT * FROM jenis_kompetensi";
$q = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($q)) {
    ${"b_" . $row['nama_kompetensi']} = $row['bobot_kompetensi'];
}


// ! START QUERY
$sql = "SELECT * FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai WHERE a.nip = '$nip_user' ";
$q = mysqli_query($con, $sql);
$id_penilai_detail = '';
$i = 0;
$id_penilai_detail = 0;
while ($row = mysqli_fetch_array($q)) {
    if ($i == 0) {
        $id_penilai_detail .= $row['id_penilai_detail'];
    } else {
        $id_penilai_detail .= ", " . $row['id_penilai_detail'];
    }
    $i++;
}

$komp = '';
$sql = "SELECT 
								a.id_kompetensi,
								a.nama_kompetensi,
								a.bobot_kompetensi,
								COUNT(b.id_isi) as jml
							FROM jenis_kompetensi a
							JOIN isi_kompetensi b ON a.id_kompetensi = b.id_kompetensi
							GROUP BY a.id_kompetensi";
$q = mysqli_query($con, $sql);

$data_kompetensi = [];


while ($row = mysqli_fetch_array($q)) {
    ${"b_" . $row['nama_kompetensi']} = $row['bobot_kompetensi'];
    ${"jml_" . $row['nama_kompetensi']} = $row['bobot_kompetensi'];
    ${$row['nama_kompetensi']} = $row['nama_kompetensi'];
    $data_kompetensi[] = $row;
}

foreach ($data_kompetensi as $key => $value) {
    $komp .= "SUM( IF(tbnilai.nama_kompetensi = '$value[nama_kompetensi]', tbnilai.nilai, 0) ) AS '$value[nama_kompetensi]', ";
}


$sql = "SELECT 
								tbnilai.nip_penilai,
								tbnilai.penilai,
								tbnilai.level,
								tbnilai.jabatan,
								$komp
								1
							FROM 
							(SELECT 
								a.id_nilai, 
								h.nip as nip_dinilai,
								h.nama_guru as 'dinilai',
								e.nip as nip_penilai, 
								e.nama_guru as 'penilai',
								f.jabatan,
								f.level,
								c.id_kompetensi,
								c.nama_kompetensi,
								c.bobot_kompetensi,
								SUM(a.hasil_nilai) as nilai
							FROM penilaian a 
							JOIN isi_kompetensi b ON a.id_isi = b.id_isi
							JOIN jenis_kompetensi c ON b.id_kompetensi = c.id_kompetensi
							JOIN (penilai_detail d JOIN user e ON d.nip = e.nip JOIN jenis_user f ON f.id_jenis_user = e.id_jenis_user) ON d.id_penilai_detail = a.id_penilai_detail 
							JOIN (penilai g JOIN user h ON g.nip = h.nip ) ON d.id_penilai = g.id_penilai
							WHERE a.id_penilai_detail IN ($id_penilai_detail) AND g.id_periode = $id_periode
							GROUP BY a.id_penilai_detail, c.id_kompetensi
							ORDER BY 4) as tbnilai
							GROUP BY tbnilai.penilai";

$vq = mysqli_query($con, $sql);
$nno = 0;
echo "<br>";
$tot_arr['kepalaSekolah'] = 0;

$tot_pedagodik = 0;
$tot_kepribadian = 0;
$tot_sosial = 0;
$tot_profesional = 0;

// foreach ($data_kompetensi as $key => $value) {
//     var_dump($value['nama_kompetensi']);
// }
// die();


?>

<?php
$tot = 0;
?>
<script>
    var data_kompetensi = [
        <?php
        while ($row = mysqli_fetch_array($vq)) {
            foreach ($data_kompetensi as $key => $value) {
                $nil = ($row[$value['nama_kompetensi']] / $value['jml']) * 100;
                echo "{oleh: '" . $value['nama_kompetensi'] . "', nilai:" . number_format($nil, 2) . "},";
            }
        }
        ?>
    ];


    var data_bar = [
        <?php
        echo "{oleh: 'Kepala Sekolah', nilai:" . number_format(get_tot_nilai($nip_user, $id_periode), 2) . "},";
        ?>
    ];

    console.log(data_bar)
</script>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?p=home"><i class="fas fa fa-home text-success"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Penilaian Kinerja</li>
        </ol>
    </nav>

    <div class="shadow mb-4 p-3">
        <div class="row">
            <div class="col col-12">
                <div class="row d-flex justify-content-between">
                    <div class="col d-flex align-items-start  justify-content-start">
                        <a class="btn disabled text-success">Periode
                            <?= get_tahun_ajar(); ?>
                        </a>
                        <hr />
                    </div>
                    <div class="col d-flex align-items-end justify-content-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            Rentang Nilai Akhir dan Keterangan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Rentang Nilai Akhir dan Keterangan
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <thead class="table-success">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Rentang Nilai</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>300 - 400</td>
                                            <td>(A) Sangat Baik</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>200 - 299</td>
                                            <td>(B) Baik</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>100 - 200</td>
                                            <td>(C) Kurang</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>0 - 99</td>
                                            <td>(D) Sangat Kurang</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <form action="index.php?p=laporanpen" method="get" id="frm_ta">
                    <div class="form-group">
                        <select class="form-select cb_periode" name="idta">
                            <?php

                            $sql = "SELECT * FROM periode";
                            $q = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($q)) {
                                $sel = '';
                                if (isset($_GET['idta'])) {
                                    if ($_GET['idta'] == $row['id_periode']) {
                                        $sel = 'selected';
                                        $idtahunaktif = $_GET['idta'];
                                        $ak = get_tot_nilai($nip_user, $idtahunaktif);
                                    }
                                } else {
                                    if ($row['status_periode'] == 1) {
                                        $sel = 'selected';
                                        $idtahunaktif = $_GET['idta'];
                                        $ak = get_tot_nilai($nip_user, $idtahunaktif);
                                    }
                                }
                                if ($row['status_periode'] == 1) {
                                    echo "<option value='$row[id_periode]' $sel >$row[tahun_ajar] $row[semester] (Aktif)</option>";
                                } else {
                                    echo "<option value='$row[id_periode]' $sel >$row[tahun_ajar] $row[semester]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </form>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <p class="card-title text-white"><strong>Nilai Akhir</strong></p>
                    </div>
                    <div class="card-body">
                        <div id="chart-nilai-akhir" class="overflow-auto"></div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        <p class="card-title text-white"><strong>Nilai Perwakilan</strong></p>
                    </div>
                    <div class="card-body">
                        <div id="chart-nilai-perwakilan" class="overflow-auto"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-top:20px">
                <div class="card">
                    <div class="card-header bg-danger">
                        <p class="card-title text-white"><strong>Nilai Perkompetensi</strong></p>
                    </div>
                    <div class="card-body">
                        <div id="chart-nilai-perkompetensi" class="overflow-auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var size = $("#chart-nilai-akhir").width() / 2; //150,
    thickness = 60;

    //console.log(size);
    var color = d3.scaleLinear()
        //.domain([0, 50, 100])
        //.range(['#db2828', '#fbbd08', '#21ba45']);
        .domain([0, 100, 200, 300, 400])
        .range(['#db4639', '#FFCD42', '#48ba17', '#12ab24', '#0f9f59']);

    var arc = d3.arc()
        .innerRadius(size - thickness)
        .outerRadius(size)
        .startAngle(-Math.PI / 2);

    var svg = d3.select('#chart-nilai-akhir').append('svg')
        .attr('width', size * 2)
        .attr('height', size + 20)
        .attr('class', 'gauge');


    var chart = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + size + ')')

    var background = chart.append('path')
        .datum({
            endAngle: Math.PI / 2
        })
        .attr('class', 'background')
        .attr('d', arc);

    var foreground = chart.append('path')
        .datum({
            endAngle: -Math.PI / 2
        })
        .style('fill', '#db2828')
        .attr('d', arc);

    var value = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + (size * .9) + ')')
        .append('text')
        .text(0)
        .attr('text-anchor', 'middle')
        .attr('class', 'value');


    var kete = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + (size * 1.05) + ')')
        .append('text')
        .text(0)
        .attr('text-anchor', 'middle')
        .attr('class', 'nhuruf');

    var scale = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + (size + 15) + ')')
        .attr('class', 'scale');

    scale.append('text')
        .text(400)
        .attr('text-anchor', 'middle')
        .attr('x', (size - thickness / 2));

    scale.append('text')
        .text(0)
        .attr('text-anchor', 'middle')
        .attr('x', -(size - thickness / 2));
    /*
    setInterval(function() {
        update(Math.random() * 400);
    }, 1500);*/
    //update_gauge(500);
    update_gauge(<?= $ak; ?>);

    function update_gauge(v) {
        v = d3.format('.1f')(v);
        //console.log("update", v);
        foreground.transition()
            .duration(750)
            .style('fill', function() {
                return color(v);
            })
            .call(arcTween, v);

        value.transition()
            .duration(750)
            .call(textTween, v);

        kete.transition()
            .duration(750)
            .call(textKet, rentang(v));
    }

    function arcTween(transition, v) {
        var newAngle = v / 400 * Math.PI - Math.PI / 2;
        transition.attrTween('d', function(d) {
            var interpolate = d3.interpolate(d.endAngle, newAngle);
            return function(t) {
                d.endAngle = interpolate(t);
                return arc(d);
            };
        });
    }

    function textTween(transition, v) {
        //console.log(v);
        transition.tween('text', function() {
            var interpolate = d3.interpolate(this.innerHTML, v),
                split = (v + '').split('.'),
                round = (split.length > 1) ? Math.pow(10, split[1].length) : 1;
            return function(t) {
                this.innerHTML = d3.format('.1f')(Math.round(interpolate(t) * round) / round);
            };
        });
    }

    function textKet(transition, v) {
        //console.log(v);
        transition.tween('text', function() {
            var interpolate = d3.interpolate(this.innerHTML, v),
                split = (v + '').split('.'),
                round = (split.length > 1) ? Math.pow(10, split[1].length) : 1;
            return function(t) {
                this.innerHTML = v //d3.format('.1f')(Math.round(interpolate(t) * round) / round);
            };
        });
    }

    function rentang(v) {
        v = Number(v);

        if (v <= 400 && v >= 300) {
            return "Sangat Baik";
        } else if (v <= 299 && v >= 200) {
            return "Baik";
        } else if (v <= 199 && v >= 100) {
            return "Kurang";
        } else if (v <= 99) {
            return "Sangat Kurang";
        } else {
            return "#";
        }
    }
</script>

<script>
    var size_bar = $("#chart-nilai-perwakilan").width() / 2; //150,
    thickness_bar = 60;
    margin = 10;
    bar_width = (size_bar * 2) - 2 * margin;
    bar_height = (size_bar + 2) - 1 * margin;

    var svg_bar = d3.select('#chart-nilai-perwakilan').append('svg')
        .attr('width', size_bar * 2)
        .attr('height', size_bar + 20)
        .attr('class', 'bar');

    var chart_bar = svg_bar.append('g')
        .attr('transform', 'translate(' + (margin + 25) + ',' + margin + ')')

    var xScale = d3.scaleBand()
        .range([0, bar_width])
        .domain(data_bar.map((s) => s.oleh))
        .padding(0.4)

    var yScale = d3.scaleLinear()
        .range([bar_height, 0])
        .domain([0, 500]);


    var makeYLines = () => d3.axisLeft()
        .scale(yScale)

    chart_bar.append('g')
        .attr('transform', 'translate(0, ' + bar_height + ')')
        .call(d3.axisBottom(xScale));

    chart_bar.append('g')
        .call(d3.axisLeft(yScale));

    chart_bar.append('g')
        .attr('class', 'grid')
        .call(makeYLines()
            .tickSize(-bar_width, 0, 0)
            .tickFormat('')
        )


    var barGroups = chart_bar.selectAll()
        .data(data_bar)
        .enter()
        .append('g')

    barGroups
        .append('rect')
        .attr('class', 'bar_red')
        .attr('x', function(g) {
            return xScale(g.oleh)
        })
        .attr('width', xScale.bandwidth())
        .on('mouseenter', mouseOver)
        .on('mouseleave', mouseLeave)
        .attr('y', function(g) {
            return yScale(0)
        })
        .attr('height', function(g) {
            return bar_height - yScale(0)
        })
        .transition()
        .ease(d3.easeExp)
        .duration(750)
        .delay(function(g, i) {
            //console.log(i+" "+yScale(g.nilai));
            return i * 50;
        })
        .attr('y', function(g) {
            return yScale(g.nilai)
        })
        .attr('height', function(g) {
            return bar_height - yScale(g.nilai)
        })
        .attr("fill", function(g) {
            //['#db4639', '#FFCD42', '#48ba17', '#12ab24', '#0f9f59']
            var v = g.nilai;
            if (v >= 682) {
                return "#0f9f59";
            } else if (v >= 525) {
                return "#12ab24";
            } else if (v >= 366) {
                return "#48ba17";
            } else if (v >= 201) {
                return "#FFCD42";
            } else {
                return "#db4639";
            }
        })

    barGroups
        .append('text')
        .attr('class', 'value_bar')
        .attr('x', (a) => xScale(a.oleh) + xScale.bandwidth() / 2)
        .attr('y', (a) => yScale(a.nilai) + 30)
        .attr('fill', 'white')
        .attr('text-anchor', 'middle')
        .attr('opacity', 1)
        .text((a) => a.nilai)


    function mouseOver(actual, i) {
        /*d3.selectAll('.value_bar')
              .attr('opacity', 0)*/

        /* d3.select(this)
                  .transition()
                  .duration(300)
                  .attr('opacity', 0.6)
                  .attr('x', (a) => xScale(a.oleh) - 5)
                  .attr('width', xScale.bandwidth() + 10)
        */
        /* var y = yScale(actual.nilai)
        
             line = chart_bar.append('line')
               .attr('id', 'limit')
               .attr('x1', 0)
               .attr('y1', y)
               .attr('x2', bar_width)
               .attr('y2', y)
        
             barGroups.append('text')
               .attr('class', 'divergence')
               .attr('x', (a) => xScale(a.oleh) + xScale.bandwidth() / 2)
               .attr('y', (a) => yScale(a.nilai) + 30)
               .attr('fill', 'white')
               .attr('text-anchor', 'middle')
               .text((a, idx) => {
                 var divergence = (a.nilai - actual.nilai).toFixed(1)
                 
                 var text = ''
                 if (divergence > 0) text += '+'
                      text += ' '+divergence+' '
                 text = a.nilai;
                 return idx !== i ? text : '';
               })*/
    }

    function mouseLeave() {
        /*d3.selectAll('.value_bar')
                  .attr('opacity', 1)
        
                d3.select(this)
                  .transition()
                  .duration(300)
                  .attr('opacity', 1)
                  .attr('x', (a) => xScale(a.oleh))
                  .attr('width', xScale.bandwidth())
        
                chart.selectAll('#limit').remove()
                chart.selectAll('.divergence').remove()*/
    }
</script>
<script>
    var size_bar = $("#chart-nilai-perkompetensi").width() / 2; //150,
    thickness_bar = 60;
    margin = 30;
    bar_width = (size_bar * 2) - 2 * margin;
    bar_height = (size_bar + 2) - 1 * margin;

    var svg_bar = d3.select('#chart-nilai-perkompetensi').append('svg')
        .attr('width', size_bar * 2)
        .attr('height', size_bar + 20)
        .attr('class', 'bar');

    var chart_bar = svg_bar.append('g')
        .attr('transform', 'translate(' + margin + ',' + margin + ')')

    var xScale = d3.scaleBand()
        .range([0, bar_width])
        .domain(data_kompetensi.map((s) => s.oleh))
        .padding(0.4)

    var yScale = d3.scaleLinear()
        .range([bar_height, 0])
        .domain([0, 1000]);


    var makeYLines = () => d3.axisLeft()
        .scale(yScale)

    chart_bar.append('g')
        .attr('transform', 'translate(0, ' + bar_height + ')')
        .call(d3.axisBottom(xScale));

    chart_bar.append('g')
        .call(d3.axisLeft(yScale));

    chart_bar.append('g')
        .attr('class', 'grid')
        .call(makeYLines()
            .tickSize(-bar_width, 0, 0)
            .tickFormat('')
        )


    var barGroups = chart_bar.selectAll()
        .data(data_kompetensi)
        .enter()
        .append('g')


    barGroups
        .append('rect')
        .attr('class', 'bar')
        //.attr('fill', 'red')
        .attr('x', function(g) {
            return xScale(g.oleh)
        })
        .attr('width', xScale.bandwidth())
        .on('mouseenter', mouseOver)
        .on('mouseleave', mouseLeave)
        .attr('y', function(g) {
            return yScale(0)
        })
        .attr('height', function(g) {
            return bar_height - yScale(0)
        })
        .transition()
        .ease(d3.easeExp)
        .duration(750)
        .delay(function(g, i) {
            //console.log(i+" "+yScale(g.nilai));
            return i * 50;
        })
        .attr('y', function(g) {
            return yScale(g.nilai)
        })
        .attr('height', function(g) {
            return bar_height - yScale(g.nilai)
        })
        .attr("fill", function(g) {
            //['#db4639', '#FFCD42', '#48ba17', '#12ab24', '#0f9f59']
            var v = g.nilai;
            if (v >= 300) {
                return "#0f9f59";
            } else if (v >= 200) {
                return "#12ab24";
            } else if (v >= 100) {
                return "#48ba17";
            } else if (v >= 50) {
                return "#FFCD42";
            } else {
                return "#db4639";
            }
        })

    barGroups
        .append('text')
        .attr('class', 'value_bar')
        .attr('x', (a) => xScale(a.oleh) + xScale.bandwidth() / 2)
        .attr('y', (a) => yScale(a.nilai) + 30)
        .attr('fill', 'white')
        .attr('text-anchor', 'middle')
        .attr('opacity', 1)
        .text((a) => a.nilai)


    function mouseOver(actual, i) {
        /*d3.selectAll('.value_bar')
              .attr('opacity', 0)*/

        /* d3.select(this)
                  .transition()
                  .duration(300)
                  .attr('opacity', 0.6)
                  .attr('x', (a) => xScale(a.oleh) - 5)
                  .attr('width', xScale.bandwidth() + 10)
        */
        /* var y = yScale(actual.nilai)
        
             line = chart_bar.append('line')
               .attr('id', 'limit')
               .attr('x1', 0)
               .attr('y1', y)
               .attr('x2', bar_width)
               .attr('y2', y)
        
             barGroups.append('text')
               .attr('class', 'divergence')
               .attr('x', (a) => xScale(a.oleh) + xScale.bandwidth() / 2)
               .attr('y', (a) => yScale(a.nilai) + 30)
               .attr('fill', 'white')
               .attr('text-anchor', 'middle')
               .text((a, idx) => {
                 var divergence = (a.nilai - actual.nilai).toFixed(1)
                 
                 var text = ''
                 if (divergence > 0) text += '+'
                      text += ' '+divergence+' '
                 text = a.nilai;
                 return idx !== i ? text : '';
               })*/
    }

    function mouseLeave() {
        /*d3.selectAll('.value_bar')
                  .attr('opacity', 1)
        
                d3.select(this)
                  .transition()
                  .duration(300)
                  .attr('opacity', 1)
                  .attr('x', (a) => xScale(a.oleh))
                  .attr('width', xScale.bandwidth())
        
                chart.selectAll('#limit').remove()
                chart.selectAll('.divergence').remove()*/
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".cb_periode").change(function() {
            //console.log("COKK");
            //$("#frm_ta").submit();	
            var idta = $(this).val();
            document.location = "index.php?p=laporanpen&idta=" + idta;
        });
    });
</script>