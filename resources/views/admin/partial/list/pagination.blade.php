
<hr>
<div class="row m-auto">
    <div class="col-sm-4">
        <div class="record-text">Showing {{$results->firstItem()}} to {{$results->lastItem()}} of {{$results->total()}} entries</div>
    </div>
    <div class="col-sm-8">
        <div class="paginate pagination-sm float-right">
            {{  $results->appends(request()->input())->links() }}
        </div>
    </div>
</div>