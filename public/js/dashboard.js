window.onload = () => {
    states_cities.estados.map(state => {
        $('#selectState').append(new Option(state.nome, state.sigla))
    });

    $('#selectState').change(e => {
        let sigla = $('#selectState').children("option:selected").val();


        state = states_cities.estados.filter(state => state.sigla == sigla);

        if (state.length === 1)
        {
            state[0].cidades.map((city, index) => {
                $('#selectCity').empty();
                $('#selectCity').append(new Option(city, index))
            });
        }
    });
}
