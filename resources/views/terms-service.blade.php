@include('inc.homeheader')
<div class="innerheadert">
@include('inc.homemenu')
</div>

<article>
   <section class="termspagecontent">
   <div class="systembannerbg">
    <div class="container">
      <div class="col-md-12 col-sm-12 col-xs-12 pl-0">
    <div class="own-heading text-center">
      <h2 class="text-uppercase headingt">Terms of Service</h2>
      <div class="bottom-u-line"></div>
    </div>

   
    <p> 
      @if(is_object($terms) > 0)
            @php echo str_replace(array("\r\n", "\r", "\n"), "<br />", $terms->termsservice) @endphp
      @endif
    </p>
   </div>
  </div>
  </div>
  </section>
</article>
@include('inc.homefooter')
<script>
$("body").addClass("innerpages-bg");
</script>