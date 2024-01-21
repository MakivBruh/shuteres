 <?php
 // var_dump($kalkulasi);
 // die();
    
    
 ?>

 <div class="panel panel-success">
    <div class="panel-heading">
        <h4 class="panel-title">
            Status Air Pada Media Tanam
        </h4>
    </div>
    <div class="panel-body">
        <div id="grafik" style="height:350px;"></div>
    </div>                     
 </div>            




<div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Deskripsi</a>
                </h4>
            </div>            
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">                    
                    <div class="col-md-6">
                       
                        
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>Lokasi</td>
                                    <td> : </td>
                                    <td> <?= $data1->lokasi_id?></td>
                                </tr>
                                <tr>
                                    <td>Crop</td>
                                    <td> : </td>
                                    <td> <?= $data1->id?></td>
                                </tr>
                                <tr>
                                    <td>Wadah</td>
                                    <td> : </td>
                                    <td> <?= $data1->wadah?></td>
                                </tr>
                                <tr>
                                    <td>Media</td>
                                    <td> : </td>
                                    <td> <?= $data1->jenis_media?></td>
                                </tr>
                                <tr>
                                    <td>Luas Permukaan Perlubang</td>
                                    <td> : </td>
                                    <td> <?= $data1->luas_permukaan?> cm<sup>2</sup></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>                                
                                <tr>
                                    <td>Bobot Tanah Kering Angin Perlubang</td>
                                    <td> : </td>
                                    <td><?= $data1->bbt_tnh_krg_angin_l?> g</td>
                                </tr>
                                <tr>
                                    <td>Bobot Tanah Kering Mutlak Perlubang</td>
                                    <td> : </td>
                                    <td><?= $data1->bbt_tnh_krg_mutlak_l?> g</td>
                                </tr>
                                <tr>
                                    <td>Bobot Tanah Kering Angin Pertray</td>
                                    <td> : </td>
                                    <td><?= ($data1->bbt_tnh_krg_angin_t) ? $data1->bbt_tnh_krg_angin_t.' g':' -'; ?></td>
                                </tr>
                                <tr>
                                    <td>Bobot Tanah Kering Mutlak Pertray</td>
                                    <td> : </td>
                                    <td><?= ($data1->bbt_tnh_krg_mutlak_t) ? $data1->bbt_tnh_krg_mutlak_t.' g':' -'; ?></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div> 
                                                     
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Kadar Air</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-6">
                       
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>Kering Angin</td>
                                    <td> : </td>
                                    <td> <?= $data1->kering_angin?> %</td>
                                </tr>
                                 <tr>
                                    <td>Titik Layu Permanen</td>
                                    <td> : </td>
                                    <td><?= $data1->ttk_layu_permanen?> ml</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>Kadar Air Kering Angin Perlubang</td>
                                    <td> : </td>
                                    <td> <?= $data1->ka_krg_angin_l?> ml</td>
                                </tr>
                                 <tr>
                                    <td>Kadar Air Kering Angin PerTray</td>
                                    <td> : </td>
                                    <td> <?= ($data1->ka_krg_angin_t) ? $data->ka_krg_angin_t.' ml':' -'; ?></td>
                                </tr>                                
                                <tr>
                                    <td>Kadar air kapasitas Lapang Perlubang</td>
                                    <td> : </td>
                                    <td> <?= $data1->ka_kps_lpg_l?> ml</td>
                                </tr>
                                <tr>
                                    <td>Kadar Air Kapasitas Lapang Pertray</td>
                                    <td> : </td>
                                    <td><?= ($data1->ka_kps_lpg_t) ? $data->ka_kps_lpg_t.' ml':' -'; ?></td>
                                </tr>
                                                            
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Kalkulasi</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-4">
                       
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>Suhu</td>
                                    <td> : </td>
                                    <td> <?= $suhu?> <sup>o</sup>C</td>
                                </tr>
                                <tr>
                                    <td>Kelembaban</td>
                                    <td> : </td>
                                    <td> <?= $kelembaban?> %</td>
                                </tr>
                                <tr>
                                    <td>ET0</td>
                                    <td> : </td>
                                    <td> <?= $data1->et0?> ml</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-md-4">
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>KC (<?= $data1->hr_awal ?>)</td>
                                    <td> : </td>
                                    <td> <?= $data1->kc_awal?></td>
                                </tr>
                                <tr>
                                    <td>KC (<?= $data1->hr_tengah ?>)</td>
                                    <td> : </td>
                                    <td><?= $data1->kc_tengah?></td>
                                </tr>
                                <tr>
                                    <td>KC (<?= $data1->hr_akhir ?>)</td>
                                    <td> : </td>
                                    <td> <?= $data1->kc_akhir?></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-md-4">
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>ETc (<?= $data1->hr_awal ?>)</td>
                                    <td> : </td>
                                    <td> <?= $data1->etc_awal?> ml</td>
                                </tr>
                                <tr>
                                    <td>ETc (<?= $data1->hr_tengah ?>)</td>
                                    <td> : </td>
                                    <td><?= $data1->etc_tengah?> ml</td>
                                </tr>
                                <tr>
                                    <td>ETc (<?= $data1->hr_akhir ?>)</td>
                                    <td> : </td>
                                    <td> <?= $data1->etc_akhir?> ml</td>
                                </tr>                                                                 
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Kebutuhan Air</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-md-12"> 
                        <div class="col-md-3"></div>
                        <div class="col-md-6">                      
                            <table class="table table-striped table-hover table-responsive">                        
                                <tbody>
                                    <tr>
                                        <td>Total Air Tersedia (TAW)</td>
                                        <td> : </td>
                                        <td> <?= $data1->taw?> ml</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3"></div>                        
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>Air Segera Tersedia (RAW) <?= $data1->hr_awal ?></td>
                                    <td> : </td>
                                    <td> <?= $data1->raw_awal?> ml</td>
                                </tr>  
                                <tr>
                                    <td>Air Segera Tersedia (RAW) <?= $data1->hr_tengah ?></td>
                                    <td> : </td>
                                    <td> <?= $data1->raw_tengah?> ml</td>
                                </tr>
                                <tr>
                                    <td>Air Segera Tersedia (RAW) <?= $data1->hr_akhir ?></td>
                                    <td> : </td>
                                    <td> <?= $data1->raw_akhir?> ml</td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-md-6">
                        <table class="table table-striped table-hover table-responsive">                        
                            <tbody>
                                <tr>
                                    <td>Kebutuhan Penyiraman Perwadah H1</td>
                                    <td> : </td>
                                    <td> <?= $data1->keb_siram_perwadah_h1?> ml</td>
                                </tr>
                                <tr>
                                    <td>Kebutuhan Penyiraman Perwadah <?= $data1->hr_awal ?></td>
                                    <td> : </td>
                                    <td> <?= $data1->keb_siram_perwadah_awal?> ml</td>
                                </tr>                                
                                <tr>
                                    <td>Kebutuhan Penyiraman Perwadah <?= $data1->hr_tengah ?></td>
                                    <td> : </td>
                                    <td> <?= $data1->keb_siram_perwadah_tengah?> ml</td>
                                </tr>
                                <tr>
                                    <td>Kebutuhan Penyiraman Perwadah <?= $data1->hr_akhir ?></td>
                                    <td> : </td>
                                    <td> <?= $data1->keb_siram_perwadah_akhir?> ml</td>
                                </tr>                                                                 
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Kebutuhan Nutrisi</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover table-responsive">
                        <caption><h4>Tabel Kebutuhan Nutrisi Pertanaman</h4
                            ></caption>
                        <thead>
                            <tr>                                                       
                                <th><center>NUTRISI</center></th>                                            
                                <th><center>NAMA PUPUK</th>                            
                                <th><center>LARUTAN APLIKASI (mg/L)</th>
                                <th><center>PENYIRAMAN H1</th>
                                <th><center>PENYIRAMAN AWAL <br>(<?= $data1->hr_awal ?>)</th>
                                <th><center>PENYIRAMAN MENENGAH <br>(<?= $data1->hr_tengah ?>)</th>
                                <th><center>PENYIRAMAN AKHIR <br>(<?= $data1->hr_akhir ?>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data2 as $r) : ?>
                            <tr class="odd gradeX">                                                      
                                <td><?= $r->komponen ?></td>                            
                                <td><?= $r->nama_pupuk ?></td>                            
                                <td class="text-right"><?= $r->larutan_aplikasi ?></td>
                                <td class="text-right"><?= $r->h_1 ?> mg</td>
                                <td class="text-right"><?= $r->awal ?> mg</td>
                                <td class="text-right"><?= $r->tengah ?> mg</td>
                                <td class="text-right"><?= $r->akhir ?> mg</td>
                            </tr>  
                            <?php endforeach; ?>                                      
                        </tbody>                        
                    </table>                        
                    <?php include('biaya.php'); ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- .panel-body -->

 <script src="<?= base_url(); ?>assets/sb-admin-v2/js/echarts.min.js"></script>
