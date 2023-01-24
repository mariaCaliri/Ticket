$('body').on('click', '.editProduct', function () {
var product_id = $(this).data('id');
$.get("{{ route('ajax-crud.index') }}" +'/' + product_id +'/edit', function (data) {
$('#modelHeading').html("Edit Product");
$('#saveBtn').val("edit-user");
$('#ajaxModel').modal('show');
$('#product_id').val(data.id);
$('#name').val(data.name);
$('#detail').val(data.detail);
})
});

$('#saveBtn').click(function (e) {
e.preventDefault();
$(this).html('Sending..');

$.ajax({
data: $('#productForm').serialize(),
url: "{{ route('ajax-crud.store') }}",
type: "POST",
dataType: 'json',
success: function (data) {

$('#productForm').trigger("reset");
$('#ajaxModel').modal('hide');
table.draw();

},
error: function (data) {
console.log('Error:', data);
$('#saveBtn').html('Save Changes');
}
});
});
<div id="modal-js-example" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Modifica Categoria</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- Content ... -->
            <form id="addCategory" name="addCategory" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="category_id" id="category_id" value="{{ $category->id }}">
                            <strong>Nome Categoria:</strong>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                                   placeholder="nome">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-link">Salva </button>
            <button class="button">Annulla</button>
        </footer>
    </div>
</div>
