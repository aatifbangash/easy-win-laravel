@extends('layouts.app')
@section('content')
<style type="text/css">
#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }
  </style>
    <!-- Page Content -->
   <div class="container page-top">



        <div class="row">

            @forelse ($pictures as $picture)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href=" {{ asset('uploads/' . $picture->winner_picture) }}" class="fancybox" rel="ligthbox">
                        <img  src="{{ asset('uploads/' . $picture->winner_picture) }}" class="zoom img-fluid "  alt="">
                    </a>
                </div>
            @empty
                <div>
                  No picture found.
                </div>
            @endforelse
       </div>
    </div>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
  $(".fancybox").fancybox({
        'openEffect': "none",
        'closeEffect': "none",
        'transitionIn'  :   'elastic',
        'transitionOut' :   'elastic',
        'speedIn'       :   600, 
        'speedOut'      :   200, 
        'overlayShow'   :   false
    });
    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
});
    
  </script>
@endsection