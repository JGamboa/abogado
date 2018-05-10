<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sucursales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="sucursales">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@push("custom-scripts")
<script type="text/javascript">

    function loadItems(id, path, selectInputClass) {
        id = id.replace('empresa-','');
        if (id == 0 || id == '') {
            return;
        }

        $.ajax({
            type: 'GET',
            url: path + id,
            success: function (datas) {
                if (!datas || datas.length === 0) {
                    return;
                }

                $(selectInputClass).html(datas);
            },
            error: function (ex) {
            }
        });
    }

    function loadSucursales(id) {
        loadItems(id, '{{ ENV('APP_URL') }}/empresas/sucursales/', '.sucursales');
    }

    function registerEvents() {

        $(document).ready(function(){

            $(".ver-sucursales").click(function(){
                loadSucursales(this.id);
                $("#myModal").modal('show');
            });

        });

    }

    function init() {
        registerEvents();
    }

    init();
</script>
@endpush

