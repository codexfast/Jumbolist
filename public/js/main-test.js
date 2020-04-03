window.onload = () => {
    const monName = new Array ("janeiro", "fevereiro", "março", "abril", "Maio", "junho", "agosto", "outubro", "novembro", "dezembro");
    const states = states_cities.estados.map(  state => ({'sigla': state.sigla, 'cidades': state.nome}));
    const new_units = states_cities_with_unit.map( unit => {
        unit.state = states_cities.estados.find(state => state.sigla == unit.initials).nome;

        return unit;
    });

    [...new Set(new_units.map(unit => unit.initials))].forEach(state => {

        $('#inputGroupSelect01').append(new Option(state, state))
  
    });

    states_cities.estados.forEach( state => {
        $('#all_states').append(new Option(state.nome, state.sigla))
        $('#notySelectState').append(new Option(state.nome, state.sigla))

    });

    $('#all_states').change(e => {
        const sigla = $('#all_states').children("option:selected").val();
        const cities = states_cities.estados.filter(states => states.sigla == sigla);


        $('#all_cities').empty();

        cities[0].cidades.forEach( city => {
            
            $('#all_cities').append(new Option(city, city))

        });
    });

    $('#notySelectState').change(e => {
        const sigla = $('#notySelectState').children("option:selected").val();
        const cities = states_cities.estados.filter(states => states.sigla == sigla);


        $('#notySelectCity').empty();

        cities[0].cidades.forEach( city => {
            
            $('#notySelectCity').append(new Option(city, city))

        });
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

        const figures = units_by_city.map((unit, index) => {
            date = new Date(unit.created_at);
            month = monName[date.getMonth()];
             
            if (unit.list.endsWith(".pdf"))
            {
                return `
                    <figure>
                        <img class="grid-img" 
                            src="./pdf.png"
                            alt="${unit.unit}">
                    </figure>
                `
            } else {
                return `
                    <figure>
                        <img class="grid-img" 
                            src="./files/${unit.list}"
                            alt="${unit.unit}">
                    </figure>
                `
            }

        }).join('');

        const ul = `<main class="grid">${figures}</main>`;

        $('#results').empty();
        $('#results').append(ul);

    });



}