<form class="filter-form" method="get">
    <div class="input-group input-group-sm m-0" style="width: 150px;">
    <input type="text" name="keyword" value="{{ old('keyword',$keyword) }}"class="form-control float-right" placeholder="Search">
    <div class="input-group-append">
        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
    </div>
    </div>
</form>