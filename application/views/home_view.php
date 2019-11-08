    <!-- Masthead -->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <?= $message; ?>
            <!-- Masthead Avatar Image -->
            <img class="masthead-avatar mb-5" src="<?php echo base_url();?>assets/img/laporkabayan_icon.png" alt="laporkabayan">

            <!-- Masthead Subheading -->
            <br><br><br>
            <center>
                <p>Ayo ikut berpartisipasi, Kirimkan ide, saran, keluhan atau permasalahan yang kamu rasakan di Kota Tasikmalaya supaya kita bisa melakukan upaya bersama untuk menghadirkan solusinya. Laporan-laporan yang masuk menjadi bahan pertimbangan kami di #tasikcode untuk mengembangkan alat-alat yang mungkin bisa membantu mengatasi masalah-masalah yang dilaporkan. Silahkan cantumkan laporan sesuai kategori supaya tidak paciweuh ya guys!</p><br><br>
                <a href="<?= base_url();?>laporan/kategori/1" class="btn btn-secondary right-space">DOKUMEN & PERIZINAN</a>
                <a href="<?= base_url();?>laporan/kategori/2" class="btn btn-secondary right-space">TRANTIB</a>
                <a href="<?= base_url();?>laporan/kategori/3" class="btn btn-secondary right-space">PERUMAHAN & BANGUNAN</a>
                <a href="<?= base_url();?>laporan/kategori/4" class="btn btn-secondary right-space">TRANSPORTASI & JALAN</a>
                <a href="<?= base_url();?>laporan/kategori/5" class="btn btn-secondary right-space">INTERNET & TELEKOMUNIKASI</a>
                <a href="<?= base_url();?>laporan/kategori/6" class="btn btn-secondary right-space">LINGKUNGAN & PERSAMPAHAN</a>
                <a href="<?= base_url();?>laporan/kategori/7" class="btn btn-secondary right-space">KESEHATAN</a>
            </center>

        </div>
    </header>
    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">TERBARU</h2>

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
                        <?php foreach ($laporan as $data) {?>   
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

    <!-- Contact Section -->
    <section class="page-section" id="lapor">
        <div class="container">

            <!-- Contact Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ayo Lapor</h2>
            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Contact Section Form -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <?php echo form_open('laporan/add');?>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Nama</label>
                                <input class="form-control" name="nama" placeholder="Nama" >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Alamat Email</label>
                                <input class="form-control" name="email" type="email" placeholder="Email" >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Nomor Telepon</label>
                                <input class="form-control" name="no_tel" type="tel" placeholder="Nomor Telepon" >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Kategori Laporan</label><br>
                                <select id="inputState" class="form-control" name="kategori">
                                <option value="">No Selected</option>
                                <?php foreach($kategoris as $kategori){?>
                                <option value="<?php echo $kategori->id_kategori;?>"><?php echo $kategori->nama_kategori;?></option>
                                <?php }?>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Pesan</label>
                                <textarea class="form-control" name="isi" rows="5" placeholder="Pesan" ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                        <br><br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Kirim</button>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>

        </div>
    </section>