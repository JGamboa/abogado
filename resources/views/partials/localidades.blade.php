
@push("custom-scripts")
    <script>
        function loadItems(element, path, selectInputClass) {
            var selectedVal = $(element).val();

            // select all
            if (selectedVal == 0 || selectedVal == '') {
                return;
            }

            $.ajax({
                type: 'GET',
                url: path + selectedVal,
                success: function (datas) {
                    if (!datas || datas.length === 0) {
                        return;
                    }

                    for (var  i = 0; i < datas.length; i++) {
                        $(selectInputClass).append($('<option>', {
                            value: datas[i].id,
                            text: datas[i].nombre
                        }));
                    }
                },
                error: function (ex) {
                }
            });
        }

        function loadProvincias(element){
            $('.js-provincias').empty().append('<option value="">Seleccionar Provincia</option>');
            $('.js-comunas').empty().append('<option value="">Seleccionar Comuna</option>');
            loadItems(element, '/abogado/public/api/v1/provincias/', '.js-provincias');
        }

        function loadComunas(element) {
            $('.js-comunas').empty().append('<option value="">Seleccionar Comuna</option>');
            loadItems(element, '/abogado/public/api/v1/provincias/comunas/', '.js-comunas');
        }

        function registerEvents() {
            $('.js-provincias').change(function() {
                loadComunas(this);
            });

            $('.js-regiones').change(function() {
                loadProvincias(this);
            });

            $( document ).ready(function() {
                /*if($('.js-provincias').val() != '0'){
                    loadComunas($('.js-comunas'));
                }

                if($('.js-regiones').val() != '0'){
                    loadProvincias($('.js-regiones'));
                }*/
            });
        }

        function init() {
            registerEvents();
        }

        init();
    </script>
@endpush
