import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";
export function creerCamembert(data, selector) {
    // Dimensions
    const width = 300;
    const height = 300;
    const radius = Math.min(width, height) / 2;

    // Couleurs
    const color = d3.scaleOrdinal()
        .domain(data.map(d => d.label))
        .range(d3.schemeCategory10);

    d3.select(selector).selectAll("*").remove();

    const svg = d3.select(selector)
        .append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", `translate(${width / 2}, ${height / 2})`);

    const pie = d3.pie()
        .value(d => d.value);
    const arc = d3.arc()
        .innerRadius(0)
        .outerRadius(radius);

    const arcs = svg.selectAll("arc")
        .data(pie(data))
        .enter()
        .append("g");

    arcs.append("path")
        .attr("d", arc)
        .attr("fill", d => color(d.data.label))
        .style("stroke", "white")
        .style("stroke-width", "2px");

    arcs.append("text")
        .attr("transform", d => `translate(${arc.centroid(d)})`)
        .attr("text-anchor", "middle")
        .attr("font-size", "12px")
        .text(d => d.data.label);

    const legend = svg.selectAll(".legend")
        .data(data)
        .enter()
        .append("g")
        .attr("transform", (d, i) => `translate(${radius + 20}, ${-radius + i * 20})`);

    legend.append("rect")
        .attr("width", 12)
        .attr("height", 12)
        .attr("fill", d => color(d.label));

    legend.append("text")
        .attr("x", 20)
        .attr("y", 10)
        .attr("font-size", "12px")
        .text(d => `${d.label}: ${d.value}`);
}

