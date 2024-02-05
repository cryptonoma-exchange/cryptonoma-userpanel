@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
			<li><a href="{{ route('profile') }}"><img src="{{ url('images/profile1.svg') }}" />
					<div>Profile</div>
				</a></li>
			<li><a href="{{ route('setting') }}"><img src="{{ url('images/security1.svg') }}" />
					<div>Security</div>
				</a></li>
			<li><a href="{{ route('support') }}"><img src="{{ url('images/support1.svg') }}" />
					<div>Support</div>
				</a></li>
			<li><a href="{{ route('bank') }}" class="active"><img src="{{ url('images/bank1.svg') }}" />
					<div>Bank</div>
				</a></li>
			<li><a href="{{ route('accountactivity') }}"><img src="{{ url('images/account1.svg') }}" />
					<div>Account Activity</div>
				</a></li>
		</ul>
	</div>

	<article class="gridparentbox">
		<div class="container sitecontainer">
			<div class="panelcontentbox bankview">
				<h2 class="heading-box">Bank Details</h2>
				<div class="tabrightbox">
					<a href="" class="btn sitebtn borderbtn" id="create_record" data-toggle="modal" data-target="#addbank">Add
						bank</a>
				</div>

				<div class="table-responsive sitescroll" data-simplebar>
					@if (session()->has('bank_success_response'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
									aria-hidden="true">&times;</span></button><strong>@lang('common.Success')!</strong>
							{{ session()->get('bank_success_response') }}
						</div>
					@endif
					<table class="table sitetable table-responsive-stack" id="user_table">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Bank Name</th>
								<th>Bank Nationality</th>
								<th>Swift Code</th>
								<th>Account No</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if (count($bank_details) > 0)
								@foreach ($bank_details as $support_tickets)
									<tr>

										<td>{{ $loop->iteration }}
										<td>{{ $support_tickets->bank_name }}</td>
										<td>{{ $support_tickets->countrydata }}</td>
										<td>{{ $support_tickets->swift_code }}</td>
										<td>{{ $support_tickets->account_no }}</td>
										<td>
											<a id="edit" data-id="{{ Crypt::encrypt($support_tickets->id) }}" style="color:white;"
												class="btn sitebtn viewbtn">Edit</a>
											<a href="javascript:void(0);" id="delete" data-toggle="modal" data-target='#modal_send_from_address'
												class="btn sitebtn viewbtn" onclick="deleteBank('{{ $support_tickets->id }}')">@lang('common.bankdetails.Delete')</a>
										</td>

									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="9">@lang('common.bankdetails.norecordsfound')!</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
					<div class="pagination-tt clearfix">
						@if (count($bank_details) > 0)
							{{ $bank_details->links() }}
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade modalbgt" id="modal_send_from_address" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">@lang('common.bankdetails.deletebank')</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>

					</div>
					<div id="confirm_result">
						<div class="modal-body">
							<h6 class="mdlpara content t-black t-gray">@lang('common.bankdetails.remove')</h6>
						</div>
						<div class="modal-footer" id="model_footer_form">

							<form method="post" autocomplete="off" id="confirm_delete_bank_details">
								{{ csrf_field() }}
								<input type="hidden" name="id" id="bank_id">
								<button id="confirm_btn" type="submit" class="btn btn-sm btn-success">@lang('common.bankdetails.yes')</button>
								<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">@lang('common.bankdetails.no')</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>

	</article>
	@include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')

<div class="modal fade modalbgt" id="addbank">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Bank</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form class="siteformbg" id="bank_form" autocomplete="off">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>@lang('common.addbankdetails.bankname') <span class="t-red"> *</span></label>
								<input type="text" name="bank_name" id="bank_name" class="form-control" required>
							</div>
							<span class="text-danger" id="error_bank_name"></span>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Account Number <span class="t-red"> *</span></label>
								<input type="text" name="account_no" id="account_no" class="form-control" required />
							</div>
							<span class="text-danger" id="error_account_no"></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Swift Code <span class="t-red"> *</span></label>
								<input type="text" name="swift_code" id="swift_code" class="form-control" required />
							</div>
							<span class="text-danger" id="error_swift_code"></span>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Bank Nationality <span class="t-red"> *</span></label>
								<select name="countrydata" id="countrydata" class="form-control" required>
										<option value="">Select your country</option>
										@foreach ($country as $countrys)
											<option @if ($countrys->id == $user->country) selected @endif>{{ $countrys->name }}</option>
										@endforeach
								</select>
							</div>
							<span class="text-danger" id="error_countrydata"></span>
						</div>
					</div>
					<div class="form-group mt-2 text-center">
						<input type="hidden" id="hidden_id" name="hidden_id" />
						<input type="button" class="btn sitebtn" id="action_button" value="Add Bank" onclick="BankDetail();" />
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	function BankDetail() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "post",
			url: "{{ url('addupdateBank') }}",
			dataType: "json",
			data: $('#bank_form').serialize(),
			success: function(data) {

				if (data.status == 'success') {
					$('.loader').hide();
					window.location.href = "{{ url('bank') }}";


				} else {
					$('.loader').hide();
					if (data.msg.bank_name != '' && data.msg.bank_name != undefined)
						$('#error_bank_name').html(data.msg.bank_name);
					else
						$('#error_bank_name').html('');

					if (data.msg.account_no != '' && data.msg.account_no != undefined)
						$('#error_account_no').html(data.msg.account_no);
					else
						$('#error_account_no').html('');

					if (data.msg.swift_code != '' && data.msg.swift_code != undefined)
						$('#error_swift_code').html(data.msg.swift_code);
					else
						$('#error_swift_code').html('');


					if (data.msg.countrydata != '' && data.msg.countrydata != undefined)
						$('#error_countrydata').html(data.msg.countrydata);
					else
						$('#error_countrydata').html('');

				}
			}
		});
		return false;

	}

	$(document).ready(function() {

		$('#create_record').click(function() {
			document.getElementById("bank_form").reset();
			$('.modal-title').text("Add Bank");
			$('#action_button').val("Add Bank");
			$('.text-danger').html('');
		});

		$('#edit').click(function() {
			$('.modal-title').text("Update Bank");
			$('#action_button').val("Update Bank");
		});

		$('#delete').click(function() {
			$('#myModalLabel').text("Delete Bank");
		});

	});

	$(document).on('click', '#edit', function() {
		var id = $(this).attr('data-id');
		$.ajax({
			url: "bankDetail/" + id,
			method: 'get',
			dataType: "json",
			success: function(html) {
				$('#addbank').modal('toggle');
				$('#bank_name').val(html.bank.bank_name);
				$('#account_no').val(html.bank.account_no);
				$('#swift_code').val(html.bank.swift_code);
				$('#countrydata').val(html.bank.countrydata);
				$('#hidden_id').val(html.bank.id);
				$('.modal-title').text("Update Bank");
				$('#action_button').val("Update");
				$('.text-danger').html('');
			}
		})
	});
</script>

<script>
	function deleteBank(id) {
		$('#bank_id').val(id);
	}

	$('#confirm_delete_bank_details').on('submit', function() {
		$('#confirm_btn').attr('disabled', true);
		var formData = $('#confirm_delete_bank_details').serialize();
		$.ajax({
			type: "post",
			url: "{{ url('deleteBank') }}",
			dataType: "json",
			data: formData,
			success: function(data) {
				$('#confirm_result').html(
					'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success! </strong>' +
					data.msg + '</div>');
				window.setTimeout(function() {
					window.location.href = "{{ url('bank') }}";
				}, 1000);
			}
		});
		return false;
	});
</script>
