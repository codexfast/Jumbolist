window.onload = () => {
    const states = states_cities.estados.map(  state => ({'sigla': state.sigla, 'cidades': state.nome}));
    const new_units = states_cities_with_unit.map( unit => {
        unit.state = states_cities.estados.find(state => state.sigla == unit.initials).nome;

        return unit;
    });

    [...new Set(new_units.map(unit => unit.initials))].forEach(state => {

        $('#inputGroupSelect01').append(new Option(state, state))
  
    });

    $('#inputGroupSelect01').change(e => {
        const sigla = $('#inputGroupSelect01').children("option:selected").val();

        const cities = new_units.filter(unit => unit.initials == sigla);

        $('#inputGroupSelect02').empty();

        if (cities.length > 0)
        {
            $('#inputGroupSelect02').append(new Option("Escolha...", null));
            
            [...new Set(cities.map(city => city.city))].forEach(city => {

                $('#inputGroupSelect02').append(new Option(city, city))
          
            });
        }
    });

    $('#inputGroupSelect02').change(e => {
        const city = $('#inputGroupSelect02').children("option:selected").val();
        const units = new_units.filter( unit => unit.city == city);

        $('#inputGroupSelect03').empty();


        if (units.length > 0)
        {
            $('#inputGroupSelect03').append(new Option("Escolha...", null));
            
            [...new Set(units.map(unit => unit.unit))].forEach(unit => {

                $('#inputGroupSelect03').append(new Option(unit, unit))
          
            });
        }


    });

    $('#find_lists').click(e => {
        e.preventDefault();

        const city = $('#inputGroupSelect02').children("option:selected").val();
        const current_unit = $('#inputGroupSelect03').children("option:selected").val();
        const units_by_city = new_units.filter( unit => (unit.unit == current_unit && unit.city == city));

        const li = units_by_city.map(unit => {
            return `<li class="list-group-item">
                <a href="./files/${unit.list}" target="_blank">
                    <i class="fas fa-file text-muted mr-2"></i>
                    ${unit.created_at}
                </a>  
            </li>`
        }).join('');

        const ul = `<ul class="list-group list-group-flush">${li}</ul>`;

        $('#results').empty();
        $('#results').append(ul);

    });

}