<script>
    var myChart = echarts.init(document.getElementById('grafik'));
    // specify chart configuration item and data
    var colors = ['magenta', 'blue', 'lightgreen', 'red', '#fb9a11'];


    option = {
        color: colors,
        title: {
            text: 'Grafik Status Air Pada Media Tanam',
            subtext: '',
            sublink: '',
            left: 'center',
            top: 16
        },
        legend: {
            show: true,
            data: <?= $hr ?> // data: ['H1', '2-30 HST', '31-110 HST', '111-130 HST']
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                }
            }
        },
        toolbox: {
            // y: 'bottom',
            feature: {
                magicType: {
                    type: ['stack', 'tiled']
                },
                dataView: {},
                saveAsImage: {
                    pixelRatio: 2
                }
            }
        },
        xAxis: {
            type: 'category',
            splitLine: {
                show: true,
                lineStyle: {
                    type: 'dashed'
                }
            },
            axisTick: {
                alignWithLabel: true
            },
            axisLine: {
                onZero: false,
                lineStyle: {
                    color: '#000000'
                }
            },
            axisPointer: {
                label: {
                    formatter: function(params) {
                        return 'Kadar Air Setelah Siram  ' + params.value +
                            (params.seriesData.length ? '：' + '' + Number(params.seriesData[2].data).toLocaleString() : '');
                    }
                }
            },
            data: <?= $hr ?> //data: ['H1', '2-30 HST', '31-110 HST', '111-130 HST']
        },
        yAxis: {
            type: 'value',
            splitLine: {
                lineStyle: {
                    type: 'dashed'
                }
            },
        },
        series: [
        {
            name: 'Kapasitas Lapang',
            type: 'line',
            smooth: true,
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: <?= $kl ?>
        },        
        {
            name: 'KA Kering Angin',
            type: 'line',
            smooth: true,
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: <?= $ka ?>
        },
        {
            name: 'KA Setelah Siram',
            type: 'bar',
            smooth: true,
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: <?= $siram ?>
        },
        {
            name: 'Titik Layu Permanen',
            type: 'line',
            smooth: true,
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            // data: [624, 624, 624, 624]
            data: <?= $tlp ?>
        },
        {
            name: 'RAW',
            type: 'line',
            smooth: true,
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            // data: [624, 624, 624, 624]
            data: <?= $raw ?>
        }
        ]
    };

    // use configuration item and data specified to show chart
    myChart.setOption(option);
</script>

