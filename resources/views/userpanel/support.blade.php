@include('layouts.userpanel.header')
<style>
	.user-chat-img{
		width: 40px;
    height: 40px;
    background: #367aff;
    vertical-align: middle;
    border-style: none;
    border-radius: 50px;
    position: relative;
    top: 9px;
    margin-top: -18px;
    padding: 1px 2px;
	}
</style>
<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
			<li><a href="{{ route('profile') }}"><img src="{{ url('userpanel/images/profile1.svg') }}" />
					<div>Profile</div>
				</a></li>
			<li><a href="{{ route('setting') }}"><img src="{{ url('userpanel/images/security1.svg') }}" />
					<div>Security</div>
				</a></li>
			<li><a href="{{ route('support') }}" class="active"><img src="{{ url('userpanel/images/support1.svg') }}" />
					<div>Support</div>
				</a></li>
			<li><a href="{{ route('bank') }}"><img src="{{ url('userpanel/images/bank1.svg') }}" />
					<div>Bank</div>
				</a></li>
			<li><a href="{{ route('accountactivity') }}"><img src="{{ url('userpanel/images/account1.svg') }}" />
					<div>Account Activity</div>
				</a></li>
		</ul>
	</div>
	<article class="gridparentbox">
		<div class="container sitecontainer">
			<div class="openticketlist panelcontentbox">
				<h2 class="heading-box">Support</h2>
				<div class="innerpagetab historytab">
					<ul class="nav nav-tabs tabbanner" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="modal" href="#ticket">Create Ticket
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#openticket">
								Open Tickets
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#closeticket">
								Closed Tickets
							</a>
						</li>
					</ul>
				</div>
				@php $i=1; @endphp
				<div class="tab-content">
					<div id="openticket" class="tab-pane fade in show active">
						<div class="table-responsive sitescroll" data-simplebar>
							<table class="table sitetable table-responsive-stack" id="table1">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Ticket Id</th>
										<th>Subject</th>
										<th>Message</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody x-data="showChat">
									@if (count($support_ticket) > 0)
										@foreach ($support_ticket as $support_tickets)
											@php
												$userticket_count = \App\Models\Supportchat::where([['uid', '=', $support_tickets->uid], ['user_status', '=', '0'], ['ticketid', '=', $support_tickets->ticket_id]])->count();
											@endphp
											@if ($support_tickets->status == 0)
												<tr>
													<td>{{ $loop->index + $support_ticket->firstItem() }}</td>
													<td>{{ $support_tickets->ticket_id }}</td>
													<td>{{ $support_tickets->subject }}</td>
													<td>{{ mb_strimwidth($support_tickets->message, 0, 50, '...') }}
													</td>
													<td>
														<a href="#" data-id="{{ Crypt::encrypt($support_tickets->ticket_id) }}" @click.prevent="show($el)"
															class="btn sitebtn chat_btn viewbtn">Chat <i class="d-none fa fa-spinner fa-spin" aria-hidden="true"></i>
															@if ($userticket_count > 0)
																<span class="badge">{{ $userticket_count }}</span>
															@endif
														</a>
													</td>
												</tr>
											@endif
										@endforeach
									@else
										<tr>
											<td colspan="6">@lang('common.support.norecordsfound')!</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
							<div class="pagination-tt clearfix">
								@if ($support_ticket->count())
									{{ $support_ticket->links() }}
								@endif
							</div>
						</div>
					</div>
					@php $j=1; @endphp
					<div id="closeticket" class="tab-pane fade in">
						<div class="table-responsive sitescroll" data-simplebar>
							<table class="table sitetable table-responsive-stack" id="table2">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Ticket Id</th>
										<th>Subject</th>
										<th>Message</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@php
										$j = 1;
										$limit = 3;
										if (isset($_GET['page'])) {
										    $page = $_GET['page'];
										
										    $j = ($support_ticket->currentpage() - 1) * $support_ticket->perpage() + 1;
										} else {
										    $j = 1;
										}
									@endphp
									@if (count($support_ticket) > 0)
										@foreach ($support_ticket as $support_tickets)
											@php
												$userticket_count = \App\Models\Supportchat::where([['uid', '=', $support_tickets->uid], ['user_status', '=', '0'], ['ticketid', '=', $support_tickets->ticket_id]])->count();
											@endphp

											<tr>
												@if ($support_tickets->status == 1)
													<td>{{ $j }}</td>
													<td>{{ $support_tickets->ticket_id }}</td>
													<td>{{ $support_tickets->subject }}</td>
													<td>{{ mb_strimwidth($support_tickets->message, 0, 50, '...') }}
													</td>
													<td>{{ 'Ticket Closed' }}

														@php $j++; @endphp
													</td>
												@endif
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="6">@lang('common.support.norecordsfound')!</td>
										</tr>
									@endif

								</tbody>
							</table>
						</div>
						<div class="pagination-tt clearfix">
							@if ($support_ticket->count())
								{{ $support_ticket->links() }}
							@endif
						</div>
					</div>

				</div>
			</div>

		</div>
	</article>

	@include('layouts.userpanel.footermenu')
