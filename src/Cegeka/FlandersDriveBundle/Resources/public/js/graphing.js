function getNodeShape(stepType)
{
    var shape = 3; // Square
    if( stepType == 'decision' ) {
        shape = 2; // Diamond
    }

    return d3.svg.symbolTypes[ shape ];
}

function getNodeLineStyle(stepType)
{
    var shape = '';
    if( stepType == 'flow' ) {
        shape = "5, 5";
    }

    return shape;
}

function calculateBorders(groups)
{
    var results = [];
    for( var i = 0; i < groups.length; ++i ) {
        if( typeof groups[i] !== 'undefined' ) {
            results.push( groups[i] );
        }
    }

    for( var j = 0; j < results.length; ++j ) {
        results[j].minX = increaseNegative(results[j].minX, getHorizontalBuffer());
        results[j].minY = increaseNegative(results[j].minY, getVerticalBuffer());

        results[j].maxX = increasePositive(results[j].maxX, getHorizontalBuffer());
        results[j].maxY = increasePositive(results[j].maxY, getVerticalBuffer());
    }

    return results;
}

function getHorizontalBuffer()
{
    return getNodeWidth() / 2 * 1.25;
}

function getVerticalBuffer()
{
    return getNodeHeight();
}

function increasePositive(value, buffer)
{
    return value + buffer;
}

function increaseNegative(value, buffer)
{
    return value - buffer;
}

function calculateDistance(p1, p2)
{
    return p2 - p1;
}

function getNodeXCoordinate(nodeSize)
{
    return -(nodeSize / 2);
}

function getNodeYCoordinate(index)
{
    return (margin + (index * (distanceBetweenNodes + getNodeHeight()))) + (getNodeHeight() / 2) - (size / 2 - .5)
}

function getLineStartCoordinate(index)
{
    return getNodeYCoordinate(index) + (getNodeHeight() / 2);
}

function getLineEndCoordinate(index)
{
    return getNodeYCoordinate(index) - (getNodeHeight() / 2);
}

function getNodeWidth()
{
    return nodeSize * 5;
}

function getNodeHeight()
{
    return nodeSize * 2;
}

function getBottomLeftCoordinate(xOffset, yOffset)
{
    return (getNodeWidth() / 2 * -1 + xOffset) + "," + (getNodeHeight() / 2 * -1 + yOffset);
}

function getMiddleLeftCoordinate(xOffset, yOffset)
{
    return (getNodeWidth() / 2 * -1 + xOffset) + "," + yOffset;
}

function getTopLeftCoordinate(xOffset, yOffset)
{
    return (getNodeWidth() / 2 * -1 + xOffset) + "," + (getNodeHeight() / 2 + yOffset);
}

function getTopMiddleCoordinate(xOffset, yOffset)
{
    return xOffset + "," + (getNodeHeight() / 2 + yOffset);
}

function getTopRightCoordinate(xOffset, yOffset)
{
    return (getNodeWidth() / 2 + xOffset) + "," + (getNodeHeight() / 2 + yOffset);
}

function getMiddleRightCoordinate(xOffset, yOffset)
{
    return (getNodeWidth() / 2 + xOffset) + "," + yOffset;
}

function getBottomRightCoordinate(xOffset, yOffset)
{
    return (getNodeWidth() / 2 + xOffset) + "," + (getNodeHeight() / 2 * -1 + yOffset);
}

function getBottomMiddleCoordinate(xOffset, yOffset)
{
    return xOffset + "," + (getNodeHeight() / 2 * -1 + yOffset);
}

function wrap(text, width)
{
    text.each(function() {
        var text = d3.select(this),
            words = text.text().split(/\s+/).reverse(),
            word,
            line = [],
            lineNumber = 0,
            lineHeight = 1.1, // ems
            y = text.attr("y"),
            dy = parseFloat(text.attr("dy")),
            tspan = text.text(null).append("tspan").attr("x", 0).attr("y", y).attr("dy", dy + "em");
        while (word = words.pop()) {
            line.push(word);
            tspan.text(line.join(" "));
            if (tspan.node().getComputedTextLength() > width) {
                line.pop();
                tspan.text(line.join(" "));
                line = [word];
                tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").text(word);
            }
        }
    });
}

function zoomed()
{
    container.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
}

function dragStarted(d)
{
    d3.event.sourceEvent.stopPropagation();
    d3.select(this).classed("dragging", true);
}

function dragged(d)
{
    d3.event.sourceEvent.stopPropagation();
    d3.select(this).attr("cx", d.x = d3.event.x).attr("cy", d.y = d3.event.y);
}

function dragEnded(d)
{
    d3.event.sourceEvent.stopPropagation();
    d3.select(this).classed("dragging", false);
}
