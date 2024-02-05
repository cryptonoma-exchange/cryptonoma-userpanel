@include('inc.homeheader')
<div class="innerheadert">
@include('inc.homemenu')
</div>

<article>
   <section class="termspagecontent">
   <div class="systembannerbg">
    <div class="container">
       <div class="apibanner">
					<div class="text-center loginbgbannert">
						<h2 class="text-uppercase headingt">API Documnetation</h2> 
						 <div class="bottom-u-line"></div>
					</div>
					<div class="apiflexbox">
						<div class="col-lg-3 col-md-5 col-sm-12 col-12 apiciontenttext">
							<div class="apilistcontent">
								<h4>REST API</h4>
								<ul class="listsetup">
									@forelse($data['rest'] as $rest)
									<li><a href="{{url('apidoc/'.$rest['id'])}}">{{$rest['title']}}</a></li>
									@empty
									@endforelse
								</ul>
							</div>
							<div class="apilistcontent">
								<h4>Websocket</h4>
								<ul class="listsetup">
									@forelse($data['websocket'] as $websocket)
									<li><a href="{{url('apidoc/'.$websocket['id'])}}">{{$websocket['title']}}</a></li>
									@empty
									@endforelse
								</ul>
							</div>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-12">
							<h4>{{$data['listdata']['title']}}</h4>
							{!! $data['listdata']['desc'] !!}
							
						</div>
					</div>
				</div>
  </div>
  </div>
  </section>
</article>

@include('inc.homefooter')
<script>
$("body").addClass("innerpages-bg");
</script>

  