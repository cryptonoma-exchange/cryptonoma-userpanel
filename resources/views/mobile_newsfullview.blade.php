 @include('inc.homeheader')


<article>
        <div class="container">
            <div class="text-left">
              <h3 class="b-f headingt text-uppercase white-title">
                <a href="{{ url('/mobilenewsview') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> News & Events</h3>
              <div class="bottom-u-line"></div>
          </div>
          <div class="news-box-whl full-view">

            <div class="news-box">
                <div class="news-pic">
                    <img src="{{ url($newspage->img) }}">

                </div>
                <div class="news-content">
                    <h3 class="news-title">{{ $newspage->title }}</h3>
                    <h5 class="b-post"><i class="fa fa-calendar" aria-hidden="true"></i> Posted on {{ date("Y-m-d",strtotime($newspage->created_at)) }}</h5>
                    
                    <p class="content">{!! $newspage->desc !!}</p>

                </div>
            </div>



        </div>

    </div>

</article>
<style>
  body
  {
    padding-bottom: 0px;
  }
</style>