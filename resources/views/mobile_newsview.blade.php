@include('inc.homeheader')


<article>
        <div class="container">
            <div class="text-left">
              <h3 class="b-f headingt text-uppercase white-title">News & Events</h3>
              <div class="bottom-u-line"></div>
          </div>
          <div class="news-box-whl">

            @foreach($newspage as $val1)
            <div class="news-box">
                <div class="news-pic">
                    <img src="{{ url($val1->img) }}">

                </div>
                <div class="news-content">
                    <h3 class="news-title">{{ $val1->title }}</h3>
                    <h5 class="b-post"><i class="fa fa-calendar" aria-hidden="true"></i> Posted on {{ date("Y-m-d",strtotime($val1->created_at)) }}</h5>
                    <p class="content">{!! mb_strimwidth(strip_tags($val1->desc), 0, 300, "...") !!}
                    </p>
                    <a  href="{{ url('/mobilenewsfullview/'.\Crypt::encrypt($val1->id)) }}" class="btn-link btn-lg">Read More</a>
                </div>
            </div>
             @endforeach
        </div>

    </div>

</article>
<style>
  body
  {
    padding-bottom: 0px;
  }
</style>