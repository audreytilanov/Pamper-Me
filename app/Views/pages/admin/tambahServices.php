<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Tambah Service</h4>
						<div class="btn-group btn-group-page-header ml-auto">
							<button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu">
								<div class="arrow"></div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Tambah Service</h4>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
										<i class="fa fa-plus"></i>
										Tambah Service
									</button>
								</div>
							</div>
							<div class="card-body">
								<!-- Modal Tambah Halaman -->
								<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-title">
													<span class="fw-mediumbold">
													Tambah</span> 
													<span class="fw-light">
														Products
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="small">Create a new row using this form, make sure you fill them all</p>
												<form>
													<div class="form-group">
														<label for="namaProduct">Nama Product</label>
														<input type="email" class="form-control" id="namaProduct" aria-describedby="emailHelp" placeholder="">
													</div>
													<div class="form-group">
														<label for="kategori">kategori</label>
														<input type="email" class="form-control" id="kategori" aria-describedby="emailHelp" placeholder="">
													</div>
													<div class="form-group">
														<label for="harga">Harga Produk</label>
														<input type="email" class="form-control" id="harga" aria-describedby="emailHelp" placeholder="">
													</div>
													<div class="form-group">
														<label for="tambahGambar">Tambah Gambar</label>
														<input type="file" class="form-control-file" id="tambahGambar">
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
											<div class="modal-footer no-bd">
												<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>

								<!-- Modal Edit Produk -->
								<div class="modal fade" id="EditProduk" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-title">
													<span class="fw-mediumbold">
													Tambah</span> 
													<span class="fw-light">
														Products
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="small">Create a new row using this form, make sure you fill them all</p>
												<form>
													<div class="form-group">
														<label for="namaProduct">Nama Product</label>
														<input type="email" class="form-control" id="namaProduct" aria-describedby="emailHelp" placeholder="">
													</div>
													<div class="form-group">
														<label for="kategori">kategori</label>
														<input type="email" class="form-control" id="kategori" aria-describedby="emailHelp" placeholder="">
													</div>
													<div class="form-group">
														<label for="harga">Harga Produk</label>
														<input type="email" class="form-control" id="harga" aria-describedby="emailHelp" placeholder="">
													</div>
													<div class="form-group">
														<label for="tambahGambar">Tambah Gambar</label>
														<input type="file" class="form-control-file" id="tambahGambar">
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
											<div class="modal-footer no-bd">
												<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>

								
								

								<div class="table-responsive">
									<table id="add-row" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Nama Produk</th>
												<th>Kategori</th>
												<th>Harga</th>
												<th style="width: 10%">Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Nama Produk</th>
												<th>Kategori</th>
												<th>Harga</th>
												<th>Action</th>
											</tr>
										</tfoot>
										<tbody>
											<tr>
												<td>Blissful Baby Swim</td>
												<td>115.000 / 15 Menit</td>
												<td>Baby</td>
												<td>
													<div class="form-button-action">
														<button type="button" data-toggle="modal" data-target="#EditProduk" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
															<i class="fa fa-edit"></i>
														</button>
														<td>
															<button type="button" class="btn btn-danger" id="alert_demo_7">Delete</button>		
														</td>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
<!-- End Tambah Services -->

<?= $this->endSection() ?>
