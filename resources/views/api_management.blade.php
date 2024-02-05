@include('inc.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
@include('inc.userpanel.headermenu')
  <article class="gridparentbox">
	      <div class="innerpagecontent">
					<div class="container">
						<h2 class="h2 text-uppercase">API Management</h2>
						<hr class="x-line-center">
					</div>
				</div>
        <div class="container sitecontainer">
          <div class="kyccenterbox">
            <div class="panelcontentbox">
              <div class="contentbox">
                  <div class="kycboxleft">
                    <div class="mlmwizardform">
                        <a href="/Folex/userpanel/generateAPI" >Generate API Key </a>     

                        <p class="content t-gray">Notice: Please do not disclose API Key and API Secret and do not download any thrid party bot or other programs. These programs may have thret to secuity of your assets. For your security, your API Secret Key will only be displayed at the time it is created. If you lose this key, you will need to delete your API and set up a new one.</p>  
                        <table >
                          <thead>
                            <tr>
                              <th>S. No.</th>
                              <th>API Key</th>
                              <th>API Secret</th>
                              <th>Action</th>                              
                            </tr>
                            <tbody>
                            @forelse($apikeys as $keys)
                              <tr>
                                <td></td>  
                                <td>*******************</td>
                                <td>*******************</td>                                
                                <td><a href="/emovekey/{{$keys->id}}">Remove</a></td>
                              </tr>
                            @empty
                              <tr><td colspan="4"> No API keys generated.</td></tr>
                            @endforelse
                            </tbody>
                          </thead>
                        </table>             
                    </div>
                  </div>
              </div>
            </div>  
          </div>
        </div>
        @include('inc.userpanel.footermenu')
</div> 
@include('inc.userpanel.footer') 