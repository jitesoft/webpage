const onClick = function(event) {
    event.preventDefault();
    let _nodes = document.querySelectorAll('div[id^="content"]');
    let _name = this.classList.item(1);

    for (let i=_nodes.length;i-->0;) {
        _nodes[i].classList.add('hidden');
    }

    document.querySelector("#content-" + _name).classList.remove('hidden');
};

let links = document.querySelectorAll('.link');
for (let i=links.length;i-->0;) {
    links.item(i).addEventListener('click', onClick);
}
