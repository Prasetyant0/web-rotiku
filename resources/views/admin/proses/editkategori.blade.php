
{{--  head  --}}
@include('layouts.head')

<body>
	<div class="wrapper">
		@include('layouts.sidebar')

		<div class="main">

            {{--  navbar  --}}
                @include("layouts.navbar")
            {{--  endnavbar  --}}
			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Edit Kategori Roti</h1><p class="badge bg-primary ms-2"
							target="_blank"> rotiku <i class="fas fa-fw fa-external-link-alt"></i></p>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-4">
								<div class="card-header">
									<h5 class="card-title">Edit Kategori Roti</h5>
									<h6 class="card-subtitle text-muted">Edit data berikut untuk mengedit kategori roti toko kamu</h6>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="">
											<div class="mb-3">
												{{-- {{ route('admin.dataroti.update', $roti->id_roti) }} --}}
												<form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="post" enctype="multipart/form-data">
													@csrf
													@method('PUT')
    												
                                                    <img id="preview" src="{{ asset('gallery/' . $kategori->gambar) }}"
                                                         style="max-width: 200px; max-height:200px;">
                                                    <input type="file" name="gambar" style="margin-top: 20px" value="{{ $kategori->gambar }}" onchange="previewImage(event)" class="form-control">
                                            </div>

                                            <div class="mb-3">
												<label class="form-label" for="kategori">Kategori Roti</label>
												<input id="kategori" name="kategori" type="text" class="form-control" value="{{ $kategori->kategori }}">
											</div>
										</div>
									</div>
									<hr>
									<button class="btn btn-primary me-1" type="submit">Edit kategori</button>
                                    </form>
                                </div>
							</div>
						</div>
					</div>
			</main>
	@include('layouts.footer')
