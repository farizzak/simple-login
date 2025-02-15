@extends('layout')

@section('title','Pegawai Create')

@section('content')

	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4>Tambah Pegawai</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content">

		<!-- Hover rows -->
		<div class="card">
			<div class="card-header header-elements-inline">
			</div>
			<div class="card-body">
				<form id="submit-form" class="form-validate-jquery" action="{{url('/pegawai')}}" method="post">
					@csrf
					<fieldset class="mb-3">
						<legend class="text-uppercase font-size-sm font-weight-bold">Data Pegawai</legend>

                        <div class="form-group row">
							<label class="col-form-label col-lg-2">Nama</label>
							<div class="col-lg-10">
								<input type="text" name="nama" class="form-control border-teal border-1 @error('nama') is-invalid @enderror" placeholder="Nama" required autofocus autocomplete="off" value="{{ old('nama') }}">
							</div>
						</div>
                        <div class="form-group row">
							 <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                            <div class="col-lg-10">
                                <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control pickadate-accessibility border-teal border-1" placeholder="Pilih Tanggal"  required>
                            </div>
						</div>
                        <div class="form-group row">
							<label class="col-form-label col-lg-2">Gelar</label>
							<div class="col-lg-10">
								<input type="text" name="gelar" class="form-control border-teal border-1 @error('gelar') is-invalid @enderror" placeholder="Gelar" required autofocus autocomplete="off" value="{{ old('gelar') }}">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-form-label col-lg-2">NIP</label>
							<div class="col-lg-10">
								<input type="text" name="nip" class="form-control border-teal border-1 @error('nip') is-invalid @enderror" placeholder="NIP" required autofocus autocomplete="off" value="{{ old('nip') }}">
							</div>
						</div>
                        
                        
					</fieldset>
					<div class="text-right">
						<a href="{{ url('/pegawai')}}" class="btn btn-light">Kembali <i class="icon-undo"></i></a>
						<button type="submit" class="btn btn-primary submitBtn">Simpan <i class="icon-paperplane ml-2"></i></button>
					</div>
				</form>
			</div>

		</div>
		<!-- /hover rows -->

	</div>
	<!-- /content area -->
@endsection

