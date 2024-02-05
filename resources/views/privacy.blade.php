@include('layouts.header')
@include('layouts.menu')
<article class="innerpagecontent">	
	<section class="gray-bg">
	<div class="container sitecontainer">
    <h3 class="heading-title text-center pb-2">Privacy Policy</h3>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">		
				
            <p class="content">	{!! html_entity_decode($terms->privacy_policy) !!} </p>
		</div>					
		</div>
		</div>
</section>
	</article>
@include('layouts.footer')
<script>
	$("body").addClass("innerback");
</script>