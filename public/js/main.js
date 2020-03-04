window.onload = () => {
    const states = states_cities.estados.map(  state => ({'sigla': state.sigla, 'cidades': state.nome}));
    const new_units = states_cities_with_unit.map( unit => {
        unit.state = states_cities.estados.find(state => state.sigla == unit.initials).nome;

        return unit;
    });

    [...new Set(new_units.map(unit => unit.initials))].forEach(state => {

        $('#inputGroupSelect01').append(new Option(state, state))
  
    });

    $('#inputGroupSelect02').change(e => {
        let sigla = $('#inputGroupSelect02').children("option:selected").val();


        state = states_cities.estados.filter(state => state.sigla == sigla);

        if (state.length === 1)
        {
            $('#selectCity').empty();
            state[0].cidades.map((city, index) => {
                $('#selectCity').append(new Option(city, city))
            });
        }
    });


}