@include('inc.homeheader')
@include('inc.homemenu')
        <article>
            <section class="innerpagecont">
                <div class="container">
                    <div class="ieohead">
                        <!-- <h2 class="heading-title text-center mb-2">Referral</h2> --></div>
                    <div class="row antotal">
                        <div class="col-md-8 col-sm-12 col-12 announce">
                              @foreach($Testimonial as $feature)
                            <div class="newcard">
                            <div class="news">
                                <img src="@php echo $feature->img@endphp" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"> <a href="{{url('/listannounce/'.$feature->id)}}">@php echo $feature->heading@endphp</a></h5>
                                    <h6 class="card-subtitle">{{ date('m-d-Y H:i:s', strtotime($feature->created_at)) }}</h6>

                                    <p class="card-text content">{{ str_limit($feature->desc, $limit = 130, $end = '...') }}</p> </div>
                            </div>
                          @endforeach 
                   
                    
                        </div>
                        <div class="col-md-4 col-sm-12 col-12 announce ">
                       
                        <div class="rightnew" >
                        <div class="searchdiv">
                            <div class="input-group rounded">
  <input type="text" id='searchtextbox'  class="form-control rounded" placeholder="Search" aria-label="Search"
   />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fa fa-search"></i>
  </span>
</div>
</div>
<div id="livemarket">
@foreach($Testimonial as $feature)
<div class="newicon" >
    <div class="s-icon">
    <span class="stick"><i class="fa fa-sticky-note" aria-hidden="true"></i></span>
    </div>                     
                                <div class="card-body">

                                    <tr>
                                      
                                  <td> <h5 class="card-title"><a href="{{url('/listannounce/'.$feature->id)}}">@php echo $feature->heading@endphp</a></h5></td>
                               </tr>
                                </div>
                               
                            </div>
                             @endforeach
      </div>
                            </div>
                       
                        </div>
                    </div>
            </section>
        </article>
@include('inc.homefooter')
            <script>
            $("body").addClass("innerpagebg");
            </script>

<script type="text/javascript">

                $(document).ready(function(){
  $("#searchtextbox").on("keyup", function() {


   
    var value = $(this).val().toLowerCase();


    $("#livemarket").show().filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)


    });
  });
});
</script>