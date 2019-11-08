
    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="portfolio" style="margin-top:80px">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?= $nama_kategori->nama_kategori;?></h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div><br><br>

            <div class="container">
                <table class="table table-borderless table-striped">
                    <tbody>
                        <?php foreach ($kategori as $data) {?>   
                        <tr>
                            <td style="vertical-align: middle">
                                <h3 itemprop="title">
                                    <?php 
                                        $raw = $data->laporan_isi;
                                        $isi = substr($raw, 0, 60);
                                        if(strlen($raw)>60){
                                            echo $isi . "...";
                                        }else{
                                            echo $isi;
                                        } 
                                    ?>        
                                </h3>
                            </td>
                            <td style="vertical-align: middle">
                                <h3>
                                    <?php 
                                        $tanggal = $data->laporan_tanggal;
                                        echo tanggal_short($tanggal);
                                    ?> 
                                </h3>
                            </td>
                            <td style="vertical-align: middle"><a href="<?= base_url();?>laporan/detail/<?= $data->id_laporan;?>" type="button" class="btn btn-primary"><i class="lni-chevron-right"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </section>