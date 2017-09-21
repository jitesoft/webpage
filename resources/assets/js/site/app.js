"use strict";

const onClick = function(event) {
    event.preventDefault();
    let _nodes = document.querySelectorAll('div[id^="content"]');
    let _name = this.getAttribute("data-href");

    for (let i=_nodes.length;i-->0;) {
        _nodes[i].classList.add('hidden');
    }

    document.querySelector("#content-" + _name).classList.remove('hidden');
};

let links = document.querySelectorAll('.link-internal');
for (let i=links.length;i-->0;) {
    links.item(i).addEventListener('click', onClick);
}
