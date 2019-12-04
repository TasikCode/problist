	<header class="masthead bg-primary text-white text-center">
		
			<div class="container">
				<p><?php echo tanggal($laporan->laporan_tanggal);?></p>
				<h4 class="page-section-heading text-center text-uppercase text-secondary mb-0">" <?= $laporan->laporan_isi ;?> "</h4><br>
				<p><?= $laporan->laporan_nama;?> - <?= $laporan->laporan_email;?></p>
				<a class="btn btn-secondary btn-sm" href="<?= base_url();?>laporan/kategori/<?= $laporan->id_kategori ;?>">@ <?= $laporan->nama_kategori ;?></a>
			</div>
    </header>
    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
        	<div class="row" style="margin-bottom:40px">
		      		<div class="col-md-4"></div>
		      		<div class="col-md-4 text-center">
		      			<h4 style="color:#2c3e50">Status</h4>
		      		</div>
		      		<div class="col-md-4"></div>
		  		</div>
        	<div class="bs-stepper">
		      <div class="bs-stepper-header" role="tablist">
		        <div class="step">
		        	<button type="button" class="step-trigger <?php $status = $laporan->id_status; if($status == '1') { echo 'active';}?> " role="tab" data-toggle="tooltip" data-placement="top" title="<?php $status = $laporan->id_status; if($status == '1') { echo 'Laporan ini diterima namun belum ada yang menanggapi';}?>">
		            <span class="bs-stepper-circle">1</span><span class="text-header text-space <?php $status = $laporan->id_status; if($status == '1') { echo 'text-active';}?>">Diterima</span></button>
			    </div><div class="line"></div>
			    <div class="step">
			        <button type="button" class="step-trigger <?php $status = $laporan->id_status; if($status == '2') { echo 'active';}?>" role="tab" data-toggle="tooltip" data-placement="top" title="<?php $status = $laporan->id_status; if($status == '2') { echo 'Laporan ini telah diteruskan ke pihak berwenang';}?>">
			        <span class="bs-stepper-circle">2</span><span class="text-header text-space <?php $status = $laporan->id_status; if($status == '2') { echo 'text-active';}?>">Diteruskan</span></button>
			        </div><div class="line"></div>
			    <div class="step">
			        <button type="button" class="step-trigger <?php $status = $laporan->id_status; if($status == '3') { echo 'active';}?>" role="tab" data-toggle="tooltip" data-placement="top" title="<?php $status = $laporan->id_status; if($status == '3') { echo 'Laporan ini sedang dibahas dalam diskusi #tasikcode';}?>">
			        <span class="bs-stepper-circle">3</span><span class="text-header text-space <?php $status = $laporan->id_status; if($status == '3') { echo 'text-active';}?>">Didiskusikan</span></button>
			    </div><div class="line"></div>
			    <div class="step">
			        <button type="button" class="step-trigger <?php $status = $laporan->id_status; if($status == '4') { echo 'active';}?>" role="tab" data-toggle="tooltip" data-placement="top" title="<?php $status = $laporan->id_status; if($status == '4') { echo 'Laporan ini telah selesai';}?>">
			        <span class="bs-stepper-circle">4</span><span class="text-header text-space <?php $status = $laporan->id_status; if($status == '4') { echo 'text-active';}?>">Selesai</span></button> 
			    </div>
		        </div>
		      </div>
		      	<div class="row" style="margin-top:40px; margin-bottom:40px">
		      		<div class="col-md-4"></div>
		      		<div class="col-md-4 text-center">
		      			<h4 style="color:#2c3e50">Catatan</h4><br><br>
		      			Belum ada catatan mengenai laporan ini
		      		</div>
		      		<div class="col-md-4"></div>
		  		</div>
			<div class="row" style="margin-top:40px; margin-bottom:40px">
		      		<div class="col-md-2"></div>
		      		<div class="col-md-8 text-center">
		      			<h4 style="color:#2c3e50">Komentar</h4><br><br>
		      			<div id="disqus_thread"></div>
							<script>

							/**
							*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
							*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

							var disqus_config = function () {
							this.page.url = '<?php echo base_url(uri_string());?>';  // Replace PAGE_URL with your page's canonical URL variable
							this.page.identifier = '<?php echo base_url(uri_string());?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
							};

							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');
							s.src = 'https://lapor-kabayan.disqus.com/embed.js';
							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		      		</div>
		      		<div class="col-md-2"></div>
		  		</div>
        </div>
    </section>
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
