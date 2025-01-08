import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";

function wrapTextSimplified(selection, maxWidth) {
    selection.each(function () {
        const text = d3.select(this);
        const words = text.text().split(/\s+/).reverse();
        let line = [];
        let word;
        let lineNumber = 0;
        const lineHeight = 1.2;
        const y = text.attr("y");
        const x = text.attr("x") || 0;

        // Initialiser avec un tspan vide
        let tspan = text.text(null)
            .append("tspan")
            .attr("x", x)
            .attr("y", y)
            .attr("dy", "1em");

        while ((word = words.pop())) {
            line.push(word);
            tspan.text(line.join(" "));
            if (tspan.node().getComputedTextLength() > maxWidth) {
                line.pop();
                tspan.text(line.join(" "));
                line = [word];

                tspan = text.append("tspan")
                    .attr("x", x)
                    .attr("y", y)
                    .attr("dy", `${lineHeight*(++lineNumber+1)}em`) // Espacement vertical uniforme
                    .text(word);
            }
        }
    });
}


export function drawHistogram(data, selector, wi, he) {
    const margin = { top: 20, right: 30, bottom: 100, left: 40 };
    const width = wi - margin.left - margin.right;
    const height = he - margin.top - margin.bottom;

    d3.select(selector).selectAll("*").remove();

    const svg = d3.select(selector)
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);

    const x = d3.scaleBand()
        .domain(data.map(d => d.label))
        .range([0, width])
        .padding(0.1);

    const y = d3.scaleLinear()
        .domain([0, d3.max(data, d => d.value)])
        .nice()
        .range([height, 0]);

    svg.append("g")
        .attr("class", "x-axis")
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom(x))
        .selectAll(".tick text")
        .call(wrapTextSimplified, x.bandwidth());

    svg.append("g")
        .attr("class", "y-axis")
        .call(d3.axisLeft(y));

    svg.selectAll(".bar")
        .data(data)
        .enter()
        .append("rect")
        .attr("class", "bar")
        .attr("x", d => x(d.label))
        .attr("y", d => y(d.value))
        .attr("width", x.bandwidth())
        .attr("height", d => height - y(d.value))
        .attr("fill", "steelblue")
        .on("mouseover", function () { d3.select(this).style("fill", "darkorange"); })
        .on("mouseout", function () { d3.select(this).style("fill", "steelblue"); });

    svg.selectAll(".label")
        .data(data)
        .enter()
        .append("text")
        .attr("class", "label")
        .attr("x", d => x(d.label) + x.bandwidth() / 2)
        .attr("y", d => y(d.value) - 5)
        .attr("text-anchor", "middle")
        .call(wrapTextSimplified, x.bandwidth() - 5)
        .text(d => d.value);
}

export function updateMoyMinMaxAge(moy, min, max){
    document.querySelector("#moyenneAge").textContent = "Moyenne d'age : "+parseFloat(moy.toFixed(2))+" ans";
    document.querySelector("#minMaxAge").textContent = "Le plus jeune : "+min+" ans, le plus vieux : "+max+" ans";
}

export const age = [
    { label: "15-25 ans", value: 30 },
    { label: "25-35 ans", value: 80 },
    { label: "35-50 ans", value: 45 },
    { label: "50-65 ans", value: 60 },
    { label: "65 ans et +", value: 20 }
];
export const lieuVie = [
    { label: "Dans la famille en permanance", value: 70 },
    { label: "Dans la famille avec une solution d'accueil ou des activités en journée", value: 50 },
    { label: "Dans la famille principalement mais avec un accueil temporaire ou séquentiel en établissement", value: 45 },
    { label: "Dans un logement indépendant", value: 60 },
    { label: "Dans un habitat inclusif", value: 25 },
    { label: "Dans un foyer d'accueil médicalisé", value: 30 },
    { label: "Dans une maison d'accueil médicalisée", value: 20 },
    { label: "Dans un foyer de vie ou foyer d'hébergement", value: 35 },
    { label: "En IME avec internat", value: 65 },
    { label: "Hospitalisation en psychatrie", value: 20 },
    { label: "Autre", value: 30 }
];
export const qualiteVie = [
    { label: "Tout va bien", value: 50 },
    { label: "Restriction de la vie sociale", value: 70 },
    { label: "Souffrance psychologique", value: 40 },
    { label: "Fatigue, épuisement", value: 75 },
    { label: "Réduction d'activité professionnelle", value: 5 },
    { label: "Coûts financiers importants", value: 40 },
    { label: "Impact négatif sur la famille", value: 50 },
    { label: "Conflits familiaux", value: 30 },
    { label: "Maladie ou difficulté physique", value: 45 },
    { label: "Éloignement de la personne", value: 35 },
];

/*
drawHistogram(age, "#histogrammeAge", 500, 300)
drawHistogram(lieuVie, "#graphiqueLieuVie", window.innerWidth*0.9,400)
drawHistogram(qualiteVie, "#graphiqueQualiteVie", window.innerWidth*0.9,400)
 */