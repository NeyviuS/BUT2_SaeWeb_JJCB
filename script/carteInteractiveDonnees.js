import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";

var body = d3.select("#carte");
var svg = body.append("svg")
    .attr("width", "600px")
    .attr("height", "600px");

var tooltip = body.append("div")
    .style("position", "absolute")
    .style("background", "white")
    .style("border", "1px solid black")
    .style("border-radius", "5px")
    .style("padding", "5px")
    .style("display", "none")
    .style("pointer-events", "none");

var path = d3.geoPath();
var projection = d3.geoConicConformal()
    .center([2.454071, 46.279229])
    .scale(3000)
    .translate([300, 300]);

path.projection(projection);

d3.json("../data/a-reg2021.json").then(function(geoJSON) {
    svg.selectAll("path")
        .data(geoJSON.features)
        .enter()
        .append("path")
        .attr("fill", "white")
        .attr("stroke", "black")
        .attr("d", path)
        .on("mouseover", function(event, d) {
            d3.select(this)
                .attr("fill", "green");
            //A modifier pour intégrer les chiffres que l'on va extraire des données, actuellement ne contient que le nom de la région
            tooltip.style("display", "block")
                .html(`<strong>${d.properties.libgeo}</strong><br><span>Nombre de réponses : XXX</span><br><span>Proportion : XX%</span> `)
                .style("left", (event.pageX + 10) + "px")
                .style("top", (event.pageY + 10) + "px");
        })
        .on("mousemove", function(event) {
            tooltip.style("left", (event.pageX + 10) + "px")
                .style("top", (event.pageY + 10) + "px");
        })
        .on("mouseout", function() {
            d3.select(this)
                .attr("fill", "white");
            tooltip.style("display", "none");
        });
}).catch(function(error) {
    console.error("Erreur lors du chargement des données :", error);
});