@section('js')
	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/notifications/pnotify.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/buttons/spin.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/buttons/ladda.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_inputs.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
	<script type="text/javascript">


        // Accessibility labels
        $('.pickadate-accessibility').pickadate({
            labelMonthNext: 'Go to the next month',
            labelMonthPrev: 'Go to the previous month',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            selectMonths: true,
            selectYears: 120,
            format: 'yyyy-mm-dd',
        });

        $('#submit-form').on('submit', function(e){
            var empty = false;
            var isKtpValid = true;

            $('#submit-form').find('[required]').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });

           
            if (empty || !isKtpValid) {
                $(".submitBtn").attr("disabled", false);
                return false;
            } else {
                return true;
            }
        });

        $(document).ready(function () {
            initializeValidation('#no_rekening');
            initializeValidation('#no_hp');

            function initializeValidation(selector) {
                const $input = $(selector);

                $input.val('');
                $input.off('input', validateNumberInput);
                $input.on('input', validateNumberInput);

                $input.on('paste', function(event) {
                    event.preventDefault();
                    const pastedData = event.originalEvent.clipboardData.getData('text');
                    const filteredData = pastedData.replace(/[^0-9]/g, '');

                    $input.val(filteredData);
                });
            }

            function validateNumberInput() {

                $(this).val($(this).val().replace(/\D/g, ''));
            }
        });

        $(document).ready(function () {
            const $identificationIdSelect = $('#identification_id');
            const $identificationNumberInput = $('#identification_number');
            const $ktpErrorDiv = $('#ktp-error');

            initializeValidation();

            $identificationIdSelect.on('change', function () {
                applyValidation($(this).val());
            });

            function initializeValidation() {
                const selectedId = $identificationIdSelect.val();
                applyValidation(selectedId);
            }

            function applyValidation(selectedId) {

                $identificationNumberInput.val('');
                $identificationNumberInput.off('input', validateNumberInput);
                $ktpErrorDiv.hide();

                if (selectedId == 1) {
                    $identificationNumberInput.attr('maxlength', 16);
                    $ktpErrorDiv.show().text('Nomor KTP harus terdiri dari 16 angka.');
                    $identificationNumberInput.on('input', validateNumberInput);
                } else if (selectedId == 2) {
                    $identificationNumberInput.removeAttr('maxlength');
                    $ktpErrorDiv.hide();
                    $identificationNumberInput.on('input', validateNumberInput);
                } else {
                    $identificationNumberInput.attr('maxlength', 16);
                    $ktpErrorDiv.hide();
                    $identificationNumberInput.on('input', validateNumberInput);
                }
            }

            function validateNumberInput() {
                const selectedId = $identificationIdSelect.val();

                if (selectedId == 1) {
                    $identificationNumberInput.val($identificationNumberInput.val().replace(/\D/g, ''));
                    if ($identificationNumberInput.val().length !== 16) {
                        $ktpErrorDiv.show().text('Nomor KTP harus terdiri dari 16 angka.');
                    } else {
                        $ktpErrorDiv.hide();
                    }
                } else {
                    $ktpErrorDiv.hide();
                }
            }
        });


		var FormValidation = function() {

		    // Validation config
		    var _componentValidation = function() {
		        if (!$().validate) {
		            console.warn('Warning - validate.min.js is not loaded.');
		            return;
		        }

		        // Initialize
		        var validator = $('.form-validate-jquery').validate({
		            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
		            errorClass: 'validation-invalid-label',
		            //successClass: 'validation-valid-label',
		            validClass: 'validation-valid-label',
		            highlight: function(element, errorClass) {
		                $(element).removeClass(errorClass);
		            },
		            unhighlight: function(element, errorClass) {
		                $(element).removeClass(errorClass);
		            },
		            // success: function(label) {
		            //    label.addClass('validation-valid-label').text('Success.'); // remove to hide Success message
		            //},

		            // Different components require proper error label placement
		            errorPlacement: function(error, element) {

		                // Unstyled checkboxes, radios
		                if (element.parents().hasClass('form-check')) {
		                    error.appendTo( element.parents('.form-check').parent() );
		                }

		                // Input with icons and Select2
		                else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
		                    error.appendTo( element.parent() );
		                }

		                // Input group, styled file input
		                else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
		                    error.appendTo( element.parent().parent() );
		                }

		                // Other elements
		                else {
		                    error.insertAfter(element);
		                }
		            },
		            messages: {
		                nama_lengkap: {
		                    required: 'Mohon diisi.'
		                },
		                // email: {
		                //     required: 'Mohon diisi.'
		                // },
		            },
		        });

		        // Reset form
		        $('#reset').on('click', function() {
		            validator.resetForm();
		        });
		    };

		    // Return objects assigned to module
		    return {
		        init: function() {
		            _componentValidation();
		        }
		    }
		}();

		// Initialize module
		// ------------------------------

		document.addEventListener('DOMContentLoaded', function() {
		    FormValidation.init();
		});
	</script>
	<script type="text/javascript">
		$( document ).ready(function() {

			var $select = $('.form-control-select2').select2();

			// Default style
	        @if(session('error'))
	            new PNotify({
	                title: 'Error',
	                text: '{{ session('error') }}.',
	                icon: 'icon-blocked',
	                type: 'error'
	            });
            @endif
            @if ( session('success'))
	            new PNotify({
	                title: 'Success',
	                text: '{{ session('success') }}.',
	                icon: 'icon-checkmark3',
	                type: 'success'
	            });
            @endif
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					new PNotify({
						title: 'Error',
						text: '{{ $error }}.',
						icon: 'icon-blocked',
						type: 'error'
					});
				@endforeach
			@endif

		});
	</script>
@endsection
