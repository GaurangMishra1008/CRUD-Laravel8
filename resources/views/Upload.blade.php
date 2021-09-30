<form action="/uploadfile" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="col-12 col-md-9">
        <input type="file" id="file_upload" name="file_upload" multiple="" class="form-control-file">
        <div class="card-footer">
            <button type="submit" name="submit" id="save" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> upload
            </button>
        </div>
    </div>
</form>