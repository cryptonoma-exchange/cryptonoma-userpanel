@include('layouts.header')
@include('layouts.menu')
		<article class="innerpagecontent">	
	<section class="gray-bg">
	<div class="container sitecontainer">
    <h3 class="heading-title text-center pb-2">FAQ</h3>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">		
				
				<div class="accordion" id="accordian">
					@php $i=1;@endphp
        			@foreach($faq as $faqdet)
						<div class="card">
						@php $i++;@endphp
						<div class="card-header" role="tab">
						<h5 class="mb-0 panel-title">
						<a data-toggle="collapse" href="#faq{{$i}}" class="collapsed" aria-expanded="false" aria-controls="faq{{$i}}">
						<div>@php echo $faqdet->heading;@endphp</div>
						</a>
						</h5>
						</div>
						<div id="faq{{$i}}" class="collapse" role="tabpanel" data-parent="#accordian">
						<div class="card-body">@php echo $faqdet->desc;@endphp</div>
						</div>
						</div>
						@endforeach
        
                </div>
			</div>
            </div>
		</div>					
		</div>
		</div>
</section>
	</article>
@include('layouts.footer')


<script>
	$("body").addClass("innerback");
</script>