</div>

@include('layouts.userpanel.footer')

<div class="modal fade modalbgt" id="ticket" x-data="createTicket">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Ticket</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<template x-if="status && message">
					<div class="text-center text-success" x-text="message"></div>
				</template>
				<template x-if="!status && message && jQuery.isEmptyObject(errors)">
					<div class="text-center text-danger" x-text="message"></div>
				</template>
				<form class="siteformbg" x-bind="form_container" autocomplete="off">
					@csrf
					<div class="form-group">
						<label>Title <span class="t-red"> *</span></label>
						<input x-bind="form_elements.title" type="text" name="title" class="form-control" required="required">
						<template x-for="error in getErrors('title')">
							<strong class="text text-danger" x-text="error"></strong>
						</template>
					</div>
					<div class="form-group">
						<label>Enter your message <span class="t-red"> *</span></label>
						<textarea x-bind="form_elements.message" class="form-control" rows="3" name="message" required="required"></textarea>
						<template x-for="error in getErrors('message')">
							<strong class="text text-danger" x-text="error"></strong>
						</template>
					</div>
					<div class="form-group mt-2 text-center">
						<button type="submit" class="btn sitebtn" :class="{ 'opacity-50 disabled': loading }"
							value="Submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modalbgt chatmodal" id="chat" x-data="sendMessage" @message-update.window="message_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Chat</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="chatbox ticketchat">
					<ul class="chat chatboxscroll" style="max-height: unset">
						<template x-for="message in messages">
							<li class="clearfix">
								<template x-if="message.reply != null">
									<div>
										<div class="chat-img pull-left"><img src="{{ url('userpanel/images/chat-1.jpg') }}" class="img-circle">
										</div>
										<div class="chat-body pull-left">
											<div class="header">
												<h4 class="primary-font">@lang('common.chat.Admin')</h4>
												<p x-text="message.reply"></p>
												<h5><i class="fa fa-calendar" aria-hidden="true"></i>
													<span x-text="message.at"></span>
													@lang('common.profile.ago')</h5>
											</div>
										</div>
									</div>
								</template>
								<template x-if="message.message != null">
									<div>
										<div class="user-chat-img chat-img pull-right"><img src="@if ($user->profileimg) {{ $user->profileimg }} @else {{ url('/images/profile.svg') }} @endif" class="img-circle m-0">
										</div>
										<div class="chat-body pull-right">
											<div class="header">
												<h4 class="primary-font text-right">{{ $user->name }}</h4>
												<a target="_blank" x-show="message.proof" x-bind:href="message.proof"><img width="200px" class="mb-2" x-bind:src="message.proof"></a>
												<p x-text="message.message"></p>
												<h5><i class="fa fa-calendar" aria-hidden="true"></i>
													<span x-text="message.at"></span>
													@lang('common.profile.ago')</h5>
											</div>
										</div>
									</div>
								</template>
							</li>
						</template>
					</ul>
					<div class="chat-foot">
						<form id="chatformid" class="siteformbg" method="POST" autocomplete="off" x-bind="form_container">
							@csrf
							<input type="hidden" name="ticket_id" id="ticket_id" x-model="ticket_id">
							<div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">

								<div class="form-group ">

									<img
										src="@if (isset($Kycstatus->proofpaper)) {{ $Kycstatus->proofpaper }}@else{{ url('userpanel/images/back.svg') }} @endif"
										id="chatimage"><br>
									<label for="img_upload_id" class="custom-file-upload"><i class="fa fa-cloud-upload"></i> Upload
										Image</label>
									<input id="img_upload_id" name="image" class="img_upload_id1" accept="image/*" type="file"
										style="display:none;">
									<label id="file-name3" class="custm-f"></label>
									<template x-for="error in getErrors('image')">
										<strong class="text text-danger" x-text="error"></strong>
									</template>
								</div>
								<div class="form-group">
									<label>Enter your message <span class="t-red"> *</span></label>
									<textarea placeholder="@lang('common.chat.Type your message here')" name="message" id="message" class="form-control" rows="5"
									 required="required"></textarea>
									<template x-for="error in getErrors('message')">
										<strong class="text text-danger" x-text="error"></strong>
									</template>
								</div>
								<template x-if="status && message">
									<div class="text-center text-success" x-text="message"></div>
								</template>
								<template x-if="!status && message && jQuery.isEmptyObject(errors)">
									<div class="text-center text-danger" x-text="message"></div>
								</template>
								<div class="form-group text-center">
									<button type="submit" class="btn sitebtn" :class="{ 'opacity-50 disabled': loading }">
										Send
										 <i class="fa fa-spinner fa-spin" x-show="loading" aria-hidden="true"></i>
									</button>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	@php $uid = \Crypt::encrypt(Auth::user()->id); @endphp

	function createTicket() {
		return {
			errors: {},
			status: false,
			loading: false,
			message: "",
			url: @json(url('submitNewTicket')),
			form: {
				_token: @json(csrf_token()),
				title: '',
				message: '',
			},
			form_elements: {
				title: {
					['x-model']: "form.title",
				},
				message: {
					['x-model']: "form.message",
				},
			},
			form_container: {
				['@submit.prevent']: 'submit'
			},
			submit() {
				this.errors = {};
				this.status = false;
				this.message = "";
				this.loading = true;
				axios({
					method: 'POST',
					url: this.url,
					data: this.form
				}).then((response) => {
					var data = response.data;
					this.status = data.success;
					this.message = data.message;
					if (!data.success) {
						this.errors = data.data;
						this.loading = false;
					} else {
						this.form.title = "";
						this.form.message = "";
						window.location.href = @json(url('/support'));
					}
				}).catch(() => {
					this.loading = false;
					this.status = false;
					this.message = "Some thing went wrong. Try again later!";
				});
			},
			getErrors(name) {
				var errors = this.errors;
				if (errors.hasOwnProperty(name)) {
					return errors[name];
				} else {
					return [];
				}
			}
		}
	}

	function sendMessage() {
		return {
			ticket_id: "",
			errors: {},
			status: false,
			messages: [],
			loading: false,
			message: "",
			url: @json(url('sendMessage')),
			getErrors(name) {
				var errors = this.errors;
				if (errors.hasOwnProperty(name)) {
					return errors[name];
				} else {
					return [];
				}
			},
			form_container: {
				['@submit.prevent']: 'submit',
				['x-ref']: 'form_container'
			},
			message_update($event){
				this.messages = $event.detail.messages;
				this.ticket_id = $event.detail.ticket_id;
			},
			submit() {
				this.errors = {};
				this.status = false;
				this.message = "";
				this.loading = true;
				axios({
					method: 'POST',
					url: this.url,
					data: new FormData(this.$refs.form_container)
				}).then((response) => {
					var data = response.data;
					this.status = data.success;
					this.message = data.message;
					if (!data.success) {
						this.errors = data.data;
					} else {
						window.dispatchEvent(new CustomEvent('message-update', {
							detail: {
									messages: data.data.messages,
									ticket_id: data.data.ticket_id
							}
						}));
						$(this.$refs.form_container).find(
							"input[name='message'], input[name='image'], textarea[name='message']").val("");
						$(this.$refs.form_container).find("img").attr("src", @json(url('userpanel/images/back.svg')));
					}
				}).catch((err) => {
					this.status = false;
					this.message = "Some thing went wrong. Try again later!";
				}).then(() => {
					this.loading = false;
				});
			}
		}
	}

	function showChat() {
		return {
			loading: false,
			messages: [],
			show($el) {
				var ticket_id = $($el).data("id");
				$(`.chat_btn i`).addClass("d-none");
				$(`.chat_btn[data-id="${ticket_id}"] i`).removeClass("d-none");
				$('#chat').modal('hide');
				this.messages = [];
				axios({
					method: 'POST',
					url: @json(route('support.messages')),
					data: {
						_token: @json(csrf_token()),
						id: ticket_id
					}
				}).then((response) => {
					var data = response.data;
					if (!data.success) {
						
					} else {
						window.dispatchEvent(new CustomEvent('message-update', {
							detail: {
									messages: data.data.messages,
									ticket_id: data.data.ticket_id
							}
						}));
						$('#chat').modal('show');
					}
					$(`.chat_btn i`).addClass("d-none");
				}).catch((error) => {
					$(`.chat_btn i`).addClass("d-none");
				});
			}
		}
	}
