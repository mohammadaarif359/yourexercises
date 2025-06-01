<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Exercise Plan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    .plan-image {
      width: 100%;
      max-height: 250px;
      object-fit: cover;
    }
    .exercise-img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
    }
    .attribute-badge {
      margin-right: 5px;
      border:1px solid gray;
    }
    .card-table {
      width: 100%;
      border-collapse: collapse;
    }
    .card-table td {
      vertical-align: top;
      padding: 10px;
    }
    .exercise-card {
      border: 1px solid #dee2e6;
      border-radius: 5px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .card-title {
        margin-bottom:0.5rem;
    }
    .card-title span {
        font-weight: 450;
        color: rgb(60, 60, 60);
        font-size:16px;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container-fluid bg-white p-2 border-bottom mb-2">
    <table style="width: 100%;">
      <tr>
        <td style="width: 50%;">
          <img src="https://yourexercises.com/web_new/assets/img/your_exercises_log.png" alt="yourexercise Logo" height="60">
        </td>
        <td style="width: 50%; text-align: right; ">
          <h4 class="mb-0">{{ $plan['creator']['doctor_profile']['clinic_name'] ?? ''  }}</h4>
          <small>Dr. {{ $plan['creator']['name'] ?? '' }}</small>
        </td>
      </tr>
    </table>
  </div>
  <div class="container-fluid mb-3">
    <table class="plan-table" style="width: 100%;">
      <tr>
        <td style="width: 70%; padding-right: 20px;">
          <h3>{{ $plan['name'] }}</h3>
          <p>{{ $plan['description'] }}</p>
          <table style="width: 100%; margin-top: 10px;">
            <tr>
              @if($plan['avg_rating'] > 0)
              <td>
                Rating <i class="fas fa-star" style="color: gold;"></i> {{$plan['avg_rating']}}
              </td>
              @endif
              <td style="text-align: right;">
                <i class="fas fa-dumbbell"></i> {{ count($plan['doctor_plan_detail']) }}
              </td>
            </tr>
          </table>
        </td>
        <td style="width: 30%;">
          {{--@if($plan['image_url'])
          <img src="{{ $plan['image_url'] }}" alt="Plan Image" class="plan-image">
          @endif--}}
          @if($plan['image'])
            <?php 
            $imagePath = public_path('storage/doctor/plan/' . $plan['image']);
            $imageMime = mime_content_type($imagePath);
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageBase64 = "data:$imageMime;base64,$imageData";
            ?>
            <img src="{{ $imageBase64 }}" alt="" alt="Plan Image" class="plan-image">
            @endif
        </td>
      </tr>
    </table>
  </div>

  <div class="container-fluid">
    <!-- Exercise Card -->
    @foreach($plan['doctor_plan_detail'] as $detail)
    <div class="exercise-card p-2">
      <table class="card-table">
        <tr>
          <td style="width: 30%;">
            @if($detail['exercise']['image'])
                <?php 
                $imagePath = public_path('storage/doctor/exercise/' . $detail['exercise']['image']);
                $imageMime = mime_content_type($imagePath);
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageBase64 = "data:$imageMime;base64,$imageData";
                ?>
                <img src="{{ $imageBase64 }}" class="exercise-img" alt="Exercise">
            @endif
          </td>
          <td style="width: 70%;">
            <h5 class="card-title">{{ $detail['exercise']['name'] }}<br/>
                <span>{{ $detail['category']['name'] }} - {{ $detail['subcategory']['name'] }}</span>
            </h5>
            <p>{{ $detail['exercise']['description'] }}</p>
            <div>
              <span class="badge attribute-badge">Reps: {{ $detail['reps'] }}</span>
              <span class="badge attribute-badge">Hold: {{ $detail['hold'] }}</span>
              <span class="badge attribute-badge">Complete (Sets): {{ $detail['complete'] }}</span>
              <span class="badge attribute-badge">Perform: {{ $detail['perform'] }}</span>
              <span class="badge attribute-badge">Times: {{ $detail['times'] }}</span>
            </div>
          </td>
        </tr>
      </table>
    </div>
    @endforeach
  </div>
</body>
</html>
