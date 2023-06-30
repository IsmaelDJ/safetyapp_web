@yield('css')

<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

<style>
  .rule-item div.essential_audio > div:nth-child(1) div {
      width: 1.3rem !important;
      height: 1.3rem !important;
      background-color: rgba(221, 158, 41, 0.616);
  }
  .rule-item div.essential_audio > div:nth-child(1) div:after {
      width: 1.1rem !important;
      height: 1.1rem !important;
  }


  .rule-show-item div.essential_audio > div:nth-child(1) div.play, .rule-item div.essential_audio > div:nth-child(1) div.play {
      background-color:  #34a543 !important;
  }

  .rule-show-item div.essential_audio > div:nth-child(1) div {
      width: 2rem !important;
      height: 2rem !important;
      background-color: rgba(221, 158, 41, 0.616);
  }
  .rule-show-item div.essential_audio > div:nth-child(1) div:after {
      width: 1.7rem !important;
      height: 1.7rem !important;
  }
</style>