</script>

<script>
	$(".img_upload_id1").change(function() {
		var limit_size = 2 * 1024;
		var photo_size = Math.round((this.files[0].size / 1024));
		if (photo_size > limit_size) {
			$("#chatmessage").attr('disabled', true);
			$('.img_upload_id1').val("");
			alert('Image Size Larger than 2MB');
			$("#file-name3").text('');
		} else {
			$(".img_upload_id1").text(this.files[0].name);
			$("#chatmessage").attr('disabled', false);
			var file = document.getElementById('img_upload_id').value;
			var ext = file.split('.').pop();
			switch (ext) {
				case 'jpg':
				case 'JPG':
				case 'Jpg':
				case 'jpeg':
				case 'JPEG':
				case 'Jpeg':
				case 'png':
				case 'PNG':
				case 'Png':
					readURLvalida_profile(this);
					break;
				default:
					alert('Upload your profile like jpeg, jpg, png');
					$("#file-name3").text('');
					break;
			}
		}
	});

	function readURLvalida_profile(input) {
		var limit_size = 2 * 1024;
		var photo_size = Math.round((input.files[0].size / 1024));
		if (photo_size > limit_size) {
			alert('Image size larger than 12MB');
		} else {
			if (input.files && input.files[0]) {
				$("#file-name1").text(input.files[0].name);
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#chatimage').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	}
</script>

@if (!empty($chat_code) && $chat_code == 5)
	<script>
		$(function() {
			$("#chat").modal('show');
		});
	</script>
@endif
