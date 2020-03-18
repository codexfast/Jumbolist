window.onload = () => {
    states_cities.estados.map(state => {
        $('#selectState').append(new Option(state.nome, state.sigla))
    });

    try {
        clone_input = document.querySelectorAll('.unit_name');
        clone_input[1].onchange = () => {
            clone_input[0].value = clone_input[1].value;
        }
    } catch (error) {
        console.error("Clone input fail");
    }

    $('#selectState').change(e => {
        let sigla = $('#selectState').children("option:selected").val();


        state = states_cities.estados.filter(state => state.sigla == sigla);

        if (state.length === 1)
        {
            $('#selectCity').empty();
            state[0].cidades.map((city, index) => {
                $('#selectCity').append(new Option(city, city))
            });
        }
    });

    $(document.querySelectorAll('#dataTable')).DataTable();
}
