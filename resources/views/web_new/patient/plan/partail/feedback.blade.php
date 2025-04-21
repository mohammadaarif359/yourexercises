<div class="modal fade p-0" id="ratingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='feedback-form' name='feedback-form' method='POST'>
                    <input type="hidden" name='assign_id' id='assign_id' value="">
                    <input type="hidden" name='plan_id' id='plan_id' value="">
                    <input type="hidden" name='exercise_id' id='exercise_id' value="">
                    <div class="form-group row mb-3">
                        <label for="Dropdown" class="col-sm-3 col-form-label">Rating</label>
                        <div class="col-sm-8">
                            <div class="select-wrapper">
                                <select class="form-select" name="rating" id="rating">
                                    <option value='' selected>Select Rating</option>
                                    @foreach(config('custom.feedback_rating') as $k=> $val)
                                        <option value="{{ $k }}">{{$val}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <span class="error-helper" id="error_rating"></span>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            <span class="error-helper" id="error_title"></span>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="TextArea" class="col-sm-3 col-form-label">Comment</label>
                        <div class="col-sm-8">
                            <textarea name="comment" class="form-control" id="comment" placeholder="Comment"></textarea>
                            <span class="error-helper" id="error_comment"></span>
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