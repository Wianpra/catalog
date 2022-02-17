
<div class="card bg-secondary border-0 mb-0">
    <div class="card-body">
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                </div>
                <input name="category" class="form-control" value="{{ $category->category }}" type="text">
                <input type="hidden" value="{{ $category->id }}" name="id" id="id_data">
            </div>
        </div>
    </div>
</div>