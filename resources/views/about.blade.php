@include('inc.homeheader')
@include('inc.homemenu')
<article>
    <section class="innerpagecont">
      <div class="container">
                <div class="ieohead">
        <h2 class="heading-title text-center mb-2">About us</h2>
            </div>
    <div class="grey-bg inner-bannerbg systembannerbg ieobanner">
        <div class="container">
          <div class="col-ld-12 col-md-12 col-sm-12 col-12">
                        <p class="content text-center">  @if(is_object($about) > 0)
            @php echo str_replace(array("\r\n", "\r", "\n"), "<br />", $about->aboutus) @endphp
            @endif</p>
                    </div>
    </div>
     </div>
        </section>
  </article>



@include('inc.homefooter')
<script>
  $("body").addClass("innerpagebg");
</script>