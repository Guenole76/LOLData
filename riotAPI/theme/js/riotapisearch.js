
async function getChampion(){
    const root = document.getElementById("root");
    const search = document.getElementById("search");
    let name = search.value.toLowerCase();
    name = name.charAt(0).toUpperCase() + name.slice(1);

    console.log(name);
    const httpResponse = await fetch(`http://ddragon.leagueoflegends.com/cdn/11.4.1/data/en_US/champion/${name}.json`);
                                                                                        /* fr_FR*/
    
    const body = await httpResponse.json();
    console.log(body);

    console.log(body.data[name].spells);

    let listHtml = ``;
    for(let spell of body.data[name].spells){
        const spellID = spell.id;
        const spellName = spell.name;
        const spellDesc = spell.description;
        listHtml += `<li>
                    <h2>${spellID}</h2>
                    <h3>Nom du sort: ${spellName}</h3> <br>
                     <p>${spellDesc}</p></li>`;
    }

    for(let skin of body.data[name].skins){
        const name = skin.name;
        const num = skin.num;
        listHtml += `<li>
                    <h2>nom du skin: ${name}</h2>
                    <h3>skin numéro: ${num}</h3></li>`

    }

    const lore = body.data[name].lore
    listHtml += `<li>
    <p> Histoire du champion: </p> <br><p> ${lore} </p>
    </li>`

    root.innerHTML = listHtml;

}

