<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
      @charset "UTF-8";
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
      body {
        font-family: "Poppins", serif !important;
        margin: 0;
        font-weight: 400;
      }
      .my-2 {
        margin-bottom:.5rem!important;
        margin-top:.5rem!important;
      }
      .cl-dblue {
        color: #2e3741;
      }
      .cl-gray {
        color:#7A7A7A; 
      }
      .fa-star {
        color: #FFD700;
      }
      .rounded {
        border-radius: 0.25rem!important;
      }
      .img-fluid {
          max-width: 100%;
          height: auto;
      }
      .ps-border-bottom {
        border-bottom:1px solid #2b4159;
      }
      .main-section {
        margin: 0 auto;
        padding: 0rem 0rem 0 0rem;
      }
      .container {
          max-width: 95rem;
          height: auto;
          margin: 0 auto;
          padding: 0 0.5rem;
      }
      .ps-about .header-section p {
        font-size: 1.1rem;
        margin-bottom:0.5rem;

      }
      .ps-about .header-section h1 {
        font-size:26px;
        margin-bottom:0.5rem;
      }
      .ps-about .header-section h2 {
        font-size:12px;
      } 
      .card {
        word-wrap:break-word;
      }
      .ps-exercise-detail {
        margin: 10px 0;
        padding: 9px 3px;
        background-color: white;
        border-radius: 5px;
        margin-bottom: 10px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        border:1px solid gray;
      }
      .ps-exercise-detail img {
        border-radius: 5px;
        height: 250px;
        max-width: 100%;
        object-fit: cover;
      }
      .ps-exercise-detail h4 {
        font-size: 20px;
        margin-bottom: 0px;
        font-weight: 400;
        line-height:1.2;
      }
      .ps-exercise-detail h5 {
        font-size: 17px;
        margin-bottom: 0px;
        font-weight: 400;
        color: rgb(60, 60, 60);
      }
      .ps-exercise-detail .heading {
        font-size: 14px;
        margin-bottom: 2px;
      }
      .ps-exercise-detail .sub-heading {
        font-size: 12px;
        color: #6c757d;
        margin-bottom: 0;
      }
      .exercise-attribute label {
        font-size: 12px;
        word-break: break-all;
      }
      .form-select {
        border-radius: 8px;
        border: 2px solid #e3f2fd;
        padding: 0.3rem 0.7rem;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: transparent;
        height: 25px;
        width: 100%;
        color: #495057;
      }
      .ps-exercise-detail .ps-review-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }

      .ps-cursor-pointer {
        cursor: pointer;
      }

      .col-form-label {
        font-size: 16px;
      }

      .ps-video-ex-div .card {
        margin: 15px 0;
        justify-content: center;
      }
      .ps-video-ex-div .card img, .ps-video-ex-div .card iframe, .ps-video-ex-div .card video {
        max-height: 180px;
      }
      @media (max-width: 768px) {
        .ps-video-ex-div .card img, .ps-video-ex-div .card iframe, .ps-video-ex-div .card video {
          max-height: 130px;
        }
      }

      .ps-label-text label {
        font-size: 12px;
        word-break: break-all;
      }

      .ps-gap-25 {
        gap: 25px;
      }

      .col-cl6 {
        flex: 0 0 48%;
        max-width: 48%;
      }

      @media (min-width: 576px) {
        .col-smvl-6 {
          flex: 0 0 48%;
          max-width: 48%;
        }
      }
    </style>
  </head>
  <body>
    <div class="main-section ps-about">
      <div class="container">
          <!-- Header Section -->
          <table width="100%" class="ps-border-bottom">
            <tr>
              <td width="25%">
                <img src="http://yourexercises.com/web_new/assets/img/your_exercises_logo.svg" alt="" class="img-fuild" height="100px" width="200px"/>
              </td>
              <td width="50%">
              </td>
              <td width="25%">
                <h1 class='cl-dblue' style='font-size:20px;margin:0'>Aarif clnic</h1>
                <p class='cl-gray'>dko kk k kfj jj </p>
              </td>
            </tr>
          </table>
          @php $plan = $data->plan; @endphp
          <table width="100%" class="header-section ps-border-bottom">
            <tr>
              <td width="65%" valign="top">
                <h1 class='cl-dblue'>{{ $plan['name'] }}</h1>
                <p class='cl-gray'>{{ $plan['description'] }}</p>
                <table width="100%">
                    <tr>
                        @if($data['avg_rating'] > 0)
                        <td><h2>Rating <i class="fas fa-star"></i> {{ $data['avg_rating'] }}</h2></td>
                        @endif
                        <td><h2 class='text-right'><i class="fas fa-dumbbell"></i> {{ $data['exercise_count'] }}</h2></td>
                    </tr>
                </table>
              </td>
              <td width="35%" align="center">
                  {{--@if($plan['image_url'])
                  <img src="{{ $plan['image_url'] }}" alt="" class="img-fluid rounded m-4" />
                  @endif--}}
                  @if($plan['image'])
                  <?php 
                    $imagePath = public_path('storage/doctor/plan/' . $plan['image']);
                    $imageMime = mime_content_type($imagePath);
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageBase64 = "data:$imageMime;base64,$imageData";
                  ?>
                  <img src="{{ $imageBase64 }}" alt="" class="img-fluid rounded m-4" style="max-height:250px;">
                  @endif
              </td>
            </tr>
          </table>
          @foreach($plan['doctor_plan_detail'] as $detail)
          <table width="100%" cellspacing="0" cellpadding="10" class="ps-exercise-detail">
            <tbody style="vertical-align: top;">
                <tr>
                    <td width="27%" align="center">
                        {{--@php $ex_img_url = $detail['exercise']['image_url'] ? $detail['exercise']['image_url'] : asset('web_new/assets/img/profile-img.png') @endphp  
                        <img src="{{ $ex_img_url }}"/>--}}
                        @if($detail['exercise']['image'])
                          <?php 
                            $imagePath = public_path('storage/doctor/exercise/' . $detail['exercise']['image']);
                            $imageMime = mime_content_type($imagePath);
                            $imageData = base64_encode(file_get_contents($imagePath));
                            $imageBase64 = "data:$imageMime;base64,$imageData";
                          ?>
                          <img src="{{ $imageBase64 }}" alt="">
                        @endif
                    </td>
                    <td width="50%" class="details" style="vertical-align: top;">
                        <h4>{{ $detail['exercise']['name'] }}</h4>
                        <h5>{{ $detail['category']['name'] }} - {{ $detail['subcategory']['name'] }}</h5>
                        <p>{{ $detail['exercise']['description'] }}</p>
                    </td>
                    <td width="23%" class="">
                    <table width="100%" cellspacing="5" cellpadding="5" class='exercise-attribute'>
                        <tr class='ps-label-text'>
                            <td><label>Reps</label></td>
                            <td><input type='text' class='form-select' value="{{ $detail['reps'] }}"></td>
                        </tr>
                        <tr class='ps-label-text'>
                            <td><label>Hold</label></td>
                            <td><input type='text' class='form-select' value="{{ $detail['hold'] }}"></td>
                        </tr>
                        <tr class='ps-label-text'>
                            <td><label>Complete (Sets)</label></td>
                            <td><input type='text' class='form-select' value="{{ $detail['complete'] }}"></td>
                        </tr>
                        <tr class='ps-label-text'>
                            <td><label>Perform</label></td>
                            <td><input type='text' class='form-select' value="{{ $detail['perform'] }}"></td>
                        </tr>
                        <tr class='ps-label-text'>
                            <td><label>Times</label></td>
                            <td><input type='text' class='form-select' value="{{ $detail['times'] }}"></td>
                        </tr>
                        <tr>
                            @if($data['avg_rating'] > 0)
                            <td colspan='2'><h2 style='font-size:13px;'>Rating <i class="fas fa-star"></i> {{ $data['avg_rating'] }}</h2></td>
                            @else
                            <td colspan="2"></td>
                            @endif
                        </tr>
                    </table>
                    </td>
                </tr>
            <tbody>    
          </table>
          @endforeach
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</html>