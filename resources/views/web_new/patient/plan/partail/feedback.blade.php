<div class="modal fade p-0" id="ratingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='feedback-form' name='feedback-form' method='POST'>
                    <input type="hidden" name='id' id='id' value="">
                    <input type="hidden" name='assign_id' id='assign_id' value="">
                    <input type="hidden" name='plan_id' id='plan_id' value="">
                    <input type="hidden" name='exercise_id' id='exercise_id' value="">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Dropdown" class="col-form-label">Rating</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="rating" id="rating">
                                        <option value='' selected>Select Rating</option>
                                        @foreach(config('custom.feedback_rating') as $k=> $val)
                                            <option value="{{ $k }}">{{ $val }} - {{ $k }}⭐</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <span class="error-helper" id="error_rating"></span>
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label for="TextArea" class="col-form-label">Comment</label>
                                <input type='text' name="comment" class="form-control" id="comment" placeholder="Comment">
                                <span class="error-helper" id="error_comment"></span>
                            </div>
                        </div>    
                    </div>    

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Dropdown" class="col-form-label">How was the exercise</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[how_was_exercise]" id="how_was_exercise">
                                        <option value='' selected>Select</option>
                                        <option value="easy">easy</option>
                                        <option value="moderate">mmoderate</option>
                                        <option value="hard">hard</option>
                                    </select>
                                </div>
                                <span class="error-helper" id="error_how_was_exercise"></span>
                            </div>
                        </div>    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Dropdown" class="col-form-label">Pain level before the exercise</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[pain_before_exercise]" id="pain_before_exercise">
                                        <option value='' selected>Select</option>
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{ $i }}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <span class="error-helper" id="error_pain_before_exercise"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Dropdown" class="col-form-label">Pain level after the exercise</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[pain_after_exercise]" id="pain_after_exercise">
                                        <option value='' selected>Select</option>
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{ $i }}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <span class="error-helper" id="error_pain_after_exercise"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Dropdown" class="col-form-label">How much pain did you experience the next day</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[pain_next_day]" id="pain_next_day">
                                        <option value='' selected>Select</option>
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{ $i }}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <span class="error-helper" id="error_pain_next_day"></span>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="extreme_pain_last_24" class="col-form-label">How many incidents of extreme pain did you experience in the last 24 hours</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[extreme_pain_last_24]" id="extreme_pain_last_24">
                                        <option value='' selected>Select</option>
                                        @for($i=1; $i<=10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <option value="more_than_10">More than 10</option>
                                    </select>
                                </div>
                                <span class="error-helper" id="extreme_pain_last_24"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="complete_sets" class="col-form-label">Were you able to complete all assigned sets</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[complete_sets]" id="complete_sets">
                                        <option value='' selected>Select</option>
                                        <option value="0">0%</option>
                                        <option value="25">25%</option>
                                        <option value="50">50%</option>
                                        <option value="100">100%</option>
                                    </select>
                                </div>
                                <span class="error-helper" id="error_complete_sets"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="stiffness" class="col-form-label">How stiff did you feel after the exercise</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[stiffness]" id="stiffness">
                                        <option value='' selected>Select</option>
                                        @for($i=0; $i<=10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <span class="error-helper" id="error_stiffness"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="daily_activities" class="col-form-label">Were you able to perform your activities of daily living (bathing, grooming, eating, dressing, etc.)</label>
                                <div class="select-wrapper">
                                    <select class="form-select" name="answer[daily_activities]" id="daily_activities">
                                        <option value='' selected>Select</option>
                                        <option value="0">0%</option>
                                        <option value="25">25%</option>
                                        <option value="50">50%</option>
                                        <option value="100">100%</option>
                                    </select>
                                </div>
                                <span class="error-helper" id="error_daily_activities"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-btn sm-btn outline-btn ps-header-btn" data-dismiss="modal">Close</button>
                <button type="button" class="ps-btn sm-btn primary-btn" id='feedback-btn'>Save</button>
            </div>
        </div>
    </div>
</div>