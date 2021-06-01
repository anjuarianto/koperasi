<!-- Start Header -->
<?php $this->load->view('admin/header'); ?>
<!-- End Header -->

<!-- Start Content -->
<div class="card mb-4 border-bottom-primary">
	<div class="card-header bg-primary d-flex justify-content-between">
		<h6 class="m-0 font-weight-bold text-white my-auto"><?=$judul?></h6>
	</div>
	<div class="card-body">
		<div class="container">
        <h5 class="text-md-center pb-3">Sinkronisasi Database Lokal ke Online</h5>
        <div class="row form-group">
        
                    <label class="col-md-3 text-md-right">Last Sync :</label>
                    <div class="col-md-9">
                        <?=$last_sync?>
                    </div>
                    <label class="col-md-3 text-md-right">File Name :</label>
                    <div class="col-md-9">
                        <?=$file_name?>
                    </div>
                    <label class="col-md-3 text-md-right">Path Directory :</label>
                    <div class="col-md-9">
                        ./backup_db/
                    </div>
                    
                </div>
                
                <div class="row form-group">
                    <div class="col-lg-9 offset-lg-3">
                        <a href="<?=base_url()?>admin/export" class="btn btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-print"></i>
                            </span>
                            <span class="text">
                                Sync
                            </span>
                        </a>
                    </div>
                </div>
        </div>
	</div>
</div>
<!-- End Content -->

<!-- Start Footer -->
<?php $this->load->view('admin/footer'); ?>
<!-- End Footer -->