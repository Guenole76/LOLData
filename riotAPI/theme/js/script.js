
async function getChampion(){
    const root = document.getElementById("root");
    const search = document.getElementById("search");
    let name = search.value.toLowerCase();
    name = name.charAt(0).toUpperCase() + name.slice(1);

    console.log(name);
    const httpResponse = await fetch(`http://ddragon.leagueoflegends.com/cdn/11.4.1/data/fr_FR/champion/${name}.json`);
    
    const body = await httpResponse.json();
    console.log(body);

    console.log(body.data[name].spells);

    /*let listHtml = ``;
    for(let info of body.data[name].senna){
        const infoID = info.id;

        listHtml += `<li>
                        <h3>${infoID}</h3>
                    </li>`;
    }*/

    if(name === Ezreal){
        background
    }

    let listHtml = ``;

    const nom = body.data[name].id
    const title = body.data[name].title
    const full = body.data[name].image.full
    
    listHtml += `<li>
    <h1> Nom du champion: ${nom}, ${title}</h1> 
        ${full}
    </li>`



    for(let spell of body.data[name].spells){
        const spellID = spell.id;
        const spellName = spell.name;
        const spellDesc = spell.description;
        listHtml += `
                    <h3>${spellID} : ${spellName}</h3>
                     <p>${spellDesc}</p>`;
    }

    for(let skin of body.data[name].skins){
        const name = skin.name;
        const num = skin.num;
        listHtml += `<li>
                    <h3>nom du skin: ${name}</h3>
                    <h3>skin numéro: ${num}</h3></li>`

    }

    const lore = body.data[name].lore
    listHtml += `<li>
    <h3> Histoire du champion: </h3> <br>
    <p> ${lore} </p>
    </li>`

    root.innerHTML = listHtml;

}

