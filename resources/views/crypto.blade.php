@include('inc.homeheader')
@include('inc.homemenu')
<article>
        <section class="innerpagecont">
            <div class="container">
                <div class="ieohead">
                <h2 class="heading-title text-center mb-2">Crypto Lending</h2>
            </div>
        <div class="grey-bg inner-bannerbg">
                <div class="container">
                    <div class="col-ld-12 col-md-12 col-sm-12 col-12">
                        <p class="content">@php echo $terms->crypto; @endphp</p>
                    </div>
        </div>
     </div>
        </section>
    </article>



@include('inc.homefooter')
<script>
    $("body").addClass("innerpagebg");
</script>