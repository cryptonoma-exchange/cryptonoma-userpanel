@include('inc.homeheader')
@include('inc.homemenu')
<article>
        <section class="innerpagecont">
            <div class="container">
                <div class="ieohead">
                <!-- <h2 class="heading-title text-center mb-2">Credit card</h2> -->
            </div>
        <div class="row table-content">
            <div class="col-md-6 col-sm-12 col-12 innercol">
                <div class="credit">
                <h2 class="heading-title mb-2">Credit</h2>
                <p class="content">
                   @php echo $terms->credit; @endphp
                </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12 innercol">
            <div class="creditimg text-center">
                    <img src="images/creditcard.png" alt="">
                </div>
            </div>
     </div>
        </section>
    </article>



@include('inc.homefooter')
<script>
    $("body").addClass("innerpagebg");
</script>