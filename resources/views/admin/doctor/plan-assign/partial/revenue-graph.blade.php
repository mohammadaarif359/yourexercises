<div class="card">
  <div class="card-header border-0">
    <div class="d-flex justify-content-between">
      <h3 class="card-title">Compare Feedback</h3>
    </div>
  </div>
  <div class="card-body">
    <div class="position-relative mb-4">
      <canvas id="revenue-chart-canvas-0" height="300"></canvas>
    </div>

    @php $graph_attribute = config('custom.feedback_questions'); @endphp
    <div class="d-flex flex-row justify-content-end">
      <span classs="mr-2">
        <i class="fas fa-square text-green"></i> {{ $graph_attribute['how_was_exercise'] }}
      </span>
      <span classs="mr-2">
        <i class="fas fa-square text-primary"></i> {{ $graph_attribute['pain_before_exercise'] }}
      </span>
      <span classs="mr-2">
        <i class="fas fa-square text-gray"></i> {{ $graph_attribute['pain_after_exercise'] }}
      </span>
      
    </div>
  </div>
</div>

<script>
  window.graphDataList = window.graphDataList || []
  window.graphDataList.push({
      graph: @json($graph),
      chartId: "revenue-chart-canvas-0"
  });
</